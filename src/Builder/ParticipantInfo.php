<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Builder;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;

/**
 * One member of a participant set. Serialises to the spec's ParticipantSetMemberInfo.
 */
final class ParticipantInfo
{
    /** @var array<string, mixed> */
    private array $extra = [];

    private ?Verification $verification = null;

    private function __construct(
        private readonly string $email,
        private readonly ?string $name = null,
    ) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid participant email.', $email));
        }
    }

    /**
     * @param string|null $name the recipient's full name
     * @throws InvalidArgumentException for an invalid email
     */
    public static function email(string $email, ?string $name = null): self
    {
        return new self($email, $name);
    }

    /**
     * How the participant must prove their identity before viewing and signing, e.g.
     * Verification::emailOtp(), ::phone(...), ::governmentId(), ::digitalIdentity(...).
     */
    public function verifyWith(Verification $verification): self
    {
        $this->verification = $verification;

        return $this;
    }

    /**
     * Require a password before the participant can open the agreement.
     * Shorthand for verifyWith(Verification::password($password)).
     *
     * @throws InvalidArgumentException for an empty password
     */
    public function password(#[\SensitiveParameter] string $password): self
    {
        return $this->verifyWith(Verification::password($password));
    }

    /**
     * Raw ParticipantSetMemberInfo fields this builder doesn't model (e.g. phoneDeliveryInfo).
     *
     * @param array<string, mixed> $fields
     */
    public function with(array $fields): self
    {
        $this->extra = array_replace($this->extra, $fields);

        return $this;
    }

    /**
     * The ParticipantSetMemberInfo array; with() fields are merged last.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = ['email' => $this->email];
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->verification !== null) {
            $data['securityOption'] = $this->verification->toArray();
        }

        return array_replace($data, $this->extra);
    }
}
