<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Live;

use Psr\Log\AbstractLogger;

/**
 * @internal
 */
final class StderrLogger extends AbstractLogger
{
    public function log($level, string|\Stringable $message, array $context = []): void
    {
        fwrite(STDERR, sprintf("    [%s] %s %s\n", $level, $message, json_encode($context)));
    }
}
