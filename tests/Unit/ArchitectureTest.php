<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * Guards the "framework-agnostic core" promise.
 */
final class ArchitectureTest extends TestCase
{
    public function test_core_has_no_framework_imports(): void
    {
        $offenders = [];
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(dirname(__DIR__, 2) . '/src'));

        foreach ($files as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }
            $code = (string) file_get_contents($file->getPathname());
            if (preg_match('/\b(Illuminate|Laravel|Symfony\\\\Component|GuzzleHttp|Jane)\\\\/', $code, $m)) {
                $offenders[] = $file->getPathname() . ' uses ' . $m[1];
            }
        }

        self::assertSame([], $offenders);
    }

    public function test_composer_requires_only_psr_and_discovery(): void
    {
        $composer = json_decode((string) file_get_contents(dirname(__DIR__, 2) . '/composer.json'), true);
        $allowed = '/^(php|ext-json|php-http\/discovery|psr\/.+)$/';

        foreach (array_keys($composer['require']) as $package) {
            self::assertMatchesRegularExpression($allowed, $package);
        }
    }
}
