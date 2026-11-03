<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * 412: the If-Match ETag is stale (RESOURCE_MODIFIED). Re-fetch the resource and retry.
 */
class PreconditionFailedException extends ApiException
{
}
