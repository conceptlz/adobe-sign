<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface Middleware
{
    /**
     * @param callable(RequestInterface): ResponseInterface $next
     */
    public function handle(RequestInterface $request, callable $next): ResponseInterface;
}
