<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;

/**
 * Credentials and endpoints for Acrobat Sign's OAuth 2.0 authorization-code flow.
 * Values come from the "Configure OAuth" page of your API application.
 */
final class OAuthConfig
{
    /**
     * @param list<string> $allowedDomains registrable domains an api_access_point may belong to.
     *                                     The callback's api_access_point arrives in a query string,
     *                                     so it is checked before the client secret is sent there.
     */
    public function __construct(
        public readonly string $clientId,
        #[\SensitiveParameter] public readonly string $clientSecret,
        public readonly string $redirectUri,
        /** Shard-agnostic authorization page; Adobe routes the user to their data center. */
        public readonly string $authorizationUrl = 'https://secure.adobesign.com/public/oauth/v2',
        /** Used for the code exchange when the callback carries no api_access_point. */
        public readonly string $tokenHost = 'https://api.adobesign.com',
        public readonly array $allowedDomains = ['adobesign.com', 'echosign.com', 'adobesigngov.us'],
    ) {
        if ($clientId === '' || $clientSecret === '') {
            throw new InvalidArgumentException('OAuth client id and secret must not be empty.');
        }
        $redirect = parse_url($redirectUri);
        $isLoopback = ($redirect['scheme'] ?? null) === 'http' && in_array($redirect['host'] ?? null, ['localhost', '127.0.0.1'], true);
        if (($redirect['scheme'] ?? null) !== 'https' && !$isLoopback) {
            throw new InvalidArgumentException('OAuth redirect URI must be HTTPS (or http://localhost for development).');
        }
    }

    /**
     * Normalised "https://host/" if $accessPoint is an HTTPS URL on an allowed domain.
     */
    public function validateAccessPoint(string $accessPoint): string
    {
        $parts = parse_url($accessPoint);
        $host = strtolower($parts['host'] ?? '');

        $allowed = false;
        foreach ($this->allowedDomains as $domain) {
            $domain = strtolower($domain);
            if ($host === $domain || str_ends_with($host, '.' . $domain)) {
                $allowed = true;
                break;
            }
        }

        if (($parts['scheme'] ?? null) !== 'https' || !$allowed || isset($parts['user']) || isset($parts['pass'])) {
            throw new InvalidArgumentException(sprintf('Untrusted api_access_point "%s".', $accessPoint));
        }

        return 'https://' . $host . (isset($parts['port']) ? ':' . $parts['port'] : '') . '/';
    }

    public function __debugInfo(): array
    {
        return [
            'clientId' => $this->clientId,
            'clientSecret' => '***',
            'redirectUri' => $this->redirectUri,
            'authorizationUrl' => $this->authorizationUrl,
            'tokenHost' => $this->tokenHost,
            'allowedDomains' => $this->allowedDomains,
        ];
    }
}
