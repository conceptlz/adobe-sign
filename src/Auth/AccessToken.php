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
        /** Null when the grant issued none; the token then can't be refreshed. */
        #[\SensitiveParameter] public readonly ?string $refreshToken,
        /** Null means "unknown": isExpired() then always says false. */
        public readonly ?\DateTimeImmutable $expiresAt,
        /** Shard the token belongs to, from the OAuth redirect's api_access_point. */
        public readonly ?string $apiAccessPoint = null,
    ) {
    }

    /**
     * True once $now is within $leewaySeconds of expiry, so refreshing happens before the API
     * starts rejecting the token.
     */
    public function isExpired(?\DateTimeImmutable $now = null, int $leewaySeconds = 60): bool
    {
        if ($this->expiresAt === null) {
            return false;
        }

        $now ??= new \DateTimeImmutable();

        return $this->expiresAt->getTimestamp() - $leewaySeconds <= $now->getTimestamp();
    }

    /**
     * Plain array for persisting (expires_at as a Unix timestamp); the inverse of fromArray().
     * Contains the secrets in clear text.
     *
     * @return array{access_token: string, refresh_token: ?string, expires_at: ?int, api_access_point: ?string}
     */
    public function toArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'refresh_token' => $this->refreshToken,
            'expires_at' => $this->expiresAt?->getTimestamp(),
            'api_access_point' => $this->apiAccessPoint,
        ];
    }

    /**
     * Rebuild a token persisted with toArray().
     *
     * @param array{access_token: string, refresh_token?: ?string, expires_at?: ?int, api_access_point?: ?string} $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['access_token'],
            $data['refresh_token'] ?? null,
            isset($data['expires_at']) ? (new \DateTimeImmutable())->setTimestamp((int) $data['expires_at']) : null,
            $data['api_access_point'] ?? null,
        );
    }

    /**
     * Masks both tokens in var_dump() and similar.
     *
     * @return array<string, mixed>
     */
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
