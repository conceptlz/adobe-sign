<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Auth\AccessToken;
use Conceptlz\AdobeSign\Auth\OAuthClient;
use Conceptlz\AdobeSign\Auth\OAuthConfig;
use Conceptlz\AdobeSign\Exception\AuthenticationException;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Exception\OAuthException;
use Conceptlz\AdobeSign\Tests\FrozenClock;
use Conceptlz\AdobeSign\Tests\TestCase;
use Psr\Http\Message\RequestInterface;

final class OAuthClientTest extends TestCase
{
    private const SECRET = 'client-secret-do-not-leak';

    private FrozenClock $clock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->clock = new FrozenClock();
    }

    public function test_authorization_url(): void
    {
        $url = $this->oauth()->authorizationUrl(['user_login:self', 'agreement_write:account'], 'state-123');

        self::assertStringStartsWith('https://secure.adobesign.com/public/oauth/v2?', $url);
        parse_str((string) parse_url($url, PHP_URL_QUERY), $query);
        self::assertSame([
            'response_type' => 'code',
            'client_id' => 'client-id',
            'redirect_uri' => 'https://app.example.com/adobe/callback',
            'scope' => 'user_login:self agreement_write:account',
            'state' => 'state-123',
        ], $query);
        self::assertStringContainsString('scope=user_login%3Aself%20agreement_write%3Aaccount', $url);
    }

    public function test_authorization_url_requires_scopes_and_state(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->oauth()->authorizationUrl(['agreement_read'], '');
    }

    public function test_generated_state_is_random(): void
    {
        self::assertMatchesRegularExpression('/^[0-9a-f]{64}$/', OAuthClient::generateState());
        self::assertNotSame(OAuthClient::generateState(), OAuthClient::generateState());
    }

    public function test_callback_exchanges_code_on_the_users_shard(): void
    {
        $this->queue(200, 'oauth_token');

        $token = $this->oauth()->handleCallback([
            'code' => 'auth-code',
            'state' => 'state-123',
            'api_access_point' => 'https://api.eu1.adobesign.com/',
            'web_access_point' => 'https://secure.eu1.adobesign.com/',
        ], 'state-123');

        $request = $this->request(0);
        self::assertSame('POST', $request->getMethod());
        self::assertSame('https://api.eu1.adobesign.com/oauth/v2/token', (string) $request->getUri());
        self::assertSame('application/x-www-form-urlencoded', $request->getHeaderLine('Content-Type'));
        self::assertSame([
            'grant_type' => 'authorization_code',
            'code' => 'auth-code',
            'client_id' => 'client-id',
            'client_secret' => self::SECRET,
            'redirect_uri' => 'https://app.example.com/adobe/callback',
        ], self::form($request));

        self::assertSame('3AAABLblqZhAccessTokenFromCodeExchange*', $token->accessToken);
        self::assertSame('3AAABLblqZhRefreshToken*', $token->refreshToken);
        self::assertSame('2026-11-03T13:00:00+00:00', $token->expiresAt?->format(\DATE_ATOM));
        self::assertSame('https://api.eu1.adobesign.com/', $token->apiAccessPoint);
    }

    public function test_callback_without_access_point_uses_shard_agnostic_host(): void
    {
        $this->queue(200, 'oauth_token');

        $token = $this->oauth()->handleCallback(['code' => 'auth-code', 'state' => 's'], 's');

        self::assertSame('https://api.adobesign.com/oauth/v2/token', (string) $this->request(0)->getUri());
        self::assertSame('https://api.eu1.adobesign.com/', $token->apiAccessPoint, 'shard comes from the token response');
    }

    public function test_state_mismatch_is_rejected_before_any_request(): void
    {
        try {
            $this->oauth()->handleCallback(['code' => 'c', 'state' => 'attacker'], 'mine');
            self::fail('Expected OAuthException');
        } catch (OAuthException $e) {
            self::assertSame('STATE_MISMATCH', $e->errorCode);
        }
        self::assertSame([], $this->requests());
    }

    public function test_user_denial_surfaces_adobe_error(): void
    {
        try {
            $this->oauth()->handleCallback(['error' => 'ACCESS_DENIED', 'error_description' => 'User declined', 'state' => 's'], 's');
            self::fail('Expected OAuthException');
        } catch (OAuthException $e) {
            self::assertSame('ACCESS_DENIED', $e->errorCode);
            self::assertStringContainsString('User declined', $e->getMessage());
        }
        self::assertSame([], $this->requests());
    }

    /** @return iterable<string, array{string}> */
    public static function untrustedAccessPoints(): iterable
    {
        yield 'look-alike domain' => ['https://api.adobesign.com.evil.example/'];
        yield 'suffix without dot' => ['https://evil-adobesign.com/'];
        yield 'plain http' => ['http://api.na1.adobesign.com/'];
        yield 'userinfo trick' => ['https://api.na1.adobesign.com@evil.example/'];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('untrustedAccessPoints')]
    public function test_untrusted_access_point_never_receives_the_secret(string $accessPoint): void
    {
        try {
            $this->oauth()->handleCallback(['code' => 'c', 'state' => 's', 'api_access_point' => $accessPoint], 's');
            self::fail('Expected InvalidArgumentException');
        } catch (InvalidArgumentException) {
        }
        self::assertSame([], $this->requests());
    }

    public function test_gov_cloud_access_point_is_allowed(): void
    {
        $this->queue(200, '{"access_token":"t","refresh_token":"r","expires_in":3600,"api_access_point":"https://api.na1.adobesigngov.us/"}');

        $this->oauth()->exchangeCode('c', 'https://api.na1.adobesigngov.us/');

        self::assertSame('https://api.na1.adobesigngov.us/oauth/v2/token', (string) $this->request(0)->getUri());
    }

    public function test_rejected_exchange_throws_without_leaking_the_secret(): void
    {
        $this->queue(401, 'oauth_error_invalid_request');

        try {
            $this->oauth()->exchangeCode('expired-code');
            self::fail('Expected OAuthException');
        } catch (OAuthException $e) {
            self::assertInstanceOf(AuthenticationException::class, $e);
            self::assertSame('invalid_request', $e->errorCode);
            self::assertSame(401, $e->statusCode);
            self::assertStringContainsString('Invalid grant_type parameter value', $e->getMessage());
            self::assertStringNotContainsString(self::SECRET, $e->getMessage());
            self::assertStringNotContainsString(self::SECRET, (string) $e->request?->getBody());
        }
    }

    public function test_refresh_keeps_refresh_token_and_shard(): void
    {
        $this->queue(200, 'oauth_refresh');
        $old = new AccessToken('old', 'refresh-1', $this->clock->now(), 'https://api.eu1.adobesign.com/');

        $this->clock->advance(10);
        $new = $this->oauth()->refresh($old);

        self::assertSame('https://api.eu1.adobesign.com/oauth/v2/refresh', (string) $this->request(0)->getUri());
        self::assertSame([
            'grant_type' => 'refresh_token',
            'refresh_token' => 'refresh-1',
            'client_id' => 'client-id',
            'client_secret' => self::SECRET,
        ], self::form($this->request(0)));
        self::assertSame('3AAABLblqZhRefreshedAccessToken*', $new->accessToken);
        self::assertSame('refresh-1', $new->refreshToken);
        self::assertSame('https://api.eu1.adobesign.com/', $new->apiAccessPoint);
        self::assertSame('2026-11-03T13:00:10+00:00', $new->expiresAt?->format(\DATE_ATOM));
    }

    public function test_refresh_without_refresh_token(): void
    {
        $this->expectException(OAuthException::class);

        $this->oauth()->refresh(new AccessToken('a', null, null));
    }

    public function test_revoke(): void
    {
        $this->queue(200);

        $this->oauth()->revoke(new AccessToken('a', 'r', null, 'https://api.na1.adobesign.com/'));

        self::assertSame('https://api.na1.adobesign.com/oauth/v2/revoke', (string) $this->request(0)->getUri());
        self::assertSame(['token' => 'r'], self::form($this->request(0)));
    }

    public function test_config_rejects_insecure_redirect_uri(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new OAuthConfig('id', 'secret', 'http://localhost.evil.example/cb');
    }

    public function test_secrets_hidden_from_var_dump(): void
    {
        $dump = print_r($this->config(), true) . print_r(new AccessToken('access-x', 'refresh-x', null), true);

        self::assertStringNotContainsString(self::SECRET, $dump);
        self::assertStringNotContainsString('access-x', $dump);
        self::assertStringNotContainsString('refresh-x', $dump);
    }

    private function oauth(): OAuthClient
    {
        return new OAuthClient($this->config(), $this->http, $this->psr17, $this->psr17, $this->clock);
    }

    private function config(): OAuthConfig
    {
        return new OAuthConfig('client-id', self::SECRET, 'https://app.example.com/adobe/callback');
    }

    /** @return array<string, string> */
    private static function form(RequestInterface $request): array
    {
        parse_str((string) $request->getBody(), $form);

        return $form;
    }
}
