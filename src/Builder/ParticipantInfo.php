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

    /** @var array<string, mixed>|null */
    private ?array $securityOption = null;

    private function __construct(
        private readonly string $email,
        private readonly ?string $name = null,
    ) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid participant email.', $email));
        }
    }

    public static function email(string $email, ?string $name = null): self
    {
        return new self($email, $name);
    }

    /**
     * Require a password before the participant can open the agreement.
     */
    public function password(#[\SensitiveParameter] string $password): self
    {
        $this->securityOption = ['authenticationMethod' => 'PASSWORD', 'password' => $password];

        return $this;
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

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $data = ['email' => $this->email];
        if ($this->name !== null) {
            $data['name'] = $this->name;
        }
        if ($this->securityOption !== null) {
            $data['securityOption'] = $this->securityOption;
        }

        return array_replace($data, $this->extra);
    }
}
