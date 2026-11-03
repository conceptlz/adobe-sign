<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Builder;

use Conceptlz\AdobeSign\Enum\ParticipantRole;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;

/**
 * A group that acts at one step of the signing order; any one member may act for the set.
 * Serialises to the spec's ParticipantSetInfo (required: role, order).
 */
final class ParticipantSetInfo
{
    /** @var list<ParticipantInfo> */
    private array $members = [];

    private ?int $order = null;

    private ?string $name = null;

    private ?string $label = null;

    private ?string $privateMessage = null;

    /** @var array<string, mixed> */
    private array $extra = [];

    private function __construct(private readonly string $role)
    {
    }

    /**
     * A set with any role, e.g. ParticipantRole::FORM_FILLER.
     *
     * @param ParticipantRole|string $role a string keeps you working when Adobe adds roles
     * @param ParticipantInfo|string ...$members strings are treated as email addresses
     * @throws InvalidArgumentException for an invalid member email
     */
    public static function role(ParticipantRole|string $role, ParticipantInfo|string ...$members): self
    {
        $set = new self($role instanceof ParticipantRole ? $role->value : $role);

        foreach ($members as $member) {
            $set->member($member);
        }

        return $set;
    }

    /**
     * A SIGNER set.
     *
     * @param ParticipantInfo|string ...$members strings are treated as email addresses
     * @throws InvalidArgumentException for an invalid member email
     */
    public static function signer(ParticipantInfo|string ...$members): self
    {
        return self::role(ParticipantRole::SIGNER, ...$members);
    }

    /**
     * An APPROVER set.
     *
     * @param ParticipantInfo|string ...$members strings are treated as email addresses
     * @throws InvalidArgumentException for an invalid member email
     */
    public static function approver(ParticipantInfo|string ...$members): self
    {
        return self::role(ParticipantRole::APPROVER, ...$members);
    }

    /**
     * Add a member; any one member may act for the set.
     *
     * @param ParticipantInfo|string $member a string is treated as an email address
     * @throws InvalidArgumentException for an invalid email
     */
    public function member(ParticipantInfo|string $member): self
    {
        $this->members[] = is_string($member) ? ParticipantInfo::email($member) : $member;

        return $this;
    }

    /**
     * 1-based position in the signing sequence. Sets sharing an order act in parallel.
     * Left unset, AgreementInfo numbers sets in the order they were added.
     *
     * @throws InvalidArgumentException when $order is below 1
     */
    public function order(int $order): self
    {
        if ($order < 1) {
            throw new InvalidArgumentException('Participant set order starts at 1.');
        }
        $this->order = $order;

        return $this;
    }

    /** Set name; must be unique within the agreement if given (max 255 characters). */
    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /** Unique label; maps the set to a step of a custom workflow. */
    public function label(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /** Message only this set's members receive. */
    public function privateMessage(string $message): self
    {
        $this->privateMessage = $message;

        return $this;
    }

    /**
     * Raw ParticipantSetInfo fields this builder doesn't model.
     *
     * @param array<string, mixed> $fields
     */
    public function with(array $fields): self
    {
        $this->extra = array_replace($this->extra, $fields);

        return $this;
    }

    /** The explicit order(), or null if AgreementInfo should number it. */
    public function getOrder(): ?int
    {
        return $this->order;
    }

    /**
     * The ParticipantSetInfo array; with() fields are merged last.
     *
     * @param int|null $defaultOrder used when no order() was set
     * @return array<string, mixed>
     * @throws InvalidArgumentException when the set has no members or no order at all
     */
    public function toArray(?int $defaultOrder = null): array
    {
        if ($this->members === []) {
            throw new InvalidArgumentException(sprintf('Participant set "%s" has no members.', $this->role));
        }

        $order = $this->order ?? $defaultOrder;
        if ($order === null) {
            throw new InvalidArgumentException('Participant set order is required.');
        }

        $data = array_filter([
            'role' => $this->role,
            'order' => $order,
            'memberInfos' => array_map(static fn (ParticipantInfo $m) => $m->toArray(), $this->members),
            'name' => $this->name,
            'label' => $this->label,
            'privateMessage' => $this->privateMessage,
        ], static fn ($v) => $v !== null);

        return array_replace($data, $this->extra);
    }
}
