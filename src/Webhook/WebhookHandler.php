<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Webhook;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Exception\WebhookException;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * Receives Acrobat Sign webhooks. Returns the parsed event; dispatching is up to you.
 *
 * Adobe's contract (developer.adobe.com/acrobat-sign/docs/overview/acrobat_sign_events):
 * - Both the verification GET and every notification POST carry X-AdobeSign-ClientId.
 * - Delivery counts only if you answer 2xx AND echo that client id (header, or JSON body key
 *   xAdobeSignClientId) within 5 seconds. Otherwise Adobe retries with doubling intervals for
 *   72 hours, then disables the webhook. So acknowledge first, do the work on a queue.
 * - There is no payload signature. Allowlisting your app's client id(s) is the documented
 *   check; account-level mutual TLS is available on top. Don't trust payload contents for
 *   anything important: re-fetch the resource through the API.
 *
 * PSR-7:
 *     $result = $handler->handle($request, $psr17, $psr17);
 *     if ($result->event) { $queue->push($result->event->raw); }
 *     return $result->response;
 *
 * Plain PHP:
 *     $id = $handler->verifyClientId($_SERVER['HTTP_X_ADOBESIGN_CLIENTID'] ?? null);
 *     foreach ($handler->acknowledgementHeaders($id) as $k => $v) { header("$k: $v"); }
 *     if ($_SERVER['REQUEST_METHOD'] === 'POST') { $event = $handler->parse(file_get_contents('php://input')); }
 */
final class WebhookHandler
{
    /** Request header carrying the sending app's client id; echoed back in the response. */
    public const CLIENT_ID_HEADER = 'X-AdobeSign-ClientId';
    /** JSON response key Adobe also accepts for the echo. */
    public const CLIENT_ID_BODY_KEY = 'xAdobeSignClientId';

    /** @var array<string, true> */
    private readonly array $clientIds;

    /**
     * @param list<string> $clientIds OAuth client ids (application ids) of the app(s) that created your webhooks
     * @throws InvalidArgumentException when no non-blank id is given
     */
    public function __construct(array $clientIds)
    {
        $ids = array_filter(array_map('trim', $clientIds), static fn (string $id) => $id !== '');
        if ($ids === []) {
            throw new InvalidArgumentException('Allowlist at least one client id; Adobe webhooks carry no other authenticity check.');
        }
        $this->clientIds = array_fill_keys($ids, true);
    }

    /**
     * Check the X-AdobeSign-ClientId header value against the allowlist (constant-time compare).
     *
     * @return string the client id to echo back
     * @throws WebhookException when the header is missing or not allowlisted
     */
    public function verifyClientId(?string $headerValue): string
    {
        $id = trim((string) $headerValue);
        if ($id === '') {
            throw new WebhookException('Missing ' . self::CLIENT_ID_HEADER . ' header.');
        }

        foreach (array_keys($this->clientIds) as $allowed) {
            if (hash_equals($allowed, $id)) {
                return $id;
            }
        }

        throw new WebhookException('Webhook from an unexpected client id.');
    }

    /**
     * Decode a notification POST body into the matching WebhookEvent subclass.
     *
     * @throws WebhookException when the body is not a JSON object with an "event"
     */
    public function parse(string $body): WebhookEvent
    {
        try {
            $payload = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new WebhookException('Webhook body is not JSON: ' . $e->getMessage(), 0, $e);
        }
        if (!is_array($payload)) {
            throw new WebhookException('Webhook body is not a JSON object.');
        }

        return WebhookEvent::fromArray($payload);
    }

    /**
     * Response headers for the acknowledgement: the client id echo and the JSON content type.
     *
     * @return array<string, string>
     */
    public function acknowledgementHeaders(string $clientId): array
    {
        return [self::CLIENT_ID_HEADER => $clientId, 'Content-Type' => 'application/json'];
    }

    /** JSON response body that echoes the client id. */
    public function acknowledgementBody(string $clientId): string
    {
        return json_encode([self::CLIENT_ID_BODY_KEY => $clientId], JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Verify, parse and build the acknowledgement in one go. Never throws for a bad request;
     * the rejection is in $result->error and the response carries a 4xx: 405 for a method other
     * than GET/POST, 403 for a missing or unknown client id, 400 for an unreadable body.
     */
    public function handle(ServerRequestInterface $request, ResponseFactoryInterface $responses, StreamFactoryInterface $streams): WebhookResult
    {
        $method = strtoupper($request->getMethod());
        if ($method !== 'GET' && $method !== 'POST') {
            return $this->reject($responses, 405, new WebhookException("Unsupported method $method."));
        }

        try {
            $clientId = $this->verifyClientId($request->getHeaderLine(self::CLIENT_ID_HEADER));
        } catch (WebhookException $e) {
            // No echo: Adobe treats the delivery as failed, which is right for a request not meant for us.
            return $this->reject($responses, 403, $e);
        }

        $event = null;
        if ($method === 'POST') {
            try {
                $event = $this->parse((string) $request->getBody());
            } catch (WebhookException $e) {
                // 4xx makes Adobe retry; better than silently acknowledging data we couldn't read.
                return $this->reject($responses, 400, $e);
            }
        }

        $response = $responses->createResponse(200)->withBody($streams->createStream($this->acknowledgementBody($clientId)));
        foreach ($this->acknowledgementHeaders($clientId) as $name => $value) {
            $response = $response->withHeader($name, $value);
        }

        return new WebhookResult($response, $event, $method === 'GET', null);
    }

    private function reject(ResponseFactoryInterface $responses, int $status, WebhookException $error): WebhookResult
    {
        return new WebhookResult($responses->createResponse($status), null, false, $error);
    }
}
