<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http\Middleware;

use Conceptlz\AdobeSign\Exception\RetryAfter;
use Conceptlz\AdobeSign\Http\NativeSleeper;
use Conceptlz\AdobeSign\Http\Sleeper;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Retries throttled responses.
 *
 * Waits for the server's Retry-After when given, otherwise exponential backoff with full jitter.
 * If the server asks for longer than $maxDelaySeconds we stop and return the 429 so the caller
 * gets a RateLimitException carrying retryAfter rather than a request that blocks for minutes.
 */
final class RetryMiddleware implements Middleware
{
    /** @var \Closure(): float */
    private readonly \Closure $random;

    /**
     * @param list<int> $retryStatuses
     * @param (callable(): float)|null $random returns [0, 1); injectable for deterministic tests
     */
    public function __construct(
        private readonly int $maxRetries = 3,
        private readonly float $baseDelaySeconds = 1.0,
        private readonly float $maxDelaySeconds = 60.0,
        private readonly array $retryStatuses = [429, 503],
        private readonly Sleeper $sleeper = new NativeSleeper(),
        private readonly LoggerInterface $logger = new NullLogger(),
        ?callable $random = null,
    ) {
        $this->random = $random !== null
            ? \Closure::fromCallable($random)
            : static fn (): float => mt_rand() / (mt_getrandmax() + 1);
    }

    public function handle(RequestInterface $request, callable $next): ResponseInterface
    {
        $attempt = 0;

        while (true) {
            $body = $request->getBody();
            if ($attempt > 0 && $body->isSeekable()) {
                $body->rewind();
            }

            $response = $next($request);

            if (!in_array($response->getStatusCode(), $this->retryStatuses, true) || $attempt >= $this->maxRetries) {
                return $response;
            }

            if (!$body->isSeekable()) {
                return $response; // can't replay a consumed one-shot body
            }

            $delay = $this->delayFor($response, $attempt);
            if ($delay === null) {
                return $response;
            }

            $attempt++;
            $this->logger->warning('Adobe Sign throttled request, retrying', [
                'method' => $request->getMethod(),
                'path' => $request->getUri()->getPath(),
                'status' => $response->getStatusCode(),
                'attempt' => $attempt,
                'delay_seconds' => $delay,
            ]);
            $this->sleeper->sleep($delay);
        }
    }

    private function delayFor(ResponseInterface $response, int $attempt): ?float
    {
        $retryAfter = RetryAfter::fromResponse($response);
        if ($retryAfter !== null) {
            return $retryAfter > $this->maxDelaySeconds ? null : (float) $retryAfter;
        }

        $cap = min($this->maxDelaySeconds, $this->baseDelaySeconds * (2 ** $attempt));

        return $cap * ($this->random)();
    }
}
