<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Live;

use Conceptlz\AdobeSign\Http\Middleware\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal records request hosts so tests can assert data-center routing
 */
final class RecordingMiddleware implements Middleware
{
    /** @var list<string> "METHOD host/path" */
    public array $calls = [];

    public function handle(RequestInterface $request, callable $next): ResponseInterface
    {
        $this->calls[] = $request->getMethod() . ' ' . $request->getUri()->getHost() . $request->getUri()->getPath();

        return $next($request);
    }
}
