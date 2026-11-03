<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * An inbound webhook request was rejected: missing or unknown X-AdobeSign-ClientId, or a
 * payload that isn't a webhook notification.
 */
class WebhookException extends \RuntimeException implements AdobeSignException
{
}
