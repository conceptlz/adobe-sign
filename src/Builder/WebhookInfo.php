<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Builder;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;

/**
 * Fluent builder for POST /webhooks. Serialises to the spec's WebhookInfo
 * (required: name, scope, state, webhookSubscriptionEvents, webhookUrlInfo).
 *
 *     WebhookInfo::forAgreement('Status sync', 'https://app.example.com/adobe/webhook', $agreementId)
 *         ->events(EventType::AGREEMENT_ALL)
 *         ->agreementPayload(participants: true);
 *
 * Adobe recommends one RESOURCE-scoped webhook per agreement over a single account-wide one:
 * a failing delivery then only stalls that agreement's 72-hour retry clock.
 */
final class WebhookInfo
{
    /** @var list<string> */
    private array $events = [];

    /** @var array<string, array<string, bool>> */
    private array $conditional = [];

    /** @var list<string> */
    private array $problemEmails = [];

    /** @var array<string, mixed> */
    private array $extra = [];

    private function __construct(
        private readonly string $name,
        private readonly string $url,
        private readonly string $scope,
        private readonly ?string $resourceType = null,
        private readonly ?string $resourceId = null,
    ) {
        if (trim($name) === '') {
            throw new InvalidArgumentException('Webhook name must not be empty.');
        }
        if (!str_starts_with($url, 'https://')) {
            throw new InvalidArgumentException('Acrobat Sign only delivers webhooks to HTTPS URLs.');
        }
    }

    public static function forAccount(string $name, string $url): self
    {
        return new self($name, $url, 'ACCOUNT');
    }

    public static function forGroup(string $name, string $url): self
    {
        return new self($name, $url, 'GROUP');
    }

    public static function forUser(string $name, string $url): self
    {
        return new self($name, $url, 'USER');
    }

    /**
     * @param string $resourceType AGREEMENT | WIDGET | MEGASIGN | LIBRARY_DOCUMENT
     */
    public static function forResource(string $name, string $url, string $resourceType, string $resourceId): self
    {
        if ($resourceId === '') {
            throw new InvalidArgumentException('A RESOURCE-scoped webhook needs a resource id.');
        }

        return new self($name, $url, 'RESOURCE', $resourceType, $resourceId);
    }

    public static function forAgreement(string $name, string $url, string $agreementId): self
    {
        return self::forResource($name, $url, 'AGREEMENT', $agreementId);
    }

    /**
     * @param string ...$events see Webhook\EventType, e.g. EventType::AGREEMENT_ALL
     */
    public function events(string ...$events): self
    {
        $this->events = array_values(array_unique([...$this->events, ...$events]));

        return $this;
    }

    /**
     * What agreement events carry in the payload (spec: WebhookAgreementEvents).
     */
    public function agreementPayload(bool $detailed = false, bool $participants = false, bool $documents = false, bool $signedDocuments = false): self
    {
        $this->conditional['webhookAgreementEvents'] = [
            'includeDetailedInfo' => $detailed,
            'includeParticipantsInfo' => $participants,
            'includeDocumentsInfo' => $documents,
            'includeSignedDocuments' => $signedDocuments,
        ];

        return $this;
    }

    /**
     * Account users Adobe emails when deliveries start failing.
     */
    public function notifyOnProblems(string ...$emails): self
    {
        foreach ($emails as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                throw new InvalidArgumentException(sprintf('"%s" is not a valid email.', $email));
            }
            $this->problemEmails[] = $email;
        }

        return $this;
    }

    /**
     * Raw WebhookInfo fields this builder doesn't model. Merged last.
     *
     * @param array<string, mixed> $fields
     */
    public function with(array $fields): self
    {
        $this->extra = array_replace($this->extra, $fields);

        return $this;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        if ($this->events === []) {
            throw new InvalidArgumentException('Subscribe the webhook to at least one event.');
        }

        $data = array_filter([
            'name' => $this->name,
            'scope' => $this->scope,
            'state' => 'ACTIVE', // the only state a webhook can be created in
            'webhookSubscriptionEvents' => $this->events,
            'webhookUrlInfo' => ['url' => $this->url],
            'resourceType' => $this->resourceType,
            'resourceId' => $this->resourceId,
            'webhookConditionalParams' => $this->conditional !== [] ? $this->conditional : null,
            'problemNotificationEmails' => $this->problemEmails !== []
                ? array_map(static fn (string $e) => ['email' => $e], $this->problemEmails)
                : null,
        ], static fn ($v) => $v !== null);

        return array_replace($data, $this->extra);
    }
}
