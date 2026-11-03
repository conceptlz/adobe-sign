<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Webhook;

/**
 * AGREEMENT_* notification. resource() is the payload's "agreement" object.
 */
final class AgreementEvent extends WebhookEvent
{
    protected const RESOURCE_KEY = 'agreement';

    /** @return array<string, mixed> */
    public function agreement(): array
    {
        return $this->resource();
    }

    public function agreementId(): ?string
    {
        return $this->resourceId();
    }

    /**
     * Every participant has acted; the agreement reached its terminal state (e.g. SIGNED).
     */
    public function isWorkflowCompleted(): bool
    {
        return $this->event === EventType::AGREEMENT_WORKFLOW_COMPLETED;
    }
}
