<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Resource;

use Conceptlz\AdobeSign\Exception\ApiException;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Exception\TransportException;
use Conceptlz\AdobeSign\Http\Transport;
use Conceptlz\AdobeSign\Hydration\ModelMapper;
use Conceptlz\AdobeSign\Pagination\CursorPaginator;
use Psr\Http\Message\StreamInterface;

/**
 * Base for the API resource groups returned by AdobeSign (agreements(), users(), ...).
 *
 * Errors: every method that calls the API throws ApiException for a non-2xx answer (or a
 * subclass: AuthenticationException, NotFoundException, ValidationException,
 * RateLimitException, PreconditionFailedException) and TransportException when no response
 * arrived at all. Both implement Exception\AdobeSignException. Method docblocks list only the
 * exceptions specific to that method. Ids are path-encoded; an empty id throws
 * InvalidArgumentException before any request is made. A 2xx body that isn't valid JSON is
 * reported as ApiException too, so catching AdobeSignException covers every failure.
 */
abstract class AbstractResource
{
    /**
     * Resources are created by AdobeSign; get them from its accessors.
     *
     * @internal
     */
    public function __construct(protected readonly Transport $transport)
    {
    }

    /**
     * Encode a caller-supplied id for use as a path segment.
     *
     * @throws InvalidArgumentException when $id is empty
     */
    protected static function segment(string $id): string
    {
        if ($id === '') {
            throw new InvalidArgumentException('Resource id must not be empty.');
        }

        return rawurlencode($id);
    }

    /**
     * "libraryDocuments", "abc/def", "documents" -> "libraryDocuments/abc%2Fdef/documents".
     * Every argument after the first is treated as an id or literal and encoded.
     */
    protected static function path(string $collection, string ...$segments): string
    {
        return $collection . ($segments === [] ? '' : '/' . implode('/', array_map(self::segment(...), $segments)));
    }

    /**
     * GET a JSON resource as a generated model.
     *
     * @template T of object
     * @param class-string<T> $class
     * @param array<string, scalar|null> $query
     * @return T
     */
    protected function fetch(string $class, string $path, array $query = []): object
    {
        return ModelMapper::hydrate($class, $this->transport->json('GET', $path, $query));
    }

    /**
     * Lazily walk a cursor-paginated list, yielding generated models.
     *
     * @template T of object
     * @param array<string, scalar|null> $query
     * @param class-string<T> $itemClass
     * @return \Generator<int, T>
     */
    protected function paginate(string $path, array $query, string $itemsKey, string $itemClass): \Generator
    {
        return CursorPaginator::iterate(
            fn (?string $cursor): array => $this->transport->json('GET', $path, ['cursor' => $cursor] + $query),
            $itemsKey,
            static fn (array $item): object => ModelMapper::hydrate($itemClass, $item),
        );
    }

    /**
     * POST a creation payload and return the new resource's id.
     *
     * @param object|array<string, mixed> $payload
     * @throws ApiException on an error response, or when a 2xx response carries no id
     * @throws InvalidArgumentException when the payload can't be serialised (see payload())
     * @throws TransportException
     */
    protected function createResource(string $path, object|array $payload): string
    {
        $data = $this->transport->json('POST', $path, body: self::payload($payload));
        if (!isset($data['id'])) {
            throw new ApiException(sprintf('POST %s response has no id.', $path), 200, null);
        }

        return (string) $data['id'];
    }

    /**
     * POST and hydrate the response.
     *
     * @template T of object
     * @param object|array<string, mixed> $payload
     * @param class-string<T> $class
     * @return T
     */
    protected function postFor(string $class, string $path, object|array $payload): object
    {
        return ModelMapper::hydrate($class, $this->transport->json('POST', $path, body: self::payload($payload)));
    }

    /**
     * PUT a payload. If-Match is added by the ETag middleware when the resource was fetched first.
     *
     * @param object|array<string, mixed> $payload
     * @param array<string, scalar|null> $query
     */
    protected function put(string $path, object|array $payload, array $query = []): void
    {
        $this->transport->send('PUT', $path, $query, ['Accept' => 'application/json'], self::payload($payload));
    }

    /**
     * GET binary content (PDF, CSV) as a stream.
     *
     * @param array<string, scalar|null> $query
     */
    protected function download(string $path, array $query = [], string $accept = 'application/pdf, application/json'): StreamInterface
    {
        return $this->transport->send('GET', $path, $query, ['Accept' => $accept])->getBody();
    }

    /**
     * Generated model, builder with toArray(), or raw array -> request body.
     *
     * @param object|array<string, mixed> $payload
     * @return array<string, mixed>
     * @throws InvalidArgumentException for an object that is neither
     */
    protected static function payload(object|array $payload): array
    {
        if (is_array($payload)) {
            return $payload;
        }
        if (str_starts_with($payload::class, ModelMapper::MODEL_NAMESPACE)) {
            return ModelMapper::toArray($payload);
        }
        if (method_exists($payload, 'toArray')) {
            return $payload->toArray();
        }

        throw new InvalidArgumentException(sprintf('Cannot send %s as a request body.', $payload::class));
    }
}
