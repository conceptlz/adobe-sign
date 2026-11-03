<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

/**
 * Persists OAuth tokens between requests. Keyed so one store can hold many users/accounts.
 */
interface TokenStore
{
    public function get(string $key): ?AccessToken;

    public function put(string $key, AccessToken $token): void;
}
