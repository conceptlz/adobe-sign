<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http;

use Conceptlz\AdobeSign\Auth\TokenProvider;
use Conceptlz\AdobeSign\BaseUri\BaseUriResolver;
use Conceptlz\AdobeSign\Exception\ErrorMapper;
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

    public function withHeader(string $name, string $value): self
    {
        $headers = $this->defaultHeaders;
        $headers[$name] = $value;

        return new self($this->client, $this->requests, $this->streams, $this->tokens, $this->baseUris, $this->logger, $headers);
    }

    public function streams(): StreamFactoryInterface
    {
        return $this->streams;
    }

    /**
     * @param array<string, scalar|null> $query  null values are dropped, booleans become "true"/"false"
     * @param array<string, string> $headers
     * @param array<mixed>|StreamInterface|null $body arrays are JSON-encoded
     */
    public function send(string $method, string $path, array $query = [], array $headers = [], array|StreamInterface|null $body = null): ResponseInterface
    {
        if (is_array($body)) {
            $body = $this->streams->createStream(json_encode($body, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES));
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
     * @param array<string, scalar|null> $query
     * @param array<string, string> $headers
     * @param array<mixed>|null $body
     * @return array<mixed>
     */
    public function json(string $method, string $path, array $query = [], ?array $body = null, array $headers = []): array
    {
        $response = $this->send($method, $path, $query, $headers + ['Accept' => 'application/json'], $body);
        $contents = (string) $response->getBody();

        if ($contents === '') {
            return [];
        }

        $data = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

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
