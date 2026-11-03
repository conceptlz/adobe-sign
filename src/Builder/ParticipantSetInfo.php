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
     * @param ParticipantRole|string $role a string keeps you working when Adobe adds roles
     */
    public static function role(ParticipantRole|string $role, ParticipantInfo|string ...$members): self
    {
        $set = new self($role instanceof ParticipantRole ? $role->value : $role);

        foreach ($members as $member) {
            $set->member($member);
        }

        return $set;
    }

    public static function signer(ParticipantInfo|string ...$members): self
    {
        return self::role(ParticipantRole::SIGNER, ...$members);
    }

    public static function approver(ParticipantInfo|string ...$members): self
    {
        return self::role(ParticipantRole::APPROVER, ...$members);
    }

    /**
     * @param ParticipantInfo|string $member a string is treated as an email address
     */
    public function member(ParticipantInfo|string $member): self
    {
        $this->members[] = is_string($member) ? ParticipantInfo::email($member) : $member;

        return $this;
    }

    /**
     * 1-based position in the signing sequence. Sets sharing an order act in parallel.
     * Left unset, AgreementInfo numbers sets in the order they were added.
     */
    public function order(int $order): self
    {
        if ($order < 1) {
            throw new InvalidArgumentException('Participant set order starts at 1.');
        }
        $this->order = $order;

        return $this;
    }

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function label(string $label): self
    {
        $this->label = $label;

        return $this;
    }

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

    public function getOrder(): ?int
    {
        return $this->order;
    }

    /** @return array<string, mixed> */
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
