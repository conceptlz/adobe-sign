<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetAdditionalParticipationSetInfo
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
     * Role assumed by all participants in the set (signer, approver, etc.) Web Form First Participant will only have roles - Signer, Approver, Acceptor and Form Filler
     *
     * @var string|null
     */
    protected $role;
    /**
     * ID of the sealing credential, which can be obtained through <b>GET /autoseals</b> call.
     *
     * @var string|null
     */
    protected $electronicSealId;
    /**
     * Name of ParticipantSet (it can be empty, but needs not to be unique in a single agreement). Maximum no of characters in participant set name is restricted to 255. This cannot be changed as part of the PUT call.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The unique identifier of the Web form participant. This will be ignored as part of POST or PUT calls.The Id might be null in draft state,
     *
     * @var string|null
     */
    protected $id;
    /**
     * Private message for the participants in the set
     *
     * @var string|null
     */
    protected $privateMessage;
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (email, e.g.) for all the additional participants in the web form. If the email of the participant is unknown at the time of web form creation, the email should be left empty. Required, unless ParticipantSet has the ELECTRONIC_SEALER role,
     *
     * @var list<WidgetParticipantInfo>|null
     */
    protected $memberInfos;
    /**
     * Index indicating position at which signing group needs to sign. Additional participant to sign at first place is assigned a index of 1. Web Form participant should not have any order specified. Web Form participant should not have any email address and and can not have phone authentication applied. Different signingOrder specified in input should form a valid consecutive increasing sequence of integers. Otherwise signingOrder will be considered invalid,
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
     * Role assumed by all participants in the set (signer, approver, etc.) Web Form First Participant will only have roles - Signer, Approver, Acceptor and Form Filler
     *
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }
    /**
     * Role assumed by all participants in the set (signer, approver, etc.) Web Form First Participant will only have roles - Signer, Approver, Acceptor and Form Filler
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
     * ID of the sealing credential, which can be obtained through <b>GET /autoseals</b> call.
     *
     * @return string|null
     */
    public function getElectronicSealId(): ?string
    {
        return $this->electronicSealId;
    }
    /**
     * ID of the sealing credential, which can be obtained through <b>GET /autoseals</b> call.
     *
     * @param string|null $electronicSealId
     *
     * @return self
     */
    public function setElectronicSealId(?string $electronicSealId): self
    {
        $this->initialized['electronicSealId'] = true;
        $this->electronicSealId = $electronicSealId;
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
     * The unique identifier of the Web form participant. This will be ignored as part of POST or PUT calls.The Id might be null in draft state,
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the Web form participant. This will be ignored as part of POST or PUT calls.The Id might be null in draft state,
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
     * Private message for the participants in the set
     *
     * @return string|null
     */
    public function getPrivateMessage(): ?string
    {
        return $this->privateMessage;
    }
    /**
     * Private message for the participants in the set
     *
     * @param string|null $privateMessage
     *
     * @return self
     */
    public function setPrivateMessage(?string $privateMessage): self
    {
        $this->initialized['privateMessage'] = true;
        $this->privateMessage = $privateMessage;
        return $this;
    }
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (email, e.g.) for all the additional participants in the web form. If the email of the participant is unknown at the time of web form creation, the email should be left empty. Required, unless ParticipantSet has the ELECTRONIC_SEALER role,
     *
     * @return list<WidgetParticipantInfo>|null
     */
    public function getMemberInfos(): ?array
    {
        return $this->memberInfos;
    }
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (email, e.g.) for all the additional participants in the web form. If the email of the participant is unknown at the time of web form creation, the email should be left empty. Required, unless ParticipantSet has the ELECTRONIC_SEALER role, 
     *
     * @param list<WidgetParticipantInfo>|null $memberInfos
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
     * Index indicating position at which signing group needs to sign. Additional participant to sign at first place is assigned a index of 1. Web Form participant should not have any order specified. Web Form participant should not have any email address and and can not have phone authentication applied. Different signingOrder specified in input should form a valid consecutive increasing sequence of integers. Otherwise signingOrder will be considered invalid,
     *
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }
    /**
     * Index indicating position at which signing group needs to sign. Additional participant to sign at first place is assigned a index of 1. Web Form participant should not have any order specified. Web Form participant should not have any email address and and can not have phone authentication applied. Different signingOrder specified in input should form a valid consecutive increasing sequence of integers. Otherwise signingOrder will be considered invalid,
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