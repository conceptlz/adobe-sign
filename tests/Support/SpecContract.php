<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Support;

use JsonSchema\Constraints\Constraint;
use JsonSchema\Constraints\Factory;
use JsonSchema\SchemaStorage;
use JsonSchema\Validator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use function Conceptlz\AdobeSign\Spec\normalize;

/**
 * Checks HTTP traffic against Adobe's published v6 spec (spec/adobe-sign-v6.json).
 *
 * Used by the test suite so every request the SDK builds, and every canned response the tests
 * feed back, is held to the same contract the real API publishes.
 */
final class SpecContract
{
    private const API_PREFIX = '/api/rest/v6';
    private const SCHEMA_URI = 'file://adobe-sign-v6';

    /** @var array<string, mixed>|null */
    private static ?array $spec = null;

    private static ?SchemaStorage $storage = null;

    /** @var list<array{regex: string, template: string, params: int}>|null */
    private static ?array $routes = null;

    /**
     * @return list<string> violations; empty when the request matches the spec
     */
    public static function checkRequest(RequestInterface $request): array
    {
        $path = $request->getUri()->getPath();
        if (!str_starts_with($path, self::API_PREFIX . '/')) {
            return []; // OAuth endpoints etc. are outside the REST spec
        }

        $method = strtolower($request->getMethod());
        $operation = self::operation($method, substr($path, strlen(self::API_PREFIX)));
        if ($operation === null) {
            return [sprintf('%s %s is not an operation in the v6 spec', strtoupper($method), $path)];
        }
        [$template, $op] = $operation;
        $label = strtoupper($method) . ' ' . $template;
        $errors = [];

        parse_str($request->getUri()->getQuery(), $query);
        $known = array_map(static fn (array $p) => $p['name'], array_filter($op['parameters'] ?? [], static fn (array $p) => ($p['in'] ?? '') === 'query'));
        foreach (array_keys($query) as $name) {
            if (!in_array($name, $known, true)) {
                $errors[] = "$label: query parameter '$name' is not in the spec";
            }
        }

        $contentType = strtolower($request->getHeaderLine('Content-Type'));
        $body = (string) $request->getBody();

        if (str_starts_with($contentType, 'application/json')) {
            $ref = $op['requestBody']['content']['application/json']['schema']['$ref'] ?? null;
            if ($ref === null) {
                $errors[] = "$label: sends a JSON body but the spec defines none";
            } else {
                foreach (self::validate(basename($ref), json_decode($body)) as $error) {
                    $errors[] = "$label request: $error";
                }
            }
        } elseif (str_starts_with($contentType, 'multipart/form-data')) {
            $parts = array_keys($op['requestBody']['content']['multipart/form-data']['schema']['properties'] ?? []);
            preg_match_all('/(?<![a-z])name="([^"]+)"/i', $body, $m);
            foreach (array_unique($m[1]) as $name) {
                if (!in_array($name, $parts, true)) {
                    $errors[] = "$label: multipart part '$name' is not in the spec (expected one of " . implode(', ', $parts) . ')';
                }
            }
        }

        return $errors;
    }

    /**
     * @return list<string> violations for a 2xx JSON response; non-JSON and error responses are not checked
     */
    public static function checkResponse(RequestInterface $request, ResponseInterface $response): array
    {
        $path = $request->getUri()->getPath();
        $status = $response->getStatusCode();
        if (!str_starts_with($path, self::API_PREFIX . '/') || $status < 200 || $status >= 300) {
            return [];
        }
        if (!str_contains(strtolower($response->getHeaderLine('Content-Type')), 'json')) {
            return [];
        }

        $method = strtolower($request->getMethod());
        $operation = self::operation($method, substr($path, strlen(self::API_PREFIX)));
        if ($operation === null) {
            return [];
        }
        [$template, $op] = $operation;

        $declared = $op['responses'][(string) $status] ?? null;
        if ($declared === null) {
            return [sprintf('%s %s: the spec declares no %d response', strtoupper($method), $template, $status)];
        }

        $ref = $declared['content']['application/json']['schema']['$ref'] ?? null;
        if ($ref === null) {
            return [];
        }

        $body = (string) $response->getBody();
        $response->getBody()->rewind();

        return array_map(
            static fn (string $e) => sprintf('%s %s response: %s', strtoupper($method), $template, $e),
            self::validate(basename($ref), json_decode($body)),
        );
    }

    /**
     * Validate decoded JSON (objects, not assoc arrays) against a component schema.
     *
     * @return list<string>
     */
    public static function validate(string $definition, mixed $data): array
    {
        self::load();

        $validator = new Validator(new Factory(self::$storage, null, Constraint::CHECK_MODE_NORMAL));
        $validator->validate($data, (object) ['$ref' => self::SCHEMA_URI . '#/definitions/' . $definition]);

        return array_map(
            static fn (array $e) => sprintf('%s: %s', $e['property'] !== '' ? $e['property'] : '(root)', $e['message']),
            $validator->getErrors(),
        );
    }

    /**
     * @return array{0: string, 1: array<string, mixed>}|null [path template, operation]
     */
    private static function operation(string $method, string $path): ?array
    {
        self::load();

        foreach (self::$routes as $route) {
            if (preg_match($route['regex'], $path) && isset(self::$spec['paths'][$route['template']][$method])) {
                return [$route['template'], self::$spec['paths'][$route['template']][$method]];
            }
        }

        return null;
    }

    private static function load(): void
    {
        if (self::$spec !== null) {
            return;
        }

        require_once dirname(__DIR__, 2) . '/spec/normalize.php';

        $raw = json_decode((string) file_get_contents(dirname(__DIR__, 2) . '/spec/adobe-sign-v6.json'), true, 512, JSON_THROW_ON_ERROR);
        self::$spec = $raw;

        self::$storage = new SchemaStorage();
        self::$storage->addSchema(self::SCHEMA_URI, json_decode(json_encode(normalize($raw), JSON_THROW_ON_ERROR)));

        // Literal segments win over parameters: /documents/imageUrls before /documents/{documentId}.
        $routes = [];
        foreach (array_keys($raw['paths']) as $template) {
            $routes[] = [
                'regex' => '#^' . preg_replace('#\\\\\{[^/]+?\\\\\}#', '[^/]+', preg_quote($template, '#')) . '$#',
                'template' => $template,
                'params' => substr_count($template, '{'),
            ];
        }
        usort($routes, static fn (array $a, array $b) => $a['params'] <=> $b['params']);
        self::$routes = $routes;
    }
}
