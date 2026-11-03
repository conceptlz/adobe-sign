<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign;

final class ClientOptions
{
    public function __construct(
        /**
         * Shard-agnostic host used only for GET /baseUris. Every other call goes to the
         * apiAccessPoint it returns. Change only for e.g. Gov Cloud.
         */
        public readonly string $bootstrapUrl = 'https://api.adobesign.com',
        /** How long a discovered apiAccessPoint is cached (PSR-16 TTL). */
        public readonly int $baseUriTtl = 86400,
        /** Retries for 429/503 before a RateLimitException is thrown. */
        public readonly int $maxRetries = 3,
        /** Base for exponential backoff when the server gives no Retry-After. */
        public readonly float $retryBaseDelay = 1.0,
        /** Never wait longer than this per retry; a longer Retry-After fails fast instead. */
        public readonly float $maxRetryDelay = 60.0,
        /** Replay GET ETags as If-Match on PUT/DELETE. */
        public readonly bool $autoEtag = true,
        public readonly string $userAgent = 'conceptlz-adobe-sign-php/' . AdobeSign::VERSION,
    ) {
    }
}
