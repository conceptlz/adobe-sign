<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * The API answered with an error status. Subclasses narrow it by Adobe error code, then by
 * HTTP status (see ErrorMapper).
 *
 * Also thrown, with the 2xx status (or 200) and a null $errorCode, when a successful response
 * lacks something the SDK needs (e.g. a created resource's id, or an HTTPS apiAccessPoint).
 * getCode() returns $statusCode. $request never carries credentials: its Authorization header
 * is replaced with "Bearer ***" here, whoever constructs the exception.
 */
class ApiException extends \RuntimeException implements AdobeSignException
{
    /** The request that failed, with its Authorization header redacted. */
    public readonly ?RequestInterface $request;

    public function __construct(
        string $message,
        /** HTTP status of the response. */
        public readonly int $statusCode,
        /** Adobe's error code, e.g. INVALID_AGREEMENT_ID; null when the body had none. */
        public readonly ?string $errorCode,
        ?RequestInterface $request = null,
        public readonly ?ResponseInterface $response = null,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, $statusCode, $previous);

        // Exceptions get logged, dumped and reported to error trackers: never let them hold the token.
        $this->request = $request !== null ? self::redact($request) : null;
    }

    /**
     * Replace a bearer token (or any Authorization value) with "Bearer ***".
     */
    public static function redact(RequestInterface $request): RequestInterface
    {
        return $request->hasHeader('Authorization') ? $request->withHeader('Authorization', 'Bearer ***') : $request;
    }
}
