<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;

/**
 * A non-expiring Integration Key created in Acrobat Sign's account settings.
 * Nothing to refresh, so invalidate() does nothing and a rejected key fails with
 * AuthenticationException.
 */
final class IntegrationKeyTokenProvider implements TokenProvider
{
    /**
     * @throws InvalidArgumentException when the key is blank
     */
    public function __construct(
        #[\SensitiveParameter] private readonly string $integrationKey,
    ) {
        if (trim($integrationKey) === '') {
            throw new InvalidArgumentException('Integration key must not be empty.');
        }
    }

    /** The key itself; it is sent as the bearer token. */
    public function getAccessToken(): string
    {
        return $this->integrationKey;
    }

    /** No-op: a key can't be refreshed. */
    public function invalidate(): void
    {
    }

    /** A hash prefix of the key, so the key itself never reaches the cache. */
    public function cacheKey(): string
    {
        return 'ik_' . substr(hash('sha256', $this->integrationKey), 0, 32);
    }

    /**
     * Masks the key in var_dump() and similar.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        return ['integrationKey' => '***'];
    }
}
