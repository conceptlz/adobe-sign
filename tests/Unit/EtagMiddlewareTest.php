<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Http\Middleware\EtagMiddleware;
use Conceptlz\AdobeSign\Http\Pipeline;
use Http\Mock\Client as MockClient;
use Nyholm\Psr7\Request;
use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class EtagMiddlewareTest extends TestCase
{
    private const BASE = 'https://api.na4.adobesign.com/api/rest/v6';

    private MockClient $http;

    private Pipeline $pipeline;

    protected function setUp(): void
    {
        $this->http = new MockClient();
        $this->pipeline = new Pipeline($this->http, [new EtagMiddleware()]);
    }

    public function test_put_replays_etag_from_get_of_same_resource(): void
    {
        $this->http->addResponse(new Response(200, ['ETag' => '"v1"']));
        $this->http->addResponse(new Response(200));

        $this->send('GET', '/agreements/agr-1');
        $this->send('PUT', '/agreements/agr-1');

        self::assertSame('"v1"', $this->http->getLastRequest()->getHeaderLine('If-Match'));
    }

    public function test_sub_resource_write_uses_parent_etag(): void
    {
        $this->http->addResponse(new Response(200, ['ETag' => '"v1"']));
        $this->http->addResponse(new Response(204));

        $this->send('GET', '/agreements/agr-1');
        $this->send('PUT', '/agreements/agr-1/state');

        self::assertSame('"v1"', $this->http->getLastRequest()->getHeaderLine('If-Match'));
    }

    public function test_collection_etag_is_never_lent_to_an_item(): void
    {
        $this->http->addResponse(new Response(200, ['ETag' => '"list"']));
        $this->http->addResponse(new Response(200));

        $this->send('GET', '/agreements');
        $this->send('PUT', '/agreements/agr-1');

        self::assertFalse($this->http->getLastRequest()->hasHeader('If-Match'));
    }

    public function test_explicit_if_match_wins(): void
    {
        $this->http->addResponse(new Response(200, ['ETag' => '"v1"']));
        $this->http->addResponse(new Response(200));

        $this->send('GET', '/agreements/agr-1');
        $this->pipeline->sendRequest(new Request('PUT', self::BASE . '/agreements/agr-1', ['If-Match' => '"mine"']));

        self::assertSame('"mine"', $this->http->getLastRequest()->getHeaderLine('If-Match'));
    }

    public function test_successful_write_invalidates_stored_etag(): void
    {
        $this->http->addResponse(new Response(200, ['ETag' => '"v1"']));
        $this->http->addResponse(new Response(204));
        $this->http->addResponse(new Response(200));

        $this->send('GET', '/agreements/agr-1');
        $this->send('PUT', '/agreements/agr-1/state');
        $this->send('PUT', '/agreements/agr-1');

        self::assertFalse($this->http->getLastRequest()->hasHeader('If-Match'), 'v1 is stale after the state change');
    }

    public function test_reads_and_posts_never_get_if_match(): void
    {
        $this->http->addResponse(new Response(200, ['ETag' => '"v1"']));
        $this->http->addResponse(new Response(201));

        $this->send('GET', '/agreements/agr-1');
        $this->send('POST', '/agreements/agr-1/reminders');

        self::assertFalse($this->http->getLastRequest()->hasHeader('If-Match'));
    }

    private function send(string $method, string $path): void
    {
        $this->pipeline->sendRequest(new Request($method, self::BASE . $path));
    }
}

