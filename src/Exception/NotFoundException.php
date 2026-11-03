<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * 404, or an Adobe not-found error code (INVALID_AGREEMENT_ID, AGREEMENT_DELETED, ...).
 */
class NotFoundException extends ApiException
{
}
