<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

use Psr\Http\Message\ResponseInterface;

/**
 * Reads how long a throttled response asks us to wait.
 *
 * Order: `Retry-After` header (delta-seconds or HTTP-date), then the
 * "Please try again in N seconds" text Adobe puts in the error message.
 */
final class RetryAfter
{
    public static function fromResponse(ResponseInterface $response, ?string $message = null, ?int $now = null): ?int
    {
        $header = trim($response->getHeaderLine('Retry-After'));
        if ($header !== '') {
            if (ctype_digit($header)) {
                return (int) $header;
            }
            $date = \DateTimeImmutable::createFromFormat('D, d M Y H:i:s \G\M\T', $header, new \DateTimeZone('UTC'));
            if ($date !== false) {
                return max(0, $date->getTimestamp() - ($now ?? time()));
            }
        }

        if ($message === null) {
            [, $message] = ErrorMapper::parseBody((string) $response->getBody());
            $response->getBody()->isSeekable() && $response->getBody()->rewind();
        }

        if ($message !== null && preg_match('/try again in (\d+) seconds?/i', $message, $m)) {
            return (int) $m[1];
        }

        return null;
    }
}
