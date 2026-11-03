<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Builder;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;

/**
 * How a participant must prove who they are before they can view and sign.
 * Serialises to the spec's ParticipantSecurityOption.
 *
 *     ParticipantInfo::email('jane@example.com')->verifyWith(Verification::emailOtp());
 *
 * Which methods are available depends on the Acrobat Sign account: an admin enables them, and
 * some (government ID) consume a paid quota. A method the account doesn't allow is refused by
 * Adobe with AccountCapabilityException. Identity checks strengthen any signature level; they do
 * not by themselves make a signature AES or QES (see SignatureLevel).
 */
final class Verification
{
    /**
     * @param array<string, mixed> $details extra ParticipantSecurityOption fields
     */
    private function __construct(
        public readonly string $method,
        private readonly array $details = [],
    ) {
    }

    /** No extra check: access via the email link alone (Acrobat Sign's default). */
    public static function none(): self
    {
        return new self('NONE');
    }

    /** A one-time code sent to the participant's email address. */
    public static function emailOtp(): self
    {
        return new self('EMAIL_OTP');
    }

    /**
     * A password you share with the participant out of band. Adobe never reveals it.
     */
    public static function password(#[\SensitiveParameter] string $password): self
    {
        if ($password === '') {
            throw new InvalidArgumentException('A verification password must not be empty.');
        }

        return new self('PASSWORD', ['password' => $password]);
    }

    /**
     * A code sent by SMS (or voice) to this number.
     *
     * @param string $phone national number, e.g. "501234567"
     * @param string $countryCode calling code without "+", e.g. "971"
     * @param string|null $countryIsoCode ISO 3166-1 alpha-2, e.g. "AE"
     */
    public static function phone(string $phone, string $countryCode, ?string $countryIsoCode = null): self
    {
        return new self('PHONE', ['phoneInfo' => self::phoneInfo($phone, $countryCode, $countryIsoCode)]);
    }

    /**
     * A code sent by WhatsApp to this number.
     */
    public static function whatsApp(string $phone, string $countryCode, ?string $countryIsoCode = null): self
    {
        return new self('WHATSAPP', ['phoneInfo' => self::phoneInfo($phone, $countryCode, $countryIsoCode)]);
    }

    /** Knowledge-based authentication (questions from public records; US only). */
    public static function knowledgeBased(): self
    {
        return new self('KBA');
    }

    /** A photo of a government-issued ID (and optionally a selfie). Uses the account's paid quota. */
    public static function governmentId(): self
    {
        return new self('GOV_ID');
    }

    /**
     * A national eID or bank ID through Adobe's Digital Identity Gateway (e.g. itsme, BankID, IDnow).
     * The provider must be configured on the account; its id comes from your Acrobat Sign admin.
     */
    public static function digitalIdentity(string $providerId, ?string $loginHint = null): self
    {
        if (trim($providerId) === '') {
            throw new InvalidArgumentException('A Digital Identity Gateway provider id is required.');
        }
        if ($loginHint !== null && mb_strlen($loginHint) > 255) {
            throw new InvalidArgumentException('A Digital Identity Gateway login hint must be 255 characters or less.');
        }

        $digAuthInfo = ['providerId' => $providerId];
        if ($loginHint !== null) {
            $digAuthInfo['loginHint'] = $loginHint;
        }

        return new self('DIG_ID', ['digAuthInfo' => $digAuthInfo]);
    }

    /** Sign in with an Acrobat Sign (Adobe) account. */
    public static function adobeAccount(): self
    {
        return new self('ADOBE_SIGN');
    }

    /**
     * @return array<string, mixed> ParticipantSecurityOption
     */
    public function toArray(): array
    {
        return ['authenticationMethod' => $this->method] + $this->details;
    }

    /**
     * @return array<string, string>
     */
    private static function phoneInfo(string $phone, string $countryCode, ?string $countryIsoCode): array
    {
        $phone = preg_replace('/[\s\-().]/', '', $phone) ?? '';
        $countryCode = ltrim(trim($countryCode), '+');

        if (!ctype_digit($phone) || !ctype_digit($countryCode)) {
            throw new InvalidArgumentException('Phone verification needs a numeric phone number and country calling code (e.g. "501234567", "971").');
        }
        if ($countryIsoCode !== null && !preg_match('/^[A-Za-z]{2}$/', $countryIsoCode)) {
            throw new InvalidArgumentException('Country ISO code must be two letters, e.g. "AE".');
        }

        $info = ['phone' => $phone, 'countryCode' => $countryCode];
        if ($countryIsoCode !== null) {
            $info['countryIsoCode'] = strtoupper($countryIsoCode);
        }

        return $info;
    }
}
