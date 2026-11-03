<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Hydration;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;

/**
 * Converts API arrays to and from the Jane-generated models in Conceptlz\AdobeSign\Generated\Model,
 * replacing Jane's symfony/serializer normalizers so core stays PSR-only.
 *
 * Relies on what the generator emits, which GeneratedModelsContractTest pins down:
 * - one protected property per JSON key, same name, with set{Key}() / get{Key}()
 * - setters typed ?string|?int|?float|?bool|?array|?Model (or untyped for free-form objects)
 * - arrays documented as `@var list<X>|null` or `@var array<string, X>|null`
 * - isInitialized($property) tracking which properties were set
 *
 * Unknown keys are ignored and mistyped values skipped, never fatal: Adobe adds fields
 * and enum values without a version bump.
 *
 * The SDK uses it for every typed response; it is public so you can do the same with data you
 * hold yourself (e.g. a stored API response), or serialise a model you built.
 *
 * @phpstan-type PropertyMeta array{setter: string, getter: string, type: ?string, model: class-string|null, item: class-string|null}
 */
final class ModelMapper
{
    /** Only classes under this namespace are accepted. */
    public const MODEL_NAMESPACE = 'Conceptlz\\AdobeSign\\Generated\\Model\\';

    /**
     * @var array<class-string, array<string, PropertyMeta>>
     */
    private static array $meta = [];

    /**
     * Build a generated model from a decoded API array, recursing into nested models.
     *
     * @template T of object
     * @param class-string<T> $class a class under MODEL_NAMESPACE
     * @param array<mixed> $data
     * @return T
     * @throws InvalidArgumentException when $class is not a generated model
     */
    public static function hydrate(string $class, array $data): object
    {
        $meta = self::meta($class);
        $model = new $class();

        foreach ($data as $key => $value) {
            $property = $meta[$key] ?? null;
            if ($property === null) {
                continue;
            }

            [$ok, $converted] = self::toPhp($property, $value);
            if ($ok) {
                $model->{$property['setter']}($converted);
            }
        }

        return $model;
    }

    /**
     * Serialise a generated model to an API array, recursing into nested models. Only properties
     * that were set are emitted; nulls are dropped (Jane's skip-null-values).
     *
     * @return array<string, mixed>
     * @throws InvalidArgumentException when $model is not a generated model
     */
    public static function toArray(object $model): array
    {
        $meta = self::meta($model::class); // rejects anything that isn't a generated model
        if (!method_exists($model, 'isInitialized')) {
            throw new InvalidArgumentException(sprintf('%s does not track initialized properties.', $model::class));
        }

        $out = [];
        foreach ($meta as $name => $property) {
            if (!$model->isInitialized($name)) {
                continue;
            }

            $value = self::toJson($model->{$property['getter']}());
            if ($value !== null) {
                $out[$name] = $value;
            }
        }

        return $out;
    }

    /**
     * Coerce one JSON value to the setter's type, leniently: numeric strings become numbers,
     * boolean-like strings ("true", "0", ...) become booleans, non-array list items are dropped,
     * and anything else that doesn't fit is reported unusable.
     *
     * @param PropertyMeta $property
     * @return array{0: bool, 1: mixed} [usable, converted]
     */
    private static function toPhp(array $property, mixed $value): array
    {
        if ($value === null) {
            return [true, null];
        }

        switch ($property['type']) {
            case null:
                return [true, $value];
            case 'string':
                return is_scalar($value) ? [true, is_bool($value) ? ($value ? 'true' : 'false') : (string) $value] : [false, null];
            case 'int':
                if (is_int($value)) {
                    return [true, $value];
                }
                $int = filter_var($value, FILTER_VALIDATE_INT);

                return $int === false ? [false, null] : [true, $int];
            case 'float':
                return is_int($value) || is_float($value) || (is_string($value) && is_numeric($value))
                    ? [true, (float) $value]
                    : [false, null];
            case 'bool':
                if (is_bool($value)) {
                    return [true, $value];
                }
                $bool = filter_var($value, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);

                return $bool === null ? [false, null] : [true, $bool];
            case 'array':
                if (!is_array($value)) {
                    return [false, null];
                }
                if ($property['item'] === null) {
                    return [true, $value];
                }
                $items = [];
                foreach ($value as $k => $item) {
                    if (is_array($item)) {
                        $items[$k] = self::hydrate($property['item'], $item);
                    }
                }

                return [true, $items];
            default:
                return $property['model'] !== null && is_array($value)
                    ? [true, self::hydrate($property['model'], $value)]
                    : [false, null];
        }
    }

    /** Nested models -> arrays, recursively; everything else unchanged. */
    private static function toJson(mixed $value): mixed
    {
        if (is_object($value) && str_starts_with($value::class, self::MODEL_NAMESPACE)) {
            return self::toArray($value);
        }
        if (is_array($value)) {
            return array_map(self::toJson(...), $value);
        }

        return $value;
    }

    /**
     * Reflect a model's setter/getter pairs once per class (cached for the process).
     *
     * @param class-string $class
     * @return array<string, PropertyMeta>
     */
    private static function meta(string $class): array
    {
        if (isset(self::$meta[$class])) {
            return self::$meta[$class];
        }

        if (!str_starts_with($class, self::MODEL_NAMESPACE) || !class_exists($class)) {
            throw new InvalidArgumentException(sprintf('%s is not a generated Acrobat Sign model.', $class));
        }

        $meta = [];
        $reflection = new \ReflectionClass($class);
        foreach ($reflection->getProperties() as $prop) {
            $name = $prop->getName();
            if ($name === 'initialized' || $prop->isStatic()) {
                continue;
            }

            $setter = 'set' . ucfirst($name);
            $getter = 'get' . ucfirst($name);
            if (!$reflection->hasMethod($setter) || !$reflection->hasMethod($getter)) {
                continue;
            }

            $paramType = $reflection->getMethod($setter)->getParameters()[0]->getType();
            $type = $paramType instanceof \ReflectionNamedType ? $paramType->getName() : null;

            $model = $type !== null && str_starts_with($type, self::MODEL_NAMESPACE) && class_exists($type) ? $type : null;

            $item = null;
            if ($type === 'array'
                && preg_match('/@var\s+(?:list<|array<\s*(?:string|int)\s*,\s*)([A-Za-z_][A-Za-z0-9_]*)>/', (string) $prop->getDocComment(), $m)) {
                $itemClass = self::MODEL_NAMESPACE . $m[1];
                $item = class_exists($itemClass) ? $itemClass : null;
            }

            $meta[$name] = ['setter' => $setter, 'getter' => $getter, 'type' => $type, 'model' => $model, 'item' => $item];
        }

        return self::$meta[$class] = $meta;
    }
}
