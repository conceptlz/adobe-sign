<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Turns an error response into a typed exception.
 *
 * Adobe returns `{"code": "INVALID_AGREEMENT_ID", "message": "..."}` (ErrorResponse schema).
 * The spec's examples also use `{"reason": "INVALID_AGREEMENT_ID: ...", "status": 404}`, so both are parsed.
 * The error `code` wins; the HTTP status is the fallback when the code is unknown.
 *
 * @internal
 */
final class ErrorMapper
{
    /** @var array<string, class-string<ApiException>> */
    private const CODES = [
        // 401 codes listed in the v6 spec
        'NO_AUTHORIZATION_HEADER' => AuthenticationException::class,
        'NO_ACCESS_TOKEN_HEADER' => AuthenticationException::class,
        'INVALID_ACCESS_TOKEN' => AuthenticationException::class,
        'INVALID_USER' => AuthenticationException::class,
        'INVALID_ON_BEHALF_OF_USER' => AuthenticationException::class,
        'INVALID_ACCOUNT' => AuthenticationException::class,
        'UNAUTHORIZED' => AuthenticationException::class,
        'UNVERIFIED_USER' => AuthenticationException::class,
        'AUTHENTICATION_ERROR' => AuthenticationException::class,
        'AUTOLOGIN_DENIED' => AuthenticationException::class,
        // 400s that are really auth problems
        'INVALID_X_API_USER_HEADER' => AuthenticationException::class,
        // OAuth endpoints (oauthDoc)
        'INVALID_TOKEN' => AuthenticationException::class,
        'EXPIRED_TOKEN' => AuthenticationException::class,
        'INVALID_ON_BEHALF_OF_USER_HEADER' => AuthenticationException::class,

        'THROTTLING_TOO_MANY_REQUESTS' => RateLimitException::class,

        'RESOURCE_MODIFIED' => PreconditionFailedException::class,

        'INVALID_JSON' => ValidationException::class,
        'MISSING_REQUIRED_PARAM' => ValidationException::class,
        'INVALID_ARGUMENTS' => ValidationException::class,
        'INVALID_FILE_INFO' => ValidationException::class,
        'INVALID_EMAIL' => ValidationException::class,
        'MODIFYING_IMMUTABLE_FIELDS' => ValidationException::class,
        'INVALID_PAGE_SIZE' => ValidationException::class,
        'INVALID_CURSOR' => ValidationException::class,

        // The account, not the request, is the limit (codes seen live).
        'HYBRID_ROUTING_NOT_ALLOWED' => AccountCapabilityException::class,
        'GOV_ID_LIMIT_EXCEEDED' => AccountCapabilityException::class,
    ];

    /**
     * Adobe reports some account restrictions only as a generic BAD_REQUEST; the message tells them
     * apart from invalid input (wording seen live).
     */
    private const ACCOUNT_RESTRICTION_MESSAGES = '/not allowed by account settings|enabled for your account|not enabled for (this|your) account/i';

    /** @var array<int, class-string<ApiException>> */
    private const STATUSES = [
        400 => ValidationException::class,
        401 => AuthenticationException::class,
        404 => NotFoundException::class,
        412 => PreconditionFailedException::class,
        415 => ValidationException::class,
        429 => RateLimitException::class,
    ];

    /**
     * The exception for an error response (ApiException redacts the request's Authorization header).
     */
    public static function fromResponse(RequestInterface $request, ResponseInterface $response): ApiException
    {
        $status = $response->getStatusCode();
        [$code, $message] = self::parseBody((string) $response->getBody());

        $class = ($code !== null ? (self::CODES[$code] ?? null) : null)
            ?? self::STATUSES[$status]
            ?? ApiException::class;

        if ($class === ValidationException::class && $message !== null && preg_match(self::ACCOUNT_RESTRICTION_MESSAGES, $message)) {
            $class = AccountCapabilityException::class;
        }

        $text = sprintf(
            '%s %s failed with HTTP %d%s%s',
            $request->getMethod(),
            $request->getUri()->getPath(),
            $status,
            $code !== null ? " [$code]" : '',
            $message !== null ? ": $message" : '',
        );

        if ($class === RateLimitException::class) {
            return new RateLimitException(
                $text,
                $status,
                $code,
                $request,
                $response,
                retryAfter: RetryAfter::fromResponse($response, $message),
            );
        }

        return new $class($text, $status, $code, $request, $response);
    }

    /**
     * Extract [code, message] from any of Adobe's error body shapes. A non-JSON body becomes
     * the message, cut to 200 characters.
     *
     * @return array{0: ?string, 1: ?string}
     */
    public static function parseBody(string $body): array
    {
        $data = json_decode($body, true);
        if (!is_array($data)) {
            return [null, $body !== '' ? mb_substr($body, 0, 200) : null];
        }

        if (isset($data['code']) && is_string($data['code'])) {
            return [$data['code'], isset($data['message']) ? (string) $data['message'] : null];
        }

        if (isset($data['reason']) && is_string($data['reason'])
            && preg_match('/^([A-Z][A-Z0-9_]+):\s*(.*)$/s', $data['reason'], $m)) {
            return [$m[1], $m[2]];
        }

        // OAuth endpoints: {"error": "invalid_request", "error_description": "..."}
        if (isset($data['error']) && is_string($data['error'])) {
            return [$data['error'], isset($data['error_description']) ? (string) $data['error_description'] : null];
        }

        return [null, isset($data['message']) ? (string) $data['message'] : null];
    }
}
