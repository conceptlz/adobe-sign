<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * 404 (e.g. INVALID_AGREEMENT_ID, AGREEMENT_NOT_SIGNABLE). Chosen by HTTP status; the Adobe code
 * is in $errorCode.
 */
class NotFoundException extends ApiException
{
}
