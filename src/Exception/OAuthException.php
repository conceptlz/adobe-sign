<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * The OAuth flow failed: the user denied access, the state didn't match, or Adobe rejected
 * a code / refresh token (`invalid_request`, `INVALID_TOKEN`, `EXPIRED_TOKEN`), or no token is
 * stored for the user (NO_TOKEN, NO_REFRESH_TOKEN). The user has to authorize again.
 */
class OAuthException extends AuthenticationException
{
}
