<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Webhook;

use Conceptlz\AdobeSign\Exception\WebhookException;
use Psr\Http\Message\ResponseInterface;

final class WebhookResult
{
    public function __construct(
        /** Send this back as-is: it carries the client id echo Adobe requires. */
        public readonly ResponseInterface $response,
        /** The notification; null for the verification GET and for rejected requests. */
        public readonly ?WebhookEvent $event,
        public readonly bool $isVerification,
        public readonly ?WebhookException $error,
    ) {
    }

    public function isAccepted(): bool
    {
        return $this->error === null;
    }
}
