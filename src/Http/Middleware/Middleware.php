<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Wraps the PSR-18 call. Pass instances to AdobeSign's $middleware argument to add behaviour
 * (e.g. metrics or tracing) around every API request.
 *
 * Middleware sees every HTTP response, including 4xx/5xx: errors are turned into exceptions only
 * after the whole stack returns. A network failure arrives as a PSR-18 ClientExceptionInterface.
 */
interface Middleware
{
    /**
     * Handle the request, usually by calling $next once (or several times, to retry) and
     * returning or adjusting its response.
     *
     * @param callable(RequestInterface): ResponseInterface $next the rest of the stack
     */
    public function handle(RequestInterface $request, callable $next): ResponseInterface;
}
