<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

/**
 * Supplies the bearer token for each request.
 */
interface TokenProvider
{
    /**
     * A currently valid access token. Implementations refresh as needed.
     */
    public function getAccessToken(): string;

    /**
     * Called after the API rejects the token (401), so the next call fetches a fresh one.
     * Static providers can make this a no-op.
     */
    public function invalidate(): void;

    /**
     * Stable, non-secret identifier for the principal behind the token.
     * Used to key per-account caches (e.g. the discovered base URI).
     */
    public function cacheKey(): string;
}
