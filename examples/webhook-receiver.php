<?php

/**
 * Minimal webhook endpoint in plain PHP.
 *
 *   ADOBE_SIGN_CLIENT_ID=... php -S localhost:8081 examples/webhook-receiver.php
 *
 * Adobe needs an HTTPS URL, so put a tunnel in front for real deliveries. Then register it:
 *   $sign->webhooks()->create(WebhookInfo::forAgreement('Sync', 'https://<tunnel>/', $agreementId)
 *       ->events(EventType::AGREEMENT_ALL));
 */

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Conceptlz\AdobeSign\Exception\WebhookException;
use Conceptlz\AdobeSign\Webhook\AgreementEvent;
use Conceptlz\AdobeSign\Webhook\WebhookHandler;

$handler = new WebhookHandler([getenv('ADOBE_SIGN_CLIENT_ID') ?: 'set-ADOBE_SIGN_CLIENT_ID']);

try {
    $clientId = $handler->verifyClientId($_SERVER['HTTP_X_ADOBESIGN_CLIENTID'] ?? null);
    $event = $_SERVER['REQUEST_METHOD'] === 'POST' ? $handler->parse((string) file_get_contents('php://input')) : null;
} catch (WebhookException $e) {
    http_response_code(isset($clientId) ? 400 : 403);
    error_log('Rejected webhook: ' . $e->getMessage());
    exit;
}

// Acknowledge first: Adobe allows 5 seconds and retries (then disables the webhook) without the echo.
foreach ($handler->acknowledgementHeaders($clientId) as $name => $value) {
    header("$name: $value");
}
echo $handler->acknowledgementBody($clientId);

if ($event === null) {
    return; // verification GET
}

// In a real app: push $event->raw onto a queue, dedupe on $event->notificationId,
// and re-fetch the agreement via the API before acting on it.
$line = sprintf('[%s] %s %s', $event->eventDate ?? date(DATE_ATOM), $event->event, $event->resourceId() ?? '-');
if ($event instanceof AgreementEvent && $event->isWorkflowCompleted()) {
    $line .= ' -> completed, fetch the signed PDF with agreements()->combinedDocument()';
}
error_log($line);
