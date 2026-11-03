<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

use Conceptlz\AdobeSign\Exception\ErrorMapper;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Exception\OAuthException;
use Conceptlz\AdobeSign\Exception\TransportException;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Clock\ClockInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * Acrobat Sign OAuth 2.0 authorization-code flow (https://secure.adobesign.com/public/static/oauthDoc.jsp).
 *
 *     // 1. redirect the user
 *     $state = OAuthClient::generateState();      // keep it in the session
 *     header('Location: ' . $oauth->authorizationUrl(['agreement_read', 'agreement_write'], $state));
 *
 *     // 2. on the redirect URI
 *     $token = $oauth->handleCallback($_GET, $sessionState);
 *     $store->put($userId, $token);
 *
 * Token, refresh and revoke all go to the token's api_access_point; nothing is pinned to a shard.
 */
final class OAuthClient
{
    private readonly ClientInterface $http;

    private readonly RequestFactoryInterface $requests;

    private readonly StreamFactoryInterface $streams;

    public function __construct(
        private readonly OAuthConfig $config,
        ?ClientInterface $httpClient = null,
        ?RequestFactoryInterface $requestFactory = null,
        ?StreamFactoryInterface $streamFactory = null,
        private readonly ClockInterface $clock = new SystemClock(),
    ) {
        $this->http = $httpClient ?? Psr18ClientDiscovery::find();
        $this->requests = $requestFactory ?? Psr17FactoryDiscovery::findRequestFactory();
        $this->streams = $streamFactory ?? Psr17FactoryDiscovery::findStreamFactory();
    }

    public static function generateState(): string
    {
        return bin2hex(random_bytes(32));
    }

    /**
     * Where to send the user's browser.
     *
     * @param list<string> $scopes e.g. ['user_login:self', 'agreement_write:account']; ":self" is the default modifier
     */
    public function authorizationUrl(array $scopes, string $state): string
    {
        if ($scopes === []) {
            throw new InvalidArgumentException('Request at least one OAuth scope.');
        }
        if ($state === '') {
            throw new InvalidArgumentException('A state value is required to protect the callback against CSRF.');
        }

        return $this->config->authorizationUrl . '?' . http_build_query([
            'response_type' => 'code',
            'client_id' => $this->config->clientId,
            'redirect_uri' => $this->config->redirectUri,
            'scope' => implode(' ', $scopes),
            'state' => $state,
        ], '', '&', PHP_QUERY_RFC3986);
    }

    /**
     * Validate the redirect back from Adobe and exchange its code for tokens.
     *
     * @param array<string, mixed> $query the callback's query parameters (e.g. $_GET)
     * @param string $expectedState the state you generated for this user's authorization request
     */
    public function handleCallback(array $query, string $expectedState): AccessToken
    {
        if (isset($query['error'])) {
            $error = (string) $query['error'];
            throw new OAuthException(
                sprintf('Authorization failed [%s]: %s', $error, (string) ($query['error_description'] ?? 'no description')),
                400,
                $error,
            );
        }

        $state = $query['state'] ?? null;
        if ($expectedState === '' || !is_string($state) || !hash_equals($expectedState, $state)) {
            throw new OAuthException('OAuth state mismatch: the callback was not started by this session.', 400, 'STATE_MISMATCH');
        }

        $code = $query['code'] ?? null;
        if (!is_string($code) || $code === '') {
            throw new OAuthException('OAuth callback has no authorization code.', 400, 'MISSING_CODE');
        }

        $accessPoint = $query['api_access_point'] ?? null;

        return $this->exchangeCode($code, is_string($accessPoint) && $accessPoint !== '' ? $accessPoint : null);
    }

    /**
     * POST /oauth/v2/token. Codes are valid for 5 minutes.
     *
     * @param string|null $apiAccessPoint from the callback, if present; otherwise the shard-agnostic token host
     */
    public function exchangeCode(#[\SensitiveParameter] string $code, ?string $apiAccessPoint = null): AccessToken
    {
        $host = $apiAccessPoint !== null
            ? $this->config->validateAccessPoint($apiAccessPoint)
            : rtrim($this->config->tokenHost, '/') . '/';

        $data = $this->post($host . 'oauth/v2/token', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'client_id' => $this->config->clientId,
            'client_secret' => $this->config->clientSecret,
            'redirect_uri' => $this->config->redirectUri,
        ]);

        $accessPoint = $data['api_access_point'] ?? $apiAccessPoint;

        return $this->toToken(
            $data,
            refreshToken: $data['refresh_token'] ?? null,
            apiAccessPoint: is_string($accessPoint) ? $this->config->validateAccessPoint($accessPoint) : null,
        );
    }

    /**
     * POST /oauth/v2/refresh. Adobe doesn't rotate refresh tokens, so the old one is kept.
     * Refresh tokens expire after 60 days without use.
     */
    public function refresh(AccessToken $token): AccessToken
    {
        if ($token->refreshToken === null) {
            throw new OAuthException('This token has no refresh token; the user must authorize again.', 401, 'NO_REFRESH_TOKEN');
        }

        $data = $this->post($this->hostFor($token) . 'oauth/v2/refresh', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $token->refreshToken,
            'client_id' => $this->config->clientId,
            'client_secret' => $this->config->clientSecret,
        ]);

        return $this->toToken(
            $data,
            refreshToken: $data['refresh_token'] ?? $token->refreshToken,
            apiAccessPoint: $token->apiAccessPoint,
        );
    }

    /**
     * POST /oauth/v2/revoke. Revoking either token revokes the pair.
     */
    public function revoke(AccessToken $token): void
    {
        $this->post($this->hostFor($token) . 'oauth/v2/revoke', [
            'token' => $token->refreshToken ?? $token->accessToken,
        ], expectJson: false);
    }

    private function hostFor(AccessToken $token): string
    {
        return $token->apiAccessPoint !== null
            ? $this->config->validateAccessPoint($token->apiAccessPoint)
            : rtrim($this->config->tokenHost, '/') . '/';
    }

    /**
     * @param array<mixed> $data
     */
    private function toToken(array $data, ?string $refreshToken, ?string $apiAccessPoint): AccessToken
    {
        if (!isset($data['access_token']) || !is_string($data['access_token'])) {
            throw new OAuthException('OAuth response has no access_token.', 200, null);
        }

        $expiresIn = isset($data['expires_in']) ? (int) $data['expires_in'] : null;

        return new AccessToken(
            $data['access_token'],
            $refreshToken,
            $expiresIn !== null ? $this->clock->now()->modify("+{$expiresIn} seconds") : null,
            $apiAccessPoint,
        );
    }

    /**
     * @param array<string, string> $form
     * @return array<mixed>
     */
    private function post(string $url, array $form, bool $expectJson = true): array
    {
        $request = $this->requests->createRequest('POST', $url)
            ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->withHeader('Accept', 'application/json')
            ->withBody($this->streams->createStream(http_build_query($form, '', '&', PHP_QUERY_RFC3986)));

        try {
            $response = $this->http->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            throw new TransportException('OAuth request failed: ' . $e->getMessage(), 0, $e);
        }

        if ($response->getStatusCode() < 200 || $response->getStatusCode() >= 300) {
            throw $this->error($request, $response);
        }

        if (!$expectJson) {
            return [];
        }

        $data = json_decode((string) $response->getBody(), true);
        if (!is_array($data)) {
            throw new OAuthException('OAuth response is not JSON.', $response->getStatusCode(), null, $request, $response);
        }

        return $data;
    }

    private function error(RequestInterface $request, ResponseInterface $response): OAuthException
    {
        [$code, $message] = ErrorMapper::parseBody((string) $response->getBody());

        // The request body holds the client secret; never let it reach logs via the exception.
        $redacted = $request->withBody($this->streams->createStream(''));

        return new OAuthException(
            sprintf(
                'POST %s failed with HTTP %d%s%s',
                $request->getUri()->getPath(),
                $response->getStatusCode(),
                $code !== null ? " [$code]" : '',
                $message !== null ? ": $message" : '',
            ),
            $response->getStatusCode(),
            $code,
            $redacted,
            $response,
        );
    }
}
