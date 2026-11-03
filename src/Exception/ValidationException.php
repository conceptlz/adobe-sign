<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * 400/415, or an Adobe request-validation error code (INVALID_JSON, MISSING_REQUIRED_PARAM, ...).
 */
class ValidationException extends ApiException
{
}
