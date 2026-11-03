<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

/**
 * Persists OAuth tokens between requests. Keyed so one store can hold many users/accounts.
 */
interface TokenStore
{
    /** The token stored under $key, or null if the user hasn't connected. */
    public function get(string $key): ?AccessToken;

    /**
     * Store or replace the token under $key. Called after the OAuth callback and after every
     * refresh. Persist it securely: it holds the refresh token.
     */
    public function put(string $key, AccessToken $token): void;
}
