<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

use Psr\Clock\ClockInterface;

/**
 * Default PSR-20 clock when the caller doesn't supply one.
 */
final class SystemClock implements ClockInterface
{
    public function now(): \DateTimeImmutable
    {
        return new \DateTimeImmutable();
    }
}
