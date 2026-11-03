<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

use Psr\Http\Message\ResponseInterface;

/**
 * Reads how long a throttled response asks us to wait.
 *
 * Order: `Retry-After` header (delta-seconds or HTTP-date), then the
 * "Please try again in N seconds" text Adobe puts in the error message.
 *
 * @internal
 */
final class RetryAfter
{
    /**
     * Seconds to wait, or null when the response doesn't say.
     *
     * @param string|null $message the parsed error message; read from the body when null
     * @param int|null $now Unix time to measure an HTTP-date against; injectable for tests
     */
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
