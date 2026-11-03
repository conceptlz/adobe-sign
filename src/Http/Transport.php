<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http;

use Conceptlz\AdobeSign\Auth\TokenProvider;
use Conceptlz\AdobeSign\BaseUri\BaseUriResolver;
use Conceptlz\AdobeSign\Exception\ApiException;
use Conceptlz\AdobeSign\Exception\ErrorMapper;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Exception\TransportException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Builds authenticated requests against the account's shard and maps failures to exceptions.
 *
 * Immutable: withHeader() returns a copy, which is how asUser() scopes x-api-user.
 *
 * @internal Resources talk to this; application code uses AdobeSign.
 */
final class Transport
{
    /** @param array<string, string> $defaultHeaders */
    public function __construct(
        private readonly ClientInterface $client,
        private readonly RequestFactoryInterface $requests,
        private readonly StreamFactoryInterface $streams,
        private readonly TokenProvider $tokens,
        private readonly BaseUriResolver $baseUris,
        private readonly LoggerInterface $logger = new NullLogger(),
        private readonly array $defaultHeaders = [],
    ) {
    }

    /** A copy that adds $name to every request it sends. */
    public function withHeader(string $name, string $value): self
    {
        $headers = $this->defaultHeaders;
        $headers[$name] = $value;

        return new self($this->client, $this->requests, $this->streams, $this->tokens, $this->baseUris, $this->logger, $headers);
    }

    /** The PSR-17 stream factory, for resources that build bodies themselves. */
    public function streams(): StreamFactoryInterface
    {
        return $this->streams;
    }

    /**
     * Send one API request and return the 2xx (or 304) response.
     *
     * A 401 is retried once if the token provider hands out a different token after
     * invalidate(); a 403 INVALID_API_ACCESS_POINT is retried once after rediscovering the shard.
     *
     * @param string $path relative to the account's API root, e.g. "agreements/{id}"
     * @param array<string, scalar|null> $query  null values are dropped, booleans become "true"/"false"
     * @param array<string, string> $headers
     * @param array<mixed>|StreamInterface|null $body arrays are JSON-encoded
     * @throws ApiException for any other status (subclass chosen by ErrorMapper)
     * @throws TransportException when no response arrived
     * @throws InvalidArgumentException when an array $body can't be JSON-encoded (e.g. invalid UTF-8)
     */
    public function send(string $method, string $path, array $query = [], array $headers = [], array|StreamInterface|null $body = null): ResponseInterface
    {
        if (is_array($body)) {
            try {
                $body = $this->streams->createStream(json_encode($body, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES));
            } catch (\JsonException $e) {
                throw new InvalidArgumentException('Request body cannot be encoded as JSON: ' . $e->getMessage(), 0, $e);
            }
            $headers += ['Content-Type' => 'application/json'];
        }

        $retriedAuth = false;
        $retriedShard = false;

        while (true) {
            $request = $this->buildRequest($method, $path, $query, $headers, $body);
            $response = $this->dispatch($request);
            $status = $response->getStatusCode();

            if (($status >= 200 && $status < 300) || $status === 304) {
                return $response;
            }

            $error = ErrorMapper::fromResponse($request, $response);

            // Token rejected: let refreshable providers fetch a new one, then try once more.
            if ($status === 401 && !$retriedAuth) {
                $retriedAuth = true;
                $before = $this->tokens->getAccessToken();
                $this->tokens->invalidate();
                if ($this->tokens->getAccessToken() !== $before) {
                    continue;
                }
            }

            // Cached shard is stale (account moved): rediscover once.
            if ($status === 403 && $error->errorCode === 'INVALID_API_ACCESS_POINT' && !$retriedShard) {
                $retriedShard = true;
                $this->baseUris->forget($this->tokens);
                continue;
            }

            throw $error;
        }
    }

    /**
     * send() with JSON in and out.
     *
     * @param array<string, scalar|null> $query
     * @param array<string, string> $headers
     * @param array<mixed>|null $body
     * @return array<mixed> the decoded body; [] for an empty body, ['value' => ...] for a JSON scalar
     * @throws ApiException also when a 2xx body is not valid JSON
     * @throws TransportException
     * @throws InvalidArgumentException when $body can't be JSON-encoded
     */
    public function json(string $method, string $path, array $query = [], ?array $body = null, array $headers = []): array
    {
        return $this->decode($this->send($method, $path, $query, $headers + ['Accept' => 'application/json'], $body));
    }

    /**
     * Decode a successful JSON response. An empty body is []; a scalar body is ['value' => ...].
     *
     * @return array<mixed>
     * @throws ApiException when the body isn't valid JSON (so callers only ever see AdobeSignException)
     */
    public function decode(ResponseInterface $response): array
    {
        $contents = (string) $response->getBody();
        if ($contents === '') {
            return [];
        }

        try {
            $data = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new ApiException('Acrobat Sign returned a response that is not valid JSON: ' . $e->getMessage(), $response->getStatusCode(), null, null, $response, $e);
        }

        return is_array($data) ? $data : ['value' => $data];
    }

    /**
     * @param array<string, scalar|null> $query
     * @param array<string, string> $headers
     */
    private function buildRequest(string $method, string $path, array $query, array $headers, ?StreamInterface $body): RequestInterface
    {
        $uri = $this->baseUris->resolve($this->tokens) . '/' . ltrim($path, '/');
        $qs = self::queryString($query);
        if ($qs !== '') {
            $uri .= '?' . $qs;
        }

        $request = $this->requests->createRequest($method, $uri)
            ->withHeader('Authorization', 'Bearer ' . $this->tokens->getAccessToken());

        foreach ([...$this->defaultHeaders, ...$headers] as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        if ($body !== null) {
            if ($body->isSeekable()) {
                $body->rewind();
            }
            $request = $request->withBody($body);
        }

        return $request;
    }

    private function dispatch(RequestInterface $request): ResponseInterface
    {
        $started = hrtime(true);

        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            $this->logger->error('Adobe Sign request failed', [
                'method' => $request->getMethod(),
                'path' => $request->getUri()->getPath(),
                'error' => $e->getMessage(),
            ]);
            throw new TransportException($e->getMessage(), 0, $e);
        }

        $this->logger->debug('Adobe Sign request', [
            'method' => $request->getMethod(),
            'path' => $request->getUri()->getPath(),
            'status' => $response->getStatusCode(),
            'duration_ms' => (int) ((hrtime(true) - $started) / 1_000_000),
        ]);

        return $response;
    }

    /** @param array<string, scalar|null> $query */
    private static function queryString(array $query): string
    {
        $query = array_filter($query, static fn ($v) => $v !== null);
        $query = array_map(static fn ($v) => is_bool($v) ? ($v ? 'true' : 'false') : (string) $v, $query);

        return http_build_query($query, '', '&', PHP_QUERY_RFC3986);
    }
}
