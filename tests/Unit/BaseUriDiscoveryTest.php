<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\ClientOptions;
use Conceptlz\AdobeSign\Exception\ApiException;
use Conceptlz\AdobeSign\Exception\AuthenticationException;
use Conceptlz\AdobeSign\Tests\TestCase;

final class BaseUriDiscoveryTest extends TestCase
{
    public function test_discovers_shard_then_calls_it(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement');

        $this->client()->agreements()->get('agr-1');

        $discovery = $this->request(0);
        self::assertSame('GET', $discovery->getMethod());
        self::assertSame('https://api.adobesign.com/api/rest/v6/baseUris', (string) $discovery->getUri());
        self::assertSame('Bearer ' . self::KEY, $discovery->getHeaderLine('Authorization'));

        self::assertSame(self::API . '/agreements/agr-1', (string) $this->request(1)->getUri());
        self::assertSame('Bearer ' . self::KEY, $this->request(1)->getHeaderLine('Authorization'));
    }

    public function test_discovery_result_is_cached_across_client_instances(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement');
        $this->queue(200, 'agreement');

        $this->client()->agreements()->get('agr-1');
        $this->client()->agreements()->get('agr-1'); // new instance, same PSR-16 cache

        self::assertCount(3, $this->requests());
        self::assertStringEndsWith('/baseUris', (string) $this->request(0)->getUri());
        self::assertStringStartsWith(self::API, (string) $this->request(2)->getUri());
    }

    public function test_stale_access_point_is_rediscovered_once(): void
    {
        $this->queueBaseUris();
        $this->queue(403, 'error_invalid_api_access_point');
        $this->queue(200, '{"apiAccessPoint":"https://api.eu1.adobesign.com/","webAccessPoint":"https://secure.eu1.adobesign.com/"}');
        $this->queue(200, 'agreement');

        $agreement = $this->client()->agreements()->get('agr-1');

        self::assertSame('Mutual NDA', $agreement->name);
        self::assertSame('https://api.eu1.adobesign.com/api/rest/v6/agreements/agr-1', (string) $this->request(3)->getUri());
    }

    public function test_bootstrap_url_is_configurable(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement');

        $this->client(new ClientOptions(bootstrapUrl: 'https://api.adobesigngov.us/'))->agreements()->get('agr-1');

        self::assertSame('https://api.adobesigngov.us/api/rest/v6/baseUris', (string) $this->request(0)->getUri());
    }

    public function test_rejects_non_https_access_point(): void
    {
        $this->queue(200, '{"apiAccessPoint":"http://evil.example/","webAccessPoint":"http://evil.example/"}');

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage('non-HTTPS');

        $this->client()->agreements()->get('agr-1');
    }

    public function test_bad_integration_key_surfaces_as_authentication_exception(): void
    {
        $this->queue(401, 'error_invalid_access_token');

        try {
            $this->client()->agreements()->get('agr-1');
            self::fail('Expected AuthenticationException');
        } catch (AuthenticationException $e) {
            self::assertSame('INVALID_ACCESS_TOKEN', $e->errorCode);
            self::assertSame(401, $e->statusCode);
        }
    }
}
