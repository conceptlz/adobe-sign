<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Enum;

/**
 * Electronic signature level, after eIDAS (EU No 910/2014) and laws modelled on it, such as the
 * UAE's Federal Decree-Law No. 46 of 2021.
 *
 * - SES (simple): any electronic signature (typed, drawn, click). Acrobat Sign's default.
 * - AES (advanced): a certificate-based digital signature, uniquely linked to and identifying the
 *   signer and detecting later changes. Requested per signer with isDigitalSignatureRequired.
 * - QES (qualified): an AES made with a qualified certificate from a qualified trust service
 *   provider (QTSP). The API request is the same as AES; what makes it qualified is the provider
 *   the Acrobat Sign account is configured to use. Confirm it after signing with
 *   Agreements::signatureEvidence() and your list of qualified certificate issuers.
 *
 * The SDK can request a level and report what was actually used; whether a signature meets a
 * legal requirement in a given jurisdiction is for your legal/compliance team to decide.
 */
enum SignatureLevel: string
{
    case SES = 'SES';
    case AES = 'AES';
    case QES = 'QES';

    /**
     * AES and QES need a certificate-based digital signature; SES does not.
     */
    public function requiresDigitalSignature(): bool
    {
        return $this !== self::SES;
    }

    /**
     * True when a signature at this level is at least as strong as $required.
     */
    public function satisfies(self $required): bool
    {
        return $this->rank() >= $required->rank();
    }

    private function rank(): int
    {
        return match ($this) {
            self::SES => 1,
            self::AES => 2,
            self::QES => 3,
        };
    }
}
