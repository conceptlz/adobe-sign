<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * 429 / THROTTLING_TOO_MANY_REQUESTS, thrown once the retry middleware has given up: retries
 * exhausted, or the server asked for a longer wait than ClientOptions::$maxRetryDelay.
 */
class RateLimitException extends ApiException
{
    public function __construct(
        string $message,
        int $statusCode,
        ?string $errorCode,
        ?RequestInterface $request = null,
        ?ResponseInterface $response = null,
        ?\Throwable $previous = null,
        /** Seconds the server asked us to wait (Retry-After header or error message), when it said. */
        public readonly ?int $retryAfter = null,
    ) {
        parent::__construct($message, $statusCode, $errorCode, $request, $response, $previous);
    }
}
