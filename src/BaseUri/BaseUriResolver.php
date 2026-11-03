<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\BaseUri;

use Conceptlz\AdobeSign\Auth\ProvidesApiAccessPoint;
use Conceptlz\AdobeSign\Auth\TokenProvider;
use Conceptlz\AdobeSign\Exception\ApiException;
use Conceptlz\AdobeSign\Exception\ErrorMapper;
use Conceptlz\AdobeSign\Exception\TransportException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\SimpleCache\CacheInterface;

/**
 * Finds the data-center shard for an account via GET /baseUris and caches it (PSR-16).
 *
 * The bootstrap host is shard-agnostic; Adobe answers with the account's apiAccessPoint
 * (e.g. https://api.na1.adobesign.com/) and every other call must go there, or the API
 * returns 403 INVALID_API_ACCESS_POINT.
 *
 * @internal AdobeSign builds it; configure it through ClientOptions and AdobeSign's $cache.
 */
final class BaseUriResolver
{
    /** Appended to the access point to form the API root. */
    public const API_PATH = 'api/rest/v6';
    private const CACHE_PREFIX = 'adobe_sign.base_uri.';

    /** @var array<string, true> accounts whose token-provided access point was rejected */
    private array $distrustProvided = [];

    /**
     * @param ClientInterface $client sends GET /baseUris (AdobeSign passes its middleware pipeline)
     * @param int $ttlSeconds how long a discovered root stays cached
     */
    public function __construct(
        private readonly ClientInterface $client,
        private readonly RequestFactoryInterface $requests,
        private readonly CacheInterface $cache,
        private readonly string $bootstrapUrl = 'https://api.adobesign.com',
        private readonly int $ttlSeconds = 86400,
    ) {
    }

    /**
     * The account's API root: the token's own access point if it carries one, else the cache,
     * else GET /baseUris.
     *
     * @return string API root for the account, e.g. "https://api.na1.adobesign.com/api/rest/v6"
     * @throws ApiException when discovery fails or returns a non-HTTPS access point
     * @throws TransportException when the discovery request gets no response
     */
    public function resolve(TokenProvider $tokens): string
    {
        $key = self::CACHE_PREFIX . $tokens->cacheKey();

        // OAuth tokens carry their shard; no discovery call needed unless it proved stale.
        if ($tokens instanceof ProvidesApiAccessPoint && !isset($this->distrustProvided[$key])) {
            $provided = $tokens->apiAccessPoint();
            if ($provided !== null) {
                return self::apiRoot($provided);
            }
        }

        $cached = $this->cache->get($key);
        if (is_string($cached) && $cached !== '') {
            return $cached;
        }

        $apiRoot = self::apiRoot($this->discover($tokens));
        $this->cache->set($key, $apiRoot, $this->ttlSeconds);

        return $apiRoot;
    }

    /**
     * Seed the cache from a known access point, e.g. the api_access_point an OAuth redirect returns.
     *
     * @throws ApiException when $apiAccessPoint is not HTTPS
     */
    public function remember(TokenProvider $tokens, string $apiAccessPoint): void
    {
        $this->cache->set(self::CACHE_PREFIX . $tokens->cacheKey(), self::apiRoot($apiAccessPoint), $this->ttlSeconds);
    }

    /**
     * Drop what we know about this account's shard (cached or token-provided) so the next
     * call rediscovers it via GET /baseUris.
     */
    public function forget(TokenProvider $tokens): void
    {
        $key = self::CACHE_PREFIX . $tokens->cacheKey();
        $this->cache->delete($key);
        $this->distrustProvided[$key] = true;
    }

    /** GET /baseUris on the bootstrap host; returns the raw apiAccessPoint. */
    private function discover(TokenProvider $tokens): string
    {
        $request = $this->requests
            ->createRequest('GET', rtrim($this->bootstrapUrl, '/') . '/' . self::API_PATH . '/baseUris')
            ->withHeader('Authorization', 'Bearer ' . $tokens->getAccessToken())
            ->withHeader('Accept', 'application/json');

        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            throw new TransportException('baseUris discovery failed: ' . $e->getMessage(), 0, $e);
        }

        if ($response->getStatusCode() !== 200) {
            throw ErrorMapper::fromResponse($request, $response);
        }

        $data = json_decode((string) $response->getBody(), true);
        $accessPoint = is_array($data) ? ($data['apiAccessPoint'] ?? null) : null;
        if (!is_string($accessPoint)) {
            throw new ApiException('baseUris response has no apiAccessPoint.', 200, null, $request, $response);
        }

        return $accessPoint;
    }

    /** "https://api.na1.adobesign.com/" -> "https://api.na1.adobesign.com/api/rest/v6", HTTPS only. */
    private static function apiRoot(string $accessPoint): string
    {
        $parts = parse_url($accessPoint);
        if (($parts['scheme'] ?? null) !== 'https' || empty($parts['host'])) {
            throw new ApiException(sprintf('Refusing non-HTTPS apiAccessPoint "%s".', $accessPoint), 200, null);
        }

        return rtrim($accessPoint, '/') . '/' . self::API_PATH;
    }
}
