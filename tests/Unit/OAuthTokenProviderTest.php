<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\AdobeSign;
use Conceptlz\AdobeSign\Auth\AccessToken;
use Conceptlz\AdobeSign\Auth\InMemoryTokenStore;
use Conceptlz\AdobeSign\Auth\OAuthClient;
use Conceptlz\AdobeSign\Auth\OAuthConfig;
use Conceptlz\AdobeSign\Auth\OAuthTokenProvider;
use Conceptlz\AdobeSign\Exception\OAuthException;
use Conceptlz\AdobeSign\Tests\FrozenClock;
use Conceptlz\AdobeSign\Tests\TestCase;

final class OAuthTokenProviderTest extends TestCase
{
    private const EU = 'https://api.eu1.adobesign.com/';

    private FrozenClock $clock;

    private InMemoryTokenStore $store;

    protected function setUp(): void
    {
        parent::setUp();
        $this->clock = new FrozenClock();
        $this->store = new InMemoryTokenStore();
    }

    public function test_valid_token_calls_its_own_shard_without_discovery(): void
    {
        $this->storeToken(expiresIn: 3600);
        $this->queue(200, 'agreement');

        $this->sign()->agreements()->get('agr-1');

        self::assertCount(1, $this->requests(), 'no GET /baseUris');
        self::assertSame(self::EU . 'api/rest/v6/agreements/agr-1', (string) $this->request(0)->getUri());
        self::assertSame('Bearer stored-access', $this->request(0)->getHeaderLine('Authorization'));
    }

    public function test_expired_token_is_refreshed_and_persisted_first(): void
    {
        $this->storeToken(expiresIn: 3600);
        $this->clock->advance(3600);
        $this->queue(200, 'oauth_refresh');
        $this->queue(200, 'agreement');

        $this->sign()->agreements()->get('agr-1');

        self::assertSame(self::EU . 'oauth/v2/refresh', (string) $this->request(0)->getUri());
        self::assertSame('Bearer 3AAABLblqZhRefreshedAccessToken*', $this->request(1)->getHeaderLine('Authorization'));

        $saved = $this->store->get('user-42');
        self::assertNotNull($saved);
        self::assertSame('3AAABLblqZhRefreshedAccessToken*', $saved->accessToken);
        self::assertSame('stored-refresh', $saved->refreshToken);
        self::assertSame(self::EU, $saved->apiAccessPoint);
    }

    public function test_refreshes_inside_the_leeway_window(): void
    {
        $this->storeToken(expiresIn: 30); // default leeway is 60s
        $this->queue(200, 'oauth_refresh');
        $this->queue(200, 'agreement');

        $this->sign()->agreements()->get('agr-1');

        self::assertStringEndsWith('/oauth/v2/refresh', (string) $this->request(0)->getUri());
    }

    public function test_token_rejected_by_api_is_refreshed_and_request_retried_once(): void
    {
        $this->storeToken(expiresIn: 3600);
        $this->queue(401, 'error_invalid_access_token');
        $this->queue(200, 'oauth_refresh');
        $this->queue(200, 'agreement');

        $agreement = $this->sign()->agreements()->get('agr-1');

        self::assertSame('Mutual NDA', $agreement->name);
        self::assertSame('Bearer stored-access', $this->request(0)->getHeaderLine('Authorization'));
        self::assertStringEndsWith('/oauth/v2/refresh', (string) $this->request(1)->getUri());
        self::assertSame('Bearer 3AAABLblqZhRefreshedAccessToken*', $this->request(2)->getHeaderLine('Authorization'));
    }

    public function test_dead_refresh_token_surfaces_as_oauth_exception(): void
    {
        $this->storeToken(expiresIn: 3600);
        $this->clock->advance(7200);
        $this->queue(400, 'oauth_error_expired_token');

        try {
            $this->sign()->agreements()->get('agr-1');
            self::fail('Expected OAuthException');
        } catch (OAuthException $e) {
            self::assertSame('EXPIRED_TOKEN', $e->errorCode);
        }
    }

    public function test_missing_token_tells_you_to_authorize(): void
    {
        $this->expectException(OAuthException::class);
        $this->expectExceptionMessage('send the user through authorization first');

        $this->sign()->agreements()->get('agr-1');
    }

    public function test_stale_token_shard_falls_back_to_discovery(): void
    {
        $this->storeToken(expiresIn: 3600);
        $this->queue(403, 'error_invalid_api_access_point');
        $this->queueBaseUris(); // na4
        $this->queue(200, 'agreement');

        $this->sign()->agreements()->get('agr-1');

        self::assertStringStartsWith(self::EU, (string) $this->request(0)->getUri());
        self::assertSame('https://api.adobesign.com/api/rest/v6/baseUris', (string) $this->request(1)->getUri());
        self::assertSame(self::API . '/agreements/agr-1', (string) $this->request(2)->getUri());
    }

    public function test_cache_key_is_per_user_and_opaque(): void
    {
        $a = new OAuthTokenProvider($this->oauth(), $this->store, 'user-1');
        $b = new OAuthTokenProvider($this->oauth(), $this->store, 'user-2');

        self::assertNotSame($a->cacheKey(), $b->cacheKey());
        self::assertStringNotContainsString('user-1', $a->cacheKey());
    }

    public function test_with_oauth_factory(): void
    {
        $this->storeToken(expiresIn: 999_999_999);
        $this->queue(200, 'agreement');

        AdobeSign::withOAuth($this->oauth(), $this->store, 'user-42', httpClient: $this->http, requestFactory: $this->psr17, streamFactory: $this->psr17)
            ->agreements()->get('agr-1');

        self::assertSame('Bearer stored-access', $this->request(0)->getHeaderLine('Authorization'));
    }

    private function storeToken(int $expiresIn): void
    {
        $this->store->put('user-42', new AccessToken(
            'stored-access',
            'stored-refresh',
            $this->clock->now()->modify("+{$expiresIn} seconds"),
            self::EU,
        ));
    }

    private function sign(): AdobeSign
    {
        return new AdobeSign(
            new OAuthTokenProvider($this->oauth(), $this->store, 'user-42', $this->clock),
            httpClient: $this->http,
            requestFactory: $this->psr17,
            streamFactory: $this->psr17,
            cache: $this->cache,
            sleeper: $this->sleeper,
        );
    }

    private function oauth(): OAuthClient
    {
        return new OAuthClient(
            new OAuthConfig('client-id', 'secret', 'https://app.example.com/cb'),
            $this->http,
            $this->psr17,
            $this->psr17,
            $this->clock,
        );
    }
}
