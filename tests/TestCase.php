<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests;

use Conceptlz\AdobeSign\AdobeSign;
use Conceptlz\AdobeSign\Auth\IntegrationKeyTokenProvider;
use Conceptlz\AdobeSign\Cache\InMemoryCache;
use Conceptlz\AdobeSign\ClientOptions;
use Conceptlz\AdobeSign\Tests\Support\ContractCheckingClient;
use Http\Mock\Client as MockClient;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Psr\Http\Message\RequestInterface;
use Psr\SimpleCache\CacheInterface;

abstract class TestCase extends BaseTestCase
{
    protected const KEY = '3AAABLblqZhTestIntegrationKey';
    protected const API = 'https://api.na4.adobesign.com/api/rest/v6';

    protected MockClient $http;

    protected FakeSleeper $sleeper;

    protected CacheInterface $cache;

    protected Psr17Factory $psr17;

    /** The mock client, wrapped so every request/response is checked against Adobe's v6 spec. */
    protected ContractCheckingClient $contract;

    /** Set false in tests that deliberately send traffic the spec doesn't allow. */
    protected bool $checkSpecContract = true;

    protected function setUp(): void
    {
        $this->psr17 = new Psr17Factory();
        $this->http = new MockClient($this->psr17);
        $this->http->setDefaultException(new \LogicException('Unexpected request: no queued response left.'));
        $this->sleeper = new FakeSleeper();
        $this->cache = new InMemoryCache();
        $this->contract = new ContractCheckingClient($this->http);
    }

    protected function assertPostConditions(): void
    {
        if ($this->checkSpecContract) {
            self::assertSame([], $this->contract->violations, 'HTTP traffic must match the Acrobat Sign v6 spec');
        }
    }

    protected function client(?ClientOptions $options = null, ?CacheInterface $cache = null): AdobeSign
    {
        return new AdobeSign(
            new IntegrationKeyTokenProvider(self::KEY),
            httpClient: $this->contract,
            requestFactory: $this->psr17,
            streamFactory: $this->psr17,
            cache: $cache ?? $this->cache,
            options: $options ?? new ClientOptions(),
            sleeper: $this->sleeper,
        );
    }

    /**
     * Queue a response. $body is a fixture name (without .json) or a literal string.
     *
     * @param array<string, string> $headers
     */
    protected function queue(int $status, ?string $body = null, array $headers = []): void
    {
        $contents = '';
        if ($body !== null) {
            $fixture = self::fixturePath($body . '.json');
            $contents = is_file($fixture) ? (string) file_get_contents($fixture) : $body;
            $headers += ['Content-Type' => 'application/json'];
        }

        $this->http->addResponse(new Response($status, $headers, $contents));
    }

    protected function queueBaseUris(): void
    {
        $this->queue(200, 'base_uris');
    }

    /** @return list<RequestInterface> */
    protected function requests(): array
    {
        return $this->http->getRequests();
    }

    protected function request(int $index): RequestInterface
    {
        $requests = $this->requests();
        self::assertArrayHasKey($index, $requests, "No request #$index was sent.");

        return $requests[$index];
    }

    /** @return array<mixed> */
    protected static function jsonBody(RequestInterface $request): array
    {
        $request->getBody()->rewind();

        return json_decode((string) $request->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }

    /** @return array<mixed> */
    protected static function fixture(string $name): array
    {
        return json_decode((string) file_get_contents(self::fixturePath($name . '.json')), true, 512, JSON_THROW_ON_ERROR);
    }

    protected static function fixturePath(string $file): string
    {
        return __DIR__ . '/Fixtures/' . $file;
    }
}
