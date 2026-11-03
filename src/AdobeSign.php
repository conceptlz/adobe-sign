<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign;

use Conceptlz\AdobeSign\Auth\IntegrationKeyTokenProvider;
use Conceptlz\AdobeSign\Auth\OAuthClient;
use Conceptlz\AdobeSign\Auth\OAuthTokenProvider;
use Conceptlz\AdobeSign\Auth\TokenProvider;
use Conceptlz\AdobeSign\Auth\TokenStore;
use Conceptlz\AdobeSign\BaseUri\BaseUriResolver;
use Conceptlz\AdobeSign\Cache\InMemoryCache;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Http\Middleware\EtagMiddleware;
use Conceptlz\AdobeSign\Http\Middleware\Middleware;
use Conceptlz\AdobeSign\Http\Middleware\RetryMiddleware;
use Conceptlz\AdobeSign\Http\Middleware\UserAgentMiddleware;
use Conceptlz\AdobeSign\Http\NativeSleeper;
use Conceptlz\AdobeSign\Http\Pipeline;
use Conceptlz\AdobeSign\Http\Sleeper;
use Conceptlz\AdobeSign\Http\Transport;
use Conceptlz\AdobeSign\Resource\Agreements;
use Conceptlz\AdobeSign\Resource\LibraryDocuments;
use Conceptlz\AdobeSign\Resource\MegaSigns;
use Conceptlz\AdobeSign\Resource\TransientDocuments;
use Conceptlz\AdobeSign\Resource\Users;
use Conceptlz\AdobeSign\Resource\Webhooks;
use Conceptlz\AdobeSign\Resource\Widgets;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Psr\SimpleCache\CacheInterface;

/**
 * Entry point: an authenticated client for one Acrobat Sign account, with one accessor per
 * resource group.
 *
 *     $sign = AdobeSign::withIntegrationKey(getenv('ADOBE_SIGN_INTEGRATION_KEY'));
 *     $docId = $sign->transientDocuments()->upload('/path/contract.pdf');
 *
 * Any PSR-18 client / PSR-17 factory is auto-discovered when not passed in. Resource methods
 * throw Exception\ApiException (or a subclass) on error responses and
 * Exception\TransportException on network failures.
 */
final class AdobeSign
{
    /** SDK version, sent in the default User-Agent. */
    public const VERSION = '0.2.1';

    private Transport $transport;

    /** @var array<class-string, object> */
    private array $resources = [];

    /**
     * Usually built through withIntegrationKey() or withOAuth(). No request is made until the
     * first API call; the account's data center is discovered then.
     *
     * @param CacheInterface|null $cache holds the discovered data-center URL; defaults to an in-process cache
     * @param LoggerInterface|null $logger request and retry logs; never receives headers or bodies
     * @param Sleeper|null $sleeper waits between retries; replace it in tests
     * @param list<Middleware> $middleware extra middleware, run outermost (before User-Agent, retry and ETag)
     */
    public function __construct(
        TokenProvider $tokens,
        ?ClientInterface $httpClient = null,
        ?RequestFactoryInterface $requestFactory = null,
        ?StreamFactoryInterface $streamFactory = null,
        ?CacheInterface $cache = null,
        ?LoggerInterface $logger = null,
        ClientOptions $options = new ClientOptions(),
        ?Sleeper $sleeper = null,
        array $middleware = [],
    ) {
        $httpClient ??= Psr18ClientDiscovery::find();
        $requestFactory ??= Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory ??= Psr17FactoryDiscovery::findStreamFactory();
        $logger ??= new NullLogger();

        $stack = [
            ...$middleware,
            new UserAgentMiddleware($options->userAgent),
            new RetryMiddleware(
                maxRetries: $options->maxRetries,
                baseDelaySeconds: $options->retryBaseDelay,
                maxDelaySeconds: $options->maxRetryDelay,
                sleeper: $sleeper ?? new NativeSleeper(),
                logger: $logger,
            ),
        ];
        if ($options->autoEtag) {
            $stack[] = new EtagMiddleware();
        }
        $pipeline = new Pipeline($httpClient, $stack);

        $this->transport = new Transport(
            $pipeline,
            $requestFactory,
            $streamFactory,
            $tokens,
            new BaseUriResolver($pipeline, $requestFactory, $cache ?? new InMemoryCache(), $options->bootstrapUrl, $options->baseUriTtl),
            $logger,
        );
    }

    /**
     * Client authenticated with an account's Integration Key (non-expiring, no OAuth flow).
     *
     * @param mixed ...$args any other constructor argument, by name
     * @throws InvalidArgumentException when the key is empty
     */
    public static function withIntegrationKey(#[\SensitiveParameter] string $integrationKey, mixed ...$args): self
    {
        return new self(new IntegrationKeyTokenProvider($integrationKey), ...$args);
    }

    /**
     * Client for one user who authorized your app via OAuth; tokens refresh automatically.
     *
     * @param string $key the key their token was stored under in $store
     * @param mixed ...$args any other constructor argument, by name
     */
    public static function withOAuth(OAuthClient $oauth, TokenStore $store, string $key, mixed ...$args): self
    {
        return new self(new OAuthTokenProvider($oauth, $store, $key), ...$args);
    }

    /**
     * Act as another user in the account (requires an admin-level token), via the x-api-user header.
     *
     * Returns a new client; this one is unchanged. Both share the HTTP pipeline and its ETag memory.
     *
     * @param string $user "email:jane@example.com", "userid:CBJCHBCAABAA...", or a bare email / user id
     * @throws InvalidArgumentException when $user is blank
     */
    public function asUser(string $user): self
    {
        $user = trim($user);
        if ($user === '') {
            throw new InvalidArgumentException('asUser() needs an email or user id.');
        }
        if (!preg_match('/^(email|userid):/i', $user)) {
            $user = (str_contains($user, '@') ? 'email:' : 'userid:') . $user;
        }

        $clone = clone $this;
        $clone->transport = $this->transport->withHeader('x-api-user', $user);
        $clone->resources = [];

        return $clone;
    }

    /** Agreements: create, track, remind, download. */
    public function agreements(): Agreements
    {
        return $this->resource(Agreements::class);
    }

    /** File uploads to reference from an agreement within 7 days. */
    public function transientDocuments(): TransientDocuments
    {
        return $this->resource(TransientDocuments::class);
    }

    /** Library templates. */
    public function libraryDocuments(): LibraryDocuments
    {
        return $this->resource(LibraryDocuments::class);
    }

    /** Webhook subscriptions (receiving them: Webhook\WebhookHandler). */
    public function webhooks(): Webhooks
    {
        return $this->resource(Webhooks::class);
    }

    /** Users in the account. */
    public function users(): Users
    {
        return $this->resource(Users::class);
    }

    /** Web forms. */
    public function widgets(): Widgets
    {
        return $this->resource(Widgets::class);
    }

    /** Send in Bulk. */
    public function megaSigns(): MegaSigns
    {
        return $this->resource(MegaSigns::class);
    }

    /**
     * One instance per resource class, created on first use.
     *
     * @template T of Resource\AbstractResource
     * @param class-string<T> $class
     * @return T
     */
    private function resource(string $class): object
    {
        $resource = $this->resources[$class] ??= new $class($this->transport);
        if (!$resource instanceof $class) {
            throw new \LogicException(sprintf('Resource cache holds %s for %s.', $resource::class, $class));
        }

        return $resource;
    }
}
