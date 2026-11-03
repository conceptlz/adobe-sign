<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

use Conceptlz\AdobeSign\Exception\OAuthException;
use Psr\Clock\ClockInterface;

/**
 * Serves one user's OAuth access token from a TokenStore, refreshing it shortly before
 * it expires (or after the API rejects it) and writing the new token back.
 *
 * Adobe doesn't rotate refresh tokens, so two processes refreshing at once both end up
 * with valid access tokens; no locking is needed.
 */
final class OAuthTokenProvider implements TokenProvider, ProvidesApiAccessPoint
{
    private ?AccessToken $token = null;

    private bool $forceRefresh = false;

    /**
     * @param string $key identifies the user/account in the store (e.g. your user id)
     */
    public function __construct(
        private readonly OAuthClient $client,
        private readonly TokenStore $store,
        private readonly string $key,
        private readonly ClockInterface $clock = new SystemClock(),
        private readonly int $refreshLeewaySeconds = 60,
    ) {
    }

    public function getAccessToken(): string
    {
        $token = $this->current();

        if ($this->forceRefresh || $token->isExpired($this->clock->now(), $this->refreshLeewaySeconds)) {
            $token = $this->client->refresh($token);
            $this->store->put($this->key, $token);
            $this->token = $token;
            $this->forceRefresh = false;
        }

        return $token->accessToken;
    }

    public function invalidate(): void
    {
        $this->token = null; // re-read: another process may already have refreshed
        $this->forceRefresh = true;
    }

    public function cacheKey(): string
    {
        return 'oauth_' . substr(hash('sha256', $this->key), 0, 32);
    }

    public function apiAccessPoint(): ?string
    {
        return $this->current()->apiAccessPoint;
    }

    private function current(): AccessToken
    {
        return $this->token ??= $this->store->get($this->key)
            ?? throw new OAuthException(
                sprintf('No OAuth token stored for "%s"; send the user through authorization first.', $this->key),
                401,
                'NO_TOKEN',
            );
    }
}
