<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http;

/**
 * Default Sleeper: blocks the process with usleep().
 */
final class NativeSleeper implements Sleeper
{
    /** Non-positive durations return immediately. */
    public function sleep(float $seconds): void
    {
        if ($seconds > 0) {
            usleep((int) round($seconds * 1_000_000));
        }
    }
}
