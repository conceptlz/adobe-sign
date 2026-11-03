<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign;

use Conceptlz\AdobeSign\Enum\SignatureLevel;

/**
 * Tunables for AdobeSign: data-center discovery, throttling retries, ETag handling, User-Agent.
 */
final class ClientOptions
{
    public function __construct(
        /**
         * Shard-agnostic host used only for GET /baseUris. Every other call goes to the
         * apiAccessPoint it returns. Change only for e.g. Gov Cloud.
         */
        public readonly string $bootstrapUrl = 'https://api.adobesign.com',
        /** How long a discovered apiAccessPoint is cached, in seconds (PSR-16 TTL). */
        public readonly int $baseUriTtl = 86400,
        /**
         * Retries for a 429 or 503 response. When retrying stops, the last response is thrown as
         * usual: RateLimitException for a 429, ApiException for a plain 503. 0 disables retrying.
         */
        public readonly int $maxRetries = 3,
        /** Base for exponential backoff, in seconds, when the server gives no Retry-After. */
        public readonly float $retryBaseDelay = 1.0,
        /** Never wait longer than this many seconds per retry; a longer Retry-After fails fast instead. */
        public readonly float $maxRetryDelay = 60.0,
        /** Replay GET ETags as If-Match on PUT/DELETE. */
        public readonly bool $autoEtag = true,
        /** Sent unless a request already has a User-Agent header. */
        public readonly string $userAgent = 'conceptlz-adobe-sign-php/' . AdobeSign::VERSION,
        /**
         * Signature level for agreements built with AgreementInfo that don't set one. SES keeps Acrobat
         * Sign's default; set AES or QES to require digital signatures project-wide.
         */
        public readonly SignatureLevel $defaultSignatureLevel = SignatureLevel::SES,
    ) {
    }
}
