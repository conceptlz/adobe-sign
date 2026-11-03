<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests;

use Conceptlz\AdobeSign\Http\Sleeper;

final class FakeSleeper implements Sleeper
{
    /** @var list<float> */
    public array $sleeps = [];

    public function sleep(float $seconds): void
    {
        $this->sleeps[] = $seconds;
    }
}
