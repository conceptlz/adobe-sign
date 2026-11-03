<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * The request never produced an HTTP response (network failure, DNS, TLS, ...).
 */
class TransportException extends \RuntimeException implements AdobeSignException
{
}
