<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http;

use Conceptlz\AdobeSign\Http\Middleware\Middleware;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * A PSR-18 client wrapped in middleware. First middleware in the list is outermost.
 */
final class Pipeline implements ClientInterface
{
    /** @param list<Middleware> $middleware */
    public function __construct(
        private readonly ClientInterface $client,
        private readonly array $middleware = [],
    ) {
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $next = fn (RequestInterface $r): ResponseInterface => $this->client->sendRequest($r);

        foreach (array_reverse($this->middleware) as $middleware) {
            $next = static fn (RequestInterface $r): ResponseInterface => $middleware->handle($r, $next);
        }

        return $next($request);
    }
}
