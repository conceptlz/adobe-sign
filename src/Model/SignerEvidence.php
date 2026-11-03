<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Model;

use Conceptlz\AdobeSign\Enum\SignatureLevel;

/**
 * How one signer signed, from the agreement's members and events. Part of SignatureEvidence.
 */
final class SignerEvidence
{
    public function __construct(
        public readonly string $email,
        public readonly ?string $name,
        /** Step in the signing order. */
        public readonly int $order,
        public readonly bool $signed,
        /** When the signature was applied (ISO 8601), or null if not signed. */
        public readonly ?string $signedAt,
        /** As Adobe reports it, e.g. TYPED, SCRIBBLE (drawn), or a digital signature type. */
        public readonly ?string $signatureInputType,
        /** Whether the agreement required this signer to sign digitally (AES/QES requested). */
        public readonly bool $digitalSignatureRequired,
        /** Whether a certificate-based digital signature was actually applied. */
        public readonly bool $digitallySigned,
        /** Certificate issuer of the digital signature (e.g. a QTSP's CA), when digitally signed. */
        public readonly ?string $certificateIssuer,
        /** Cloud signature provider that produced the digital signature, when digitally signed. */
        public readonly ?string $signingProvider,
        /** Identity check required before signing: NONE, EMAIL_OTP, PHONE, KBA, GOV_ID, DIG_ID, ... */
        public readonly string $verification,
    ) {
    }

    /**
     * The level this signature reached: SES for an e-signature, AES for a digital signature, QES for a
     * digital signature whose certificate issuer is in $qualifiedIssuers. Null when not signed yet.
     *
     * @param list<string> $qualifiedIssuers certificate issuers you accept as qualified (matched case-insensitively
     *                                       as substrings of the issuer, e.g. "DigiCert QES", "TrustPro QTSP")
     */
    public function achievedLevel(array $qualifiedIssuers = []): ?SignatureLevel
    {
        if (!$this->signed) {
            return null;
        }
        if (!$this->digitallySigned) {
            return SignatureLevel::SES;
        }

        return $this->issuedByAnyOf($qualifiedIssuers) ? SignatureLevel::QES : SignatureLevel::AES;
    }

    /**
     * @param list<string> $issuers
     */
    public function issuedByAnyOf(array $issuers): bool
    {
        if ($this->certificateIssuer === null || $this->certificateIssuer === '') {
            return false;
        }

        foreach ($issuers as $issuer) {
            if ($issuer !== '' && stripos($this->certificateIssuer, $issuer) !== false) {
                return true;
            }
        }

        return false;
    }
}
