<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * 401, or an Adobe auth error code (INVALID_ACCESS_TOKEN, NO_AUTHORIZATION_HEADER, ...).
 */
class AuthenticationException extends ApiException
{
}
