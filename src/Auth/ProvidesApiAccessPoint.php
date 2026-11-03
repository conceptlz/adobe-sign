<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Auth;

/**
 * A token provider that already knows its account's shard, e.g. from the OAuth token
 * response. BaseUriResolver uses it instead of calling GET /baseUris.
 */
interface ProvidesApiAccessPoint
{
    /**
     * e.g. "https://api.na1.adobesign.com/", or null if unknown.
     */
    public function apiAccessPoint(): ?string;
}
