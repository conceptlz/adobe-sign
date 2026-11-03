<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

/**
 * Process-local store. Fine for CLI scripts and tests; use a persistent store in web apps.
 */
final class InMemoryTokenStore implements TokenStore
{
    /** @var array<string, AccessToken> */
    private array $tokens = [];

    public function get(string $key): ?AccessToken
    {
        return $this->tokens[$key] ?? null;
    }

    public function put(string $key, AccessToken $token): void
    {
        $this->tokens[$key] = $token;
    }
}
