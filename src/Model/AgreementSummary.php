<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Model;

use Conceptlz\AdobeSign\Generated\Model\AgreementAgreement;
use Conceptlz\AdobeSign\Hydration\ModelMapper;

/**
 * One row of GET /agreements (spec: AgreementAgreement).
 */
final class AgreementSummary
{
    /** @param array<mixed> $raw */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        /** Relative to the caller, e.g. WAITING_FOR_MY_SIGNATURE, OUT_FOR_SIGNATURE, SIGNED. */
        public readonly string $status,
        /** e.g. AGREEMENT, MEGASIGN_CHILD, WIDGET_INSTANCE */
        public readonly ?string $type,
        public readonly ?string $groupId,
        /** ISO 8601 date-time as Adobe sent it. */
        public readonly ?string $displayDate,
        /** Hidden for the calling user. */
        public readonly bool $hidden,
        /** The decoded list row, unmodified. */
        public readonly array $raw,
    ) {
    }

    /**
     * The full row as the generated, spec-complete model.
     */
    public function details(): AgreementAgreement
    {
        return ModelMapper::hydrate(AgreementAgreement::class, $this->raw);
    }

    /**
     * Build from one decoded userAgreementList row. Missing strings become "".
     *
     * @param array<mixed> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: (string) ($data['id'] ?? ''),
            name: (string) ($data['name'] ?? ''),
            status: (string) ($data['status'] ?? ''),
            type: $data['type'] ?? null,
            groupId: $data['groupId'] ?? null,
            displayDate: $data['displayDate'] ?? null,
            hidden: (bool) ($data['hidden'] ?? false),
            raw: $data,
        );
    }
}
