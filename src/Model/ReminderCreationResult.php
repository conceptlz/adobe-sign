<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Model;

/**
 * POST /agreements/{agreementId}/reminders (spec: ReminderCreationResult).
 */
final class ReminderCreationResult
{
    /**
     * @param list<string> $disabledRecipients participants who will not get the reminder
     *                                         (e.g. they disabled reminder emails)
     */
    public function __construct(
        /** The reminder's id. */
        public readonly ?string $id,
        public readonly array $disabledRecipients,
    ) {
    }

    /**
     * Build from the decoded response body.
     *
     * @param array<mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? null,
            array_values(array_map('strval', $data['disabledRecipients'] ?? [])),
        );
    }
}
