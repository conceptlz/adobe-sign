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
        /** e.g. OUT_FOR_SIGNATURE, SIGNED, CANCELLED; compare as a string. */
        public readonly string $status,
        /** ESIGN | WRITTEN */
        public readonly ?string $signatureType,
        public readonly ?string $senderEmail,
        /** ISO 8601 date-time as Adobe sent it. */
        public readonly ?string $createdDate,
        /** ISO 8601 date-time as Adobe sent it. */
        public readonly ?string $expirationTime,
        /** ETag from the response; the client also replays it as If-Match on updates. */
        public readonly ?string $etag,
        /** The decoded response body, unmodified. */
        public readonly array $raw,
    ) {
    }

    /**
     * Build from a decoded FetchedAgreementInfo body. Missing strings become "".
     *
     * @param array<mixed> $data
     * @param string|null $etag the response's ETag header; "" is treated as none
     */
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

    /** Status is SIGNED. */
    public function isSigned(): bool
    {
        return $this->status === 'SIGNED';
    }

    /** Status is OUT_FOR_SIGNATURE. */
    public function isOutForSignature(): bool
    {
        return $this->status === 'OUT_FOR_SIGNATURE';
    }
}
