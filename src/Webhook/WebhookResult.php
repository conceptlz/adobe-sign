<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Webhook;

use Conceptlz\AdobeSign\Exception\WebhookException;
use Psr\Http\Message\ResponseInterface;

/**
 * Outcome of WebhookHandler::handle(): the response to send and, for a notification, the event.
 */
final class WebhookResult
{
    public function __construct(
        /** Send this back as-is: it carries the client id echo Adobe requires. */
        public readonly ResponseInterface $response,
        /** The notification; null for the verification GET and for rejected requests. */
        public readonly ?WebhookEvent $event,
        /** True for Adobe's verification GET (sent when the webhook is created). */
        public readonly bool $isVerification,
        /** Why the request was rejected; null when accepted. */
        public readonly ?WebhookException $error,
    ) {
    }

    /** The request was verified (and, for a POST, parsed); the response is a 200 with the echo. */
    public function isAccepted(): bool
    {
        return $this->error === null;
    }
}
