<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * 401, or an Adobe auth error code (INVALID_ACCESS_TOKEN, NO_AUTHORIZATION_HEADER, ...).
 *
 * On API calls the client first retries once with a fresh token when the provider can refresh
 * (OAuth). A wrong or revoked integration key, or an invalid asUser() target, ends up here.
 */
class AuthenticationException extends ApiException
{
}
