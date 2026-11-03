<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Pagination;

/**
 * Walks Adobe's cursor pagination lazily: the next page is fetched only when the
 * consumer iterates past the current one.
 */
final class CursorPaginator
{
    /**
     * @template T
     * @param callable(?string $cursor): array<mixed> $fetchPage returns the decoded page body
     * @param string $itemsKey e.g. "userAgreementList"
     * @param callable(array<mixed>): T $map
     * @return \Generator<int, T>
     */
    public static function iterate(callable $fetchPage, string $itemsKey, callable $map): \Generator
    {
        $cursor = null;
        $seen = [];

        do {
            $page = $fetchPage($cursor);

            foreach ($page[$itemsKey] ?? [] as $item) {
                yield $map($item);
            }

            $cursor = $page['page']['nextCursor'] ?? null;
            if ($cursor === '' || ($cursor !== null && isset($seen[$cursor]))) {
                $cursor = null; // end, or a server returning the same cursor again
            }
            if ($cursor !== null) {
                $seen[$cursor] = true;
            }
        } while ($cursor !== null);
    }
}
