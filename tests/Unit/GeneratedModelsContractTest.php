<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Hydration\ModelMapper;
use PHPUnit\Framework\TestCase;

/**
 * Pins the shape of Jane's output that ModelMapper relies on. If a Jane upgrade or a spec
 * change breaks an assumption, this fails at `composer test` instead of at runtime.
 */
final class GeneratedModelsContractTest extends TestCase
{
    private const DIR = __DIR__ . '/../../src/Generated/Model';

    public function test_every_model_follows_the_accessor_convention(): void
    {
        $files = glob(self::DIR . '/*.php') ?: [];
        self::assertGreaterThan(300, count($files), 'models are generated');

        $problems = [];
        $arraysWithoutItemType = 0;

        foreach ($files as $file) {
            $class = ModelMapper::MODEL_NAMESPACE . basename($file, '.php');
            $reflection = new \ReflectionClass($class);

            if (!$reflection->hasMethod('isInitialized')) {
                $problems[] = "$class has no isInitialized()";
            }
            if ($reflection->getParentClass() !== false || $reflection->getInterfaceNames() !== []) {
                $problems[] = "$class extends/implements something (generated models must be plain)";
            }

            foreach ($reflection->getProperties() as $prop) {
                $name = $prop->getName();
                if ($name === 'initialized') {
                    continue;
                }
                foreach (['set', 'get'] as $prefix) {
                    if (!$reflection->hasMethod($prefix . ucfirst($name))) {
                        $problems[] = "$class::\$$name has no {$prefix}" . ucfirst($name) . '()';
                    }
                }

                $doc = (string) $prop->getDocComment();
                if (preg_match('/@var\s+(?:list|array)<\s*(?:(?:string|int)\s*,\s*)?([A-Za-z_]\w*)>/', $doc, $m)
                    && ctype_upper($m[1][0])
                    && !class_exists(ModelMapper::MODEL_NAMESPACE . $m[1])) {
                    $problems[] = "$class::\$$name refers to missing model {$m[1]}";
                }
                if (str_contains($doc, '@var array|null') || str_contains($doc, '@var array ')) {
                    $arraysWithoutItemType++;
                }
            }

            // Building metadata must not throw for any model.
            ModelMapper::toArray(new $class());
        }

        self::assertSame([], $problems);
        self::assertSame(0, $arraysWithoutItemType, 'every array property documents its item type');
    }

    public function test_generated_code_has_no_runtime_dependencies(): void
    {
        $offenders = [];
        foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(dirname(self::DIR))) as $file) {
            if ($file->getExtension() === 'php' && preg_match('/^use\s+(?!Conceptlz\\\\)(\S+);/m', (string) file_get_contents($file->getPathname()), $m)) {
                if (!in_array($m[1], ['RuntimeException'], true)) {
                    $offenders[] = $file->getFilename() . ': ' . $m[1];
                }
            }
        }

        self::assertSame([], $offenders);
        self::assertDirectoryDoesNotExist(dirname(self::DIR) . '/Normalizer');
        self::assertDirectoryDoesNotExist(dirname(self::DIR) . '/Runtime');
    }
}
