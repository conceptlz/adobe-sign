<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

/**
 * An OAuth token pair as persisted in a TokenStore.
 */
final class AccessToken
{
    public function __construct(
        #[\SensitiveParameter] public readonly string $accessToken,
        #[\SensitiveParameter] public readonly ?string $refreshToken,
        public readonly ?\DateTimeImmutable $expiresAt,
        /** Shard the token belongs to, from the OAuth redirect's api_access_point. */
        public readonly ?string $apiAccessPoint = null,
    ) {
    }

    public function isExpired(?\DateTimeImmutable $now = null, int $leewaySeconds = 60): bool
    {
        if ($this->expiresAt === null) {
            return false;
        }

        $now ??= new \DateTimeImmutable();

        return $this->expiresAt->getTimestamp() - $leewaySeconds <= $now->getTimestamp();
    }

    /** @return array{access_token: string, refresh_token: ?string, expires_at: ?int, api_access_point: ?string} */
    public function toArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'refresh_token' => $this->refreshToken,
            'expires_at' => $this->expiresAt?->getTimestamp(),
            'api_access_point' => $this->apiAccessPoint,
        ];
    }

    /** @param array{access_token: string, refresh_token?: ?string, expires_at?: ?int, api_access_point?: ?string} $data */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['access_token'],
            $data['refresh_token'] ?? null,
            isset($data['expires_at']) ? (new \DateTimeImmutable())->setTimestamp((int) $data['expires_at']) : null,
            $data['api_access_point'] ?? null,
        );
    }

    public function __debugInfo(): array
    {
        return [
            'accessToken' => '***',
            'refreshToken' => $this->refreshToken === null ? null : '***',
            'expiresAt' => $this->expiresAt,
            'apiAccessPoint' => $this->apiAccessPoint,
        ];
    }
}
