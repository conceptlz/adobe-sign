<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;

/**
 * A non-expiring Integration Key created in Acrobat Sign's account settings.
 */
final class IntegrationKeyTokenProvider implements TokenProvider
{
    public function __construct(
        #[\SensitiveParameter] private readonly string $integrationKey,
    ) {
        if (trim($integrationKey) === '') {
            throw new InvalidArgumentException('Integration key must not be empty.');
        }
    }

    public function getAccessToken(): string
    {
        return $this->integrationKey;
    }

    public function invalidate(): void
    {
    }

    public function cacheKey(): string
    {
        return 'ik_' . substr(hash('sha256', $this->integrationKey), 0, 32);
    }

    public function __debugInfo(): array
    {
        return ['integrationKey' => '***'];
    }
}
