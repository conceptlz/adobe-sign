<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Model;

use Conceptlz\AdobeSign\Generated\Model\FetchedAgreementInfo;
use Conceptlz\AdobeSign\Hydration\ModelMapper;

/**
 * GET /agreements/{agreementId} (spec: FetchedAgreementInfo).
 *
 * Hand-written subset of the fields most callers need; everything else is in $raw.
 * Status stays a string: the spec warns new enum values can appear without a version bump.
 */
final class Agreement
{
    /**
     * @param array<mixed> $raw
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $status,
        public readonly ?string $signatureType,
        public readonly ?string $senderEmail,
        public readonly ?string $createdDate,
        public readonly ?string $expirationTime,
        /** ETag from the response; the client also replays it as If-Match on updates. */
        public readonly ?string $etag,
        public readonly array $raw,
    ) {
    }

    /** @param array<mixed> $data */
    public static function fromArray(array $data, ?string $etag = null): self
    {
        return new self(
            id: (string) ($data['id'] ?? ''),
            name: (string) ($data['name'] ?? ''),
            status: (string) ($data['status'] ?? ''),
            signatureType: $data['signatureType'] ?? null,
            senderEmail: $data['senderEmail'] ?? null,
            createdDate: $data['createdDate'] ?? null,
            expirationTime: $data['expirationTime'] ?? null,
            etag: $etag !== '' ? $etag : null,
            raw: $data,
        );
    }

    /**
     * The full response as the generated, spec-complete model.
     */
    public function details(): FetchedAgreementInfo
    {
        return ModelMapper::hydrate(FetchedAgreementInfo::class, $this->raw);
    }

    public function isSigned(): bool
    {
        return $this->status === 'SIGNED';
    }

    public function isOutForSignature(): bool
    {
        return $this->status === 'OUT_FOR_SIGNATURE';
    }
}
