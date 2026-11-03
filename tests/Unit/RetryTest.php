<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\ClientOptions;
use Conceptlz\AdobeSign\Exception\RateLimitException;
use Conceptlz\AdobeSign\Http\Middleware\RetryMiddleware;
use Conceptlz\AdobeSign\Http\Pipeline;
use Conceptlz\AdobeSign\Tests\FakeSleeper;
use Conceptlz\AdobeSign\Tests\TestCase;
use Http\Mock\Client as MockClient;
use Nyholm\Psr7\Request;
use Nyholm\Psr7\Response;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class RetryTest extends TestCase
{
    public function test_honours_retry_after_header(): void
    {
        $this->queueBaseUris();
        $this->queue(429, 'error_throttling', ['Retry-After' => '2']);
        $this->queue(200, 'agreement');

        $agreement = $this->client()->agreements()->get('agr-1');

        self::assertSame('Mutual NDA', $agreement->name);
        self::assertSame([2.0], $this->sleeper->sleeps);
        self::assertCount(3, $this->requests());
    }

    public function test_falls_back_to_delay_in_error_message(): void
    {
        $this->queueBaseUris();
        $this->queue(429, 'error_throttling'); // "...try again in 3 seconds."
        $this->queue(200, 'agreement');

        $this->client()->agreements()->get('agr-1');

        self::assertSame([3.0], $this->sleeper->sleeps);
    }

    public function test_gives_up_after_max_retries_with_rate_limit_exception(): void
    {
        $this->queueBaseUris();
        foreach (range(1, 3) as $_) {
            $this->queue(429, 'error_throttling', ['Retry-After' => '1']);
        }

        try {
            $this->client(new ClientOptions(maxRetries: 2))->agreements()->get('agr-1');
            self::fail('Expected RateLimitException');
        } catch (RateLimitException $e) {
            self::assertSame(429, $e->statusCode);
            self::assertSame('THROTTLING_TOO_MANY_REQUESTS', $e->errorCode);
            self::assertSame(1, $e->retryAfter);
        }

        self::assertSame([1.0, 1.0], $this->sleeper->sleeps);
        self::assertCount(4, $this->requests(), 'discovery + 1 try + 2 retries');
    }

    public function test_retry_after_beyond_cap_fails_fast(): void
    {
        $this->queueBaseUris();
        $this->queue(429, 'error_throttling', ['Retry-After' => '600']);

        try {
            $this->client()->agreements()->get('agr-1');
            self::fail('Expected RateLimitException');
        } catch (RateLimitException $e) {
            self::assertSame(600, $e->retryAfter);
        }

        self::assertSame([], $this->sleeper->sleeps);
    }

    public function test_exponential_backoff_without_server_hint(): void
    {
        $http = new MockClient();
        $http->addResponse(new Response(503));
        $http->addResponse(new Response(503));
        $http->addResponse(new Response(200));

        $sleeper = new FakeSleeper();
        $pipeline = new Pipeline($http, [
            new RetryMiddleware(maxRetries: 3, baseDelaySeconds: 1.0, sleeper: $sleeper, random: static fn () => 0.5),
        ]);

        $response = $pipeline->sendRequest(new Request('GET', 'https://api.na4.adobesign.com/api/rest/v6/agreements'));

        self::assertSame(200, $response->getStatusCode());
        self::assertSame([0.5, 1.0], $sleeper->sleeps, 'full jitter of 1s, then 2s');
    }

    public function test_upload_body_is_replayed_intact_on_retry(): void
    {
        // A client that reads the body from wherever the stream currently is, like a real one.
        $inner = new MockClient();
        $inner->addResponse(new Response(429, ['Retry-After' => '0']));
        $inner->addResponse(new Response(200));
        $client = new class ($inner) implements ClientInterface {
            /** @var list<string> bodies as the transport read them */
            public array $seen = [];

            public function __construct(private ClientInterface $inner)
            {
            }

            public function sendRequest(RequestInterface $request): ResponseInterface
            {
                $this->seen[] = $request->getBody()->getContents();

                return $this->inner->sendRequest($request);
            }
        };

        $pipeline = new Pipeline($client, [new RetryMiddleware(sleeper: new FakeSleeper())]);
        $pipeline->sendRequest(new Request('POST', 'https://api.na4.adobesign.com/api/rest/v6/transientDocuments', [], '%PDF-1.4 body'));

        self::assertSame(['%PDF-1.4 body', '%PDF-1.4 body'], $client->seen);
    }

    public function test_retry_after_http_date(): void
    {
        $now = 1_800_000_000;
        $response = new Response(429, ['Retry-After' => gmdate('D, d M Y H:i:s \G\M\T', $now + 7)]);

        self::assertSame(7, \Conceptlz\AdobeSign\Exception\RetryAfter::fromResponse($response, '', $now));
    }
}
