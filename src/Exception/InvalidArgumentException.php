<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * Rejected input, detected locally before any request is sent (empty id, invalid email,
 * incomplete builder, untrusted api_access_point, ...).
 */
class InvalidArgumentException extends \InvalidArgumentException implements AdobeSignException
{
}
