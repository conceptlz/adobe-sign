<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetDetailedWidgetParticipantSetInfo
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * @var ProviderParticipantSetInfo|null
     */
    protected $providerParticipantSetInfo;
    /**
     * Role assumed by all participants in the set (signer, approver etc.). This cannot be changed as part of the PUT call.
     *
     * @var string|null
     */
    protected $role;
    /**
     * Name of ParticipantSet (it can be empty, but needs not to be unique in a single agreement). Maximum no of characters in participant set name is restricted to 255. This cannot be changed as part of the PUT call.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The unique identifier of the participant set. This cannot be changed as part of the PUT call.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set
     *
     * @var list<WidgetDetailedParticipantInfo>|null
     */
    protected $memberInfos;
    /**
     * Index indicating sequential signing group (specified for hybrid routing). This cannot be changed as part of the PUT call.
     *
     * @var int|null
     */
    protected $order;
    /**
     * @return ProviderParticipantSetInfo|null
     */
    public function getProviderParticipantSetInfo(): ?ProviderParticipantSetInfo
    {
        return $this->providerParticipantSetInfo;
    }
    /**
     * @param ProviderParticipantSetInfo|null $providerParticipantSetInfo
     *
     * @return self
     */
    public function setProviderParticipantSetInfo(?ProviderParticipantSetInfo $providerParticipantSetInfo): self
    {
        $this->initialized['providerParticipantSetInfo'] = true;
        $this->providerParticipantSetInfo = $providerParticipantSetInfo;
        return $this;
    }
    /**
     * Role assumed by all participants in the set (signer, approver etc.). This cannot be changed as part of the PUT call.
     *
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }
    /**
     * Role assumed by all participants in the set (signer, approver etc.). This cannot be changed as part of the PUT call.
     *
     * @param string|null $role
     *
     * @return self
     */
    public function setRole(?string $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;
        return $this;
    }
    /**
     * Name of ParticipantSet (it can be empty, but needs not to be unique in a single agreement). Maximum no of characters in participant set name is restricted to 255. This cannot be changed as part of the PUT call.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of ParticipantSet (it can be empty, but needs not to be unique in a single agreement). Maximum no of characters in participant set name is restricted to 255. This cannot be changed as part of the PUT call.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The unique identifier of the participant set. This cannot be changed as part of the PUT call.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the participant set. This cannot be changed as part of the PUT call.
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set
     *
     * @return list<WidgetDetailedParticipantInfo>|null
     */
    public function getMemberInfos(): ?array
    {
        return $this->memberInfos;
    }
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set
     *
     * @param list<WidgetDetailedParticipantInfo>|null $memberInfos
     *
     * @return self
     */
    public function setMemberInfos(?array $memberInfos): self
    {
        $this->initialized['memberInfos'] = true;
        $this->memberInfos = $memberInfos;
        return $this;
    }
    /**
     * Index indicating sequential signing group (specified for hybrid routing). This cannot be changed as part of the PUT call.
     *
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }
    /**
     * Index indicating sequential signing group (specified for hybrid routing). This cannot be changed as part of the PUT call.
     *
     * @param int|null $order
     *
     * @return self
     */
    public function setOrder(?int $order): self
    {
        $this->initialized['order'] = true;
        $this->order = $order;
        return $this;
    }
}