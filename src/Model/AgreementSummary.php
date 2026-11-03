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
        public readonly string $status,
        public readonly ?string $type,
        public readonly ?string $groupId,
        public readonly ?string $displayDate,
        public readonly bool $hidden,
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

    /** @param array<mixed> $data */
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
