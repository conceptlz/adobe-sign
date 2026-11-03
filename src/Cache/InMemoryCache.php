<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Cache;

use Psr\SimpleCache\CacheInterface;

/**
 * Minimal PSR-16 cache used when the caller doesn't supply one.
 * Lives for the process only, so base URI discovery runs once per process.
 */
final class InMemoryCache implements CacheInterface
{
    /** @var array<string, array{0: mixed, 1: ?int}> value, expiry timestamp */
    private array $items = [];

    public function get(string $key, mixed $default = null): mixed
    {
        if (!$this->has($key)) {
            return $default;
        }

        return $this->items[$key][0];
    }

    public function set(string $key, mixed $value, null|int|\DateInterval $ttl = null): bool
    {
        if ($ttl instanceof \DateInterval) {
            $ttl = (new \DateTimeImmutable())->add($ttl)->getTimestamp() - time();
        }
        if ($ttl !== null && $ttl <= 0) {
            return $this->delete($key);
        }

        $this->items[$key] = [$value, $ttl === null ? null : time() + $ttl];

        return true;
    }

    public function delete(string $key): bool
    {
        unset($this->items[$key]);

        return true;
    }

    public function clear(): bool
    {
        $this->items = [];

        return true;
    }

    public function getMultiple(iterable $keys, mixed $default = null): iterable
    {
        $out = [];
        foreach ($keys as $key) {
            $out[$key] = $this->get($key, $default);
        }

        return $out;
    }

    /** @param iterable<string, mixed> $values */
    public function setMultiple(iterable $values, null|int|\DateInterval $ttl = null): bool
    {
        foreach ($values as $key => $value) {
            $this->set((string) $key, $value, $ttl);
        }

        return true;
    }

    public function deleteMultiple(iterable $keys): bool
    {
        foreach ($keys as $key) {
            $this->delete($key);
        }

        return true;
    }

    public function has(string $key): bool
    {
        if (!isset($this->items[$key])) {
            return false;
        }

        $expires = $this->items[$key][1];
        if ($expires !== null && $expires <= time()) {
            unset($this->items[$key]);

            return false;
        }

        return true;
    }
}
