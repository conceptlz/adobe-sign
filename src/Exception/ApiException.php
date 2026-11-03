<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * The API answered with a non-2xx status. Subclasses narrow it by Adobe error code.
 */
class ApiException extends \RuntimeException implements AdobeSignException
{
    public function __construct(
        string $message,
        public readonly int $statusCode,
        public readonly ?string $errorCode,
        public readonly ?RequestInterface $request = null,
        public readonly ?ResponseInterface $response = null,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, $statusCode, $previous);
    }
}
