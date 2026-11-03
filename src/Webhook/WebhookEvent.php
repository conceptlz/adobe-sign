<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Webhook;

use Conceptlz\AdobeSign\Exception\WebhookException;

/**
 * One webhook notification. Subclasses expose the resource the event is about.
 *
 * The payload's resource object (e.g. "agreement") is a webhook-specific shape, not the REST
 * API's (participantSetsInfo is {"participantSets": [...]}), so it stays an array. Which parts
 * are present depends on the webhook's conditional params. Treat payloads as hints: re-fetch
 * the resource through the API before acting on anything that matters.
 */
abstract class WebhookEvent
{
    /** Payload key holding the resource, e.g. "agreement". */
    protected const RESOURCE_KEY = '';

    /**
     * @param list<array<string, mixed>> $applicableUsers
     * @param array<string, mixed> $raw
     */
    final public function __construct(
        /** e.g. AGREEMENT_WORKFLOW_COMPLETED; compare with EventType constants */
        public readonly string $event,
        public readonly ?string $subEvent,
        public readonly ?string $webhookId,
        public readonly ?string $webhookName,
        /** Unique per notification; use it to drop duplicate deliveries (Adobe retries). */
        public readonly ?string $notificationId,
        /** ISO 8601 date-time as Adobe sent it. */
        public readonly ?string $eventDate,
        /** e.g. agreement, megaSign, widget, libraryDocument */
        public readonly ?string $eventResourceType,
        public readonly ?string $participantRole,
        /** What the participant did, e.g. ESIGNED on AGREEMENT_ACTION_COMPLETED. */
        public readonly ?string $actionType,
        public readonly ?string $participantUserId,
        public readonly ?string $participantUserEmail,
        public readonly ?string $actingUserId,
        public readonly ?string $actingUserEmail,
        public readonly ?string $actingUserIpAddress,
        public readonly ?string $initiatingUserId,
        public readonly ?string $initiatingUserEmail,
        /** webhookNotificationApplicableUsers: the users this notification concerns. */
        public readonly array $applicableUsers,
        /** The decoded payload, unmodified. */
        public readonly array $raw,
    ) {
    }

    /**
     * Pick the event class from the event name (AGREEMENT_*, MEGASIGN_*, ...), falling back to
     * whichever resource key is present. Unknown kinds become UnknownEvent rather than failing.
     *
     * @param array<string, mixed> $payload
     * @throws WebhookException when the payload has no "event"
     */
    public static function fromArray(array $payload): self
    {
        $event = $payload['event'] ?? null;
        if (!is_string($event) || $event === '') {
            throw new WebhookException('Webhook payload has no "event".');
        }

        $class = match (true) {
            str_starts_with($event, 'AGREEMENT_') => AgreementEvent::class,
            str_starts_with($event, 'MEGASIGN_') => MegaSignEvent::class,
            str_starts_with($event, 'WIDGET_') => WidgetEvent::class,
            str_starts_with($event, 'LIBRARY_DOCUMENT_') => LibraryDocumentEvent::class,
            isset($payload['agreement']) => AgreementEvent::class,
            isset($payload['megaSign']) => MegaSignEvent::class,
            isset($payload['widget']) => WidgetEvent::class,
            isset($payload['libraryDocument']) => LibraryDocumentEvent::class,
            default => UnknownEvent::class,
        };

        $str = static fn (string $key): ?string => isset($payload[$key]) && is_scalar($payload[$key]) && $payload[$key] !== ''
            ? (string) $payload[$key]
            : null;

        return new $class(
            event: $event,
            subEvent: $str('subEvent'),
            webhookId: $str('webhookId'),
            webhookName: $str('webhookName'),
            notificationId: $str('webhookNotificationId'),
            eventDate: $str('eventDate'),
            eventResourceType: $str('eventResourceType'),
            participantRole: $str('participantRole'),
            actionType: $str('actionType'),
            participantUserId: $str('participantUserId'),
            participantUserEmail: $str('participantUserEmail'),
            actingUserId: $str('actingUserId'),
            actingUserEmail: $str('actingUserEmail'),
            actingUserIpAddress: $str('actingUserIpAddress'),
            initiatingUserId: $str('initiatingUserId'),
            initiatingUserEmail: $str('initiatingUserEmail'),
            applicableUsers: array_values(array_filter($payload['webhookNotificationApplicableUsers'] ?? [], 'is_array')),
            raw: $payload,
        );
    }

    /**
     * The resource object from the payload (empty if the webhook doesn't include it).
     *
     * @return array<string, mixed>
     */
    public function resource(): array
    {
        $resource = static::RESOURCE_KEY !== '' ? ($this->raw[static::RESOURCE_KEY] ?? []) : [];

        return is_array($resource) ? $resource : [];
    }

    /** resource()["id"], or null. */
    public function resourceId(): ?string
    {
        return isset($this->resource()['id']) ? (string) $this->resource()['id'] : null;
    }

    /** resource()["name"], or null. */
    public function resourceName(): ?string
    {
        return isset($this->resource()['name']) ? (string) $this->resource()['name'] : null;
    }

    /** resource()["status"] (the resource's status after the event), or null. */
    public function resourceStatus(): ?string
    {
        return isset($this->resource()['status']) ? (string) $this->resource()['status'] : null;
    }

    /**
     * Whether $event is one of the given names.
     *
     * @param string ...$events EventType constants
     */
    public function is(string ...$events): bool
    {
        return in_array($this->event, $events, true);
    }
}
