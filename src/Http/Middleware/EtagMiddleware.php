<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http\Middleware;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Optimistic concurrency without bookkeeping in user code.
 *
 * Remembers the ETag of every successful GET by path. A later PUT/DELETE that has no
 * If-Match gets the ETag of the same path, or of its nearest parent: Adobe expects the
 * agreement's ETag on e.g. PUT /agreements/{id}/state. A 412 then surfaces as
 * PreconditionFailedException. Callers can always set If-Match themselves.
 *
 * The cache lives as long as the AdobeSign instance (shared with its asUser() copies) and keeps
 * the most recent $capacity paths.
 *
 * @internal AdobeSign installs it unless ClientOptions::$autoEtag is false.
 */
final class EtagMiddleware implements Middleware
{
    private const WRITE_METHODS = ['PUT', 'DELETE'];
    private const API_PREFIX = '/api/rest/v6/';

    /** @var array<string, string> path => etag, oldest first */
    private array $etags = [];

    /**
     * @param int $capacity paths remembered before the oldest is evicted
     */
    public function __construct(private readonly int $capacity = 500)
    {
    }

    /** Add If-Match to writes and record ETags from the response. */
    public function handle(RequestInterface $request, callable $next): ResponseInterface
    {
        $path = rtrim($request->getUri()->getPath(), '/');
        $method = strtoupper($request->getMethod());
        $isWrite = in_array($method, self::WRITE_METHODS, true);

        if ($isWrite && !$request->hasHeader('If-Match') && ($etag = $this->lookup($path)) !== null) {
            $request = $request->withHeader('If-Match', $etag);
        }

        $response = $next($request);
        $status = $response->getStatusCode();

        if ($status >= 200 && $status < 300) {
            $etag = $response->getHeaderLine('ETag');
            if ($method === 'GET' && $etag !== '') {
                // A fresh read supersedes anything remembered for paths beneath it (e.g. an ETag a
                // PUT .../state returned earlier), so lookups can't prefer a stale, more specific entry.
                $this->forgetTree($path);
                $this->remember($path, $etag);
            } elseif ($isWrite) {
                // The write changed the resource; any ETag we held for it (or its children) is stale.
                $root = $this->resourceRoot($path);
                $this->forgetTree($root);
                // Only trust a write's ETag for the resource it wrote. A sub-resource write such as
                // PUT /agreements/{id}/state may return an ETag, but the next state change must use
                // the agreement's current ETag from a GET; remembering it here caused 412s (seen live).
                if ($etag !== '' && $path === $root) {
                    $this->remember($path, $etag);
                }
            }
        }

        return $response;
    }

    /**
     * The ETag remembered for exactly this request path (e.g. "/api/rest/v6/agreements/1"),
     * without the parent lookup that writes use.
     */
    public function etagFor(string $path): ?string
    {
        return $this->etags[rtrim($path, '/')] ?? null;
    }

    private function lookup(string $path): ?string
    {
        foreach ($this->ancestors($path) as $p) {
            if (isset($this->etags[$p])) {
                return $this->etags[$p];
            }
        }

        return null;
    }

    private function remember(string $path, string $etag): void
    {
        unset($this->etags[$path]);
        $this->etags[$path] = $etag;

        if (count($this->etags) > $this->capacity) {
            array_shift($this->etags);
        }
    }

    /**
     * The ETag that guarded a write may have come from a parent resource (state change uses the
     * agreement's ETag), so invalidate from whichever ancestor we actually used.
     */
    private function resourceRoot(string $path): string
    {
        foreach ($this->ancestors($path) as $p) {
            if (isset($this->etags[$p])) {
                return $p;
            }
        }

        return $path;
    }

    /** Drop $root and everything below it. */
    private function forgetTree(string $root): void
    {
        foreach (array_keys($this->etags) as $p) {
            if ($p === $root || str_starts_with($p, $root . '/')) {
                unset($this->etags[$p]);
            }
        }
    }

    /**
     * The path itself, then each parent down to the item level: for
     * /api/rest/v6/agreements/1/members/participantSets/2 that ends at /api/rest/v6/agreements/1.
     * A collection (/agreements) never lends its ETag to an item.
     *
     * @return list<string>
     */
    private function ancestors(string $path): array
    {
        $prefixAt = strpos($path, self::API_PREFIX);
        if ($prefixAt === false) {
            return [$path];
        }

        $prefix = substr($path, 0, $prefixAt + strlen(self::API_PREFIX));
        $segments = explode('/', substr($path, strlen($prefix)));

        $out = [];
        for ($n = count($segments); $n >= 2; $n--) {
            $out[] = $prefix . implode('/', array_slice($segments, 0, $n));
        }

        return $out ?: [$path];
    }
}
