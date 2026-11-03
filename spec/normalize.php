<?php

/**
 * Turns Adobe's published v6 spec into plain JSON Schema (draft-04).
 *
 * Shared by the model generator (tools/jane/normalize-spec.php) and the test suite's
 * spec validator, so both read the spec the same way.
 *
 * The spec says "openapi: 3.1.0" but is 3.0-shaped (no type arrays, const, $defs) and uses
 * Swagger-era types that aren't JSON Schema. Each rewrite is named in $stats so a spec
 * update that introduces a new oddity shows up in the generator's output.
 */

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Spec;

/**
 * @param array<string, mixed> $spec decoded OpenAPI document
 * @param array<string, int> $stats incremented per rewrite rule
 * @return array<string, mixed> {"$schema": draft-04, "definitions": components.schemas}, refs pointing at #/definitions/
 */
function normalize(array $spec, array &$stats = []): array
{
    $bump = static function (string $rule) use (&$stats): void {
        $stats[$rule] = ($stats[$rule] ?? 0) + 1;
    };

    $walk = static function (mixed $node) use (&$walk, $bump): mixed {
        if (!is_array($node)) {
            return $node;
        }

        // JSON Schema ignores siblings of $ref, but Jane reads {"type":"object","$ref":...} as an
        // untyped property. Reduce to the bare reference so setters get the model type.
        if (isset($node['$ref']) && count($node) > 1) {
            $bump('$ref siblings dropped');

            return ['$ref' => $node['$ref']];
        }

        // Swagger 2 style "required: true" on a property -> parent's required list.
        if (isset($node['properties']) && is_array($node['properties'])) {
            foreach ($node['properties'] as $name => $property) {
                if (is_array($property) && array_key_exists('required', $property) && is_bool($property['required'])) {
                    if ($property['required']) {
                        $node['required'] = array_values(array_unique([...($node['required'] ?? []), $name]));
                    }
                    unset($node['properties'][$name]['required']);
                    $bump('property-level required moved');
                }
            }
        }

        // Only rewrite nodes that look like schemas (have a "type" string).
        if (isset($node['type']) && is_string($node['type'])) {
            switch ($node['type']) {
                case 'date':
                    // Adobe sends full timestamps here (e.g. 2026-11-03T10:15:30Z). Kept as strings:
                    // the format varies by endpoint and a strict DateTime parse would throw.
                    $node['type'] = 'string';
                    $bump('type:date -> string');
                    break;
                case 'double':
                case 'float':
                    $bump("type:{$node['type']} -> number");
                    $node['type'] = 'number';
                    break;
                case 'int':
                    $node['type'] = 'integer';
                    $bump('type:int -> integer');
                    break;
                case 'long':
                    $node['type'] = 'integer';
                    $node['format'] = 'int64';
                    $bump('type:long -> integer/int64');
                    break;
                case 'file':
                    $node['type'] = 'string';
                    $node['format'] = 'binary';
                    $bump('type:file -> string/binary');
                    break;
            }

            // "format: date" is used for timestamps too; same reasoning as type:date.
            if (($node['format'] ?? null) === 'date' || ($node['format'] ?? null) === 'date-time') {
                unset($node['format']);
                $bump('format:date|date-time dropped');
            }
        }

        // Examples are documentation only and contain invalid shapes (e.g. fileInfos: [[]]).
        if (isset($node['example'])) {
            unset($node['example']);
        }

        foreach ($node as $key => $child) {
            $node[$key] = $walk($child);
        }

        return $node;
    };

    $definitions = $walk($spec['components']['schemas'] ?? []);

    // #/components/schemas/X -> #/definitions/X
    $json = json_encode(
        ['$schema' => 'http://json-schema.org/draft-04/schema#', 'definitions' => $definitions],
        JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR,
    );
    $json = str_replace('"#/components/schemas/', '"#/definitions/', $json, $refs);
    $stats['$ref rewritten'] = $refs;

    if (str_contains($json, '#/components/')) {
        throw new \RuntimeException('Unresolvable reference to #/components/ outside schemas remains.');
    }

    return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
}
