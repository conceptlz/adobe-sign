<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class UserAgentMiddleware implements Middleware
{
    public function __construct(private readonly string $userAgent)
    {
    }

    public function handle(RequestInterface $request, callable $next): ResponseInterface
    {
        return $next($request->hasHeader('User-Agent') ? $request : $request->withHeader('User-Agent', $this->userAgent));
    }
}
