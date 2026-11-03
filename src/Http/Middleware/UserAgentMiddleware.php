<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Sets ClientOptions::$userAgent on requests that have no User-Agent yet.
 *
 * @internal AdobeSign installs it.
 */
final class UserAgentMiddleware implements Middleware
{
    public function __construct(private readonly string $userAgent)
    {
    }

    /** Add the User-Agent header if missing. */
    public function handle(RequestInterface $request, callable $next): ResponseInterface
    {
        return $next($request->hasHeader('User-Agent') ? $request : $request->withHeader('User-Agent', $this->userAgent));
    }
}
