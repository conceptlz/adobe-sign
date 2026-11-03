<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http;

/**
 * Indirection over sleeping so retry backoff is testable.
 */
interface Sleeper
{
    /** Block for $seconds (fractional allowed) before returning. */
    public function sleep(float $seconds): void;
}
