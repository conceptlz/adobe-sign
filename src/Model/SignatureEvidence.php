<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Model;

use Conceptlz\AdobeSign\Enum\SignatureLevel;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;

/**
 * What signature level each signer actually reached on an agreement, built by
 * Agreements::signatureEvidence(). Use it to confirm a required level after signing:
 *
 *     $evidence = $sign->agreements()->signatureEvidence($agreementId);
 *     if (!$evidence->meets(SignatureLevel::QES, ['DigiCert', 'TrustPro'])) {
 *         $problems = $evidence->shortfalls(SignatureLevel::QES, ['DigiCert', 'TrustPro']);
 *     }
 *
 * QES can't be inferred from Adobe's data alone: it depends on whether the certificate came from a
 * qualified trust service provider, so you pass the issuers you accept as qualified. For a formal
 * check, validate the signed PDF against the relevant trusted list (e.g. the EU Trusted List).
 */
final class SignatureEvidence
{
    /**
     * @param list<SignerEvidence> $signers in signing order
     */
    public function __construct(
        public readonly string $agreementId,
        public readonly string $status,
        public readonly array $signers,
    ) {
    }

    public function allSigned(): bool
    {
        foreach ($this->signers as $signer) {
            if (!$signer->signed) {
                return false;
            }
        }

        return $this->signers !== [];
    }

    /**
     * True when every signer has signed at $required or stronger.
     *
     * @param list<string> $qualifiedIssuers required for QES; see SignerEvidence::achievedLevel()
     * @throws InvalidArgumentException when QES is required without a list of qualified issuers
     */
    public function meets(SignatureLevel $required, array $qualifiedIssuers = []): bool
    {
        return $this->shortfalls($required, $qualifiedIssuers) === [];
    }

    /**
     * Human-readable reasons the agreement falls short of $required; empty when it meets it.
     *
     * @param list<string> $qualifiedIssuers required for QES; see SignerEvidence::achievedLevel()
     * @return list<string>
     * @throws InvalidArgumentException when QES is required without a list of qualified issuers
     */
    public function shortfalls(SignatureLevel $required, array $qualifiedIssuers = []): array
    {
        if ($required === SignatureLevel::QES && array_filter($qualifiedIssuers) === []) {
            throw new InvalidArgumentException('Checking for QES needs the certificate issuers you accept as qualified (e.g. your QTSP).');
        }
        if ($this->signers === []) {
            return ['The agreement has no signers.'];
        }

        $problems = [];
        foreach ($this->signers as $signer) {
            $achieved = $signer->achievedLevel($qualifiedIssuers);
            if ($achieved === null) {
                $problems[] = sprintf('%s has not signed yet.', $signer->email);
            } elseif (!$achieved->satisfies($required)) {
                $problems[] = match (true) {
                    !$signer->digitallySigned => sprintf(
                        '%s signed with an electronic signature (%s), not a digital one: SES, %s required.',
                        $signer->email,
                        $signer->signatureInputType ?? 'unknown type',
                        $required->value,
                    ),
                    default => sprintf(
                        '%s signed digitally, but the certificate issuer "%s" is not in your list of qualified issuers: AES, QES required.',
                        $signer->email,
                        $signer->certificateIssuer ?? 'unknown',
                    ),
                };
            }
        }

        return $problems;
    }

    /**
     * The weakest level any signer reached, or null if someone hasn't signed yet.
     *
     * @param list<string> $qualifiedIssuers see SignerEvidence::achievedLevel()
     */
    public function lowestLevel(array $qualifiedIssuers = []): ?SignatureLevel
    {
        $lowest = null;
        foreach ($this->signers as $signer) {
            $level = $signer->achievedLevel($qualifiedIssuers);
            if ($level === null) {
                return null;
            }
            if ($lowest === null || !$level->satisfies($lowest)) {
                $lowest = $level;
            }
        }

        return $lowest;
    }
}
