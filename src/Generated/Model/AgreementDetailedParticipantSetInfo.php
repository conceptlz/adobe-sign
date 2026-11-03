<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementDetailedParticipantSetInfo
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
     * Role assumed by all participants in the set (signer, approver etc.). This cannot be changed as part of the PUT call.
     *
     * @var string|null
     */
    protected $role;
    /**
     * @var ProviderParticipationInfo|null
     */
    protected $providerParticipationInfo;
    /**
     * ID of the sealing credential, which can be obtained through <b>GET /autoseals</b> call.
     *
     * @var string|null
     */
    protected $electronicSealId;
    /**
     * The allowed signature types for participants in the set.
     *
     * @var list<string>|null
     */
    protected $signatureInputTypes;
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
     * Participant set's private message - all participants in the set will receive the same message. This cannot be changed as part of the PUT call.
     *
     * @var string|null
     */
    protected $privateMessage;
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set. Required, unless ParticipantSet has the ELECTRONIC_SEALER role. Email and/or phone delivery info field is expected.
     *
     * @var list<AgreementDetailedParticipantInfo>|null
     */
    protected $memberInfos;
    /**
     * Require recipient to sign agreement with digital signature
     *
     * @var bool|null
     */
    protected $isDigitalSignatureRequired;
    /**
     * Index indicating sequential signing group (specified for hybrid routing). This cannot be changed as part of the PUT call.
     *
     * @var int|null
     */
    protected $order;
    /**
     * The agreement status with respect to the participant set. This cannot be changed as part of the PUT call.
     *
     * @var string|null
     */
    protected $status;
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
     * @return ProviderParticipationInfo|null
     */
    public function getProviderParticipationInfo(): ?ProviderParticipationInfo
    {
        return $this->providerParticipationInfo;
    }
    /**
     * @param ProviderParticipationInfo|null $providerParticipationInfo
     *
     * @return self
     */
    public function setProviderParticipationInfo(?ProviderParticipationInfo $providerParticipationInfo): self
    {
        $this->initialized['providerParticipationInfo'] = true;
        $this->providerParticipationInfo = $providerParticipationInfo;
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
     * The allowed signature types for participants in the set.
     *
     * @return list<string>|null
     */
    public function getSignatureInputTypes(): ?array
    {
        return $this->signatureInputTypes;
    }
    /**
     * The allowed signature types for participants in the set.
     *
     * @param list<string>|null $signatureInputTypes
     *
     * @return self
     */
    public function setSignatureInputTypes(?array $signatureInputTypes): self
    {
        $this->initialized['signatureInputTypes'] = true;
        $this->signatureInputTypes = $signatureInputTypes;
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
     * Participant set's private message - all participants in the set will receive the same message. This cannot be changed as part of the PUT call.
     *
     * @return string|null
     */
    public function getPrivateMessage(): ?string
    {
        return $this->privateMessage;
    }
    /**
     * Participant set's private message - all participants in the set will receive the same message. This cannot be changed as part of the PUT call.
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
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set. Required, unless ParticipantSet has the ELECTRONIC_SEALER role. Email and/or phone delivery info field is expected.
     *
     * @return list<AgreementDetailedParticipantInfo>|null
     */
    public function getMemberInfos(): ?array
    {
        return $this->memberInfos;
    }
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set. Required, unless ParticipantSet has the ELECTRONIC_SEALER role. Email and/or phone delivery info field is expected.
     *
     * @param list<AgreementDetailedParticipantInfo>|null $memberInfos
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
     * Require recipient to sign agreement with digital signature
     *
     * @return bool|null
     */
    public function getIsDigitalSignatureRequired(): ?bool
    {
        return $this->isDigitalSignatureRequired;
    }
    /**
     * Require recipient to sign agreement with digital signature
     *
     * @param bool|null $isDigitalSignatureRequired
     *
     * @return self
     */
    public function setIsDigitalSignatureRequired(?bool $isDigitalSignatureRequired): self
    {
        $this->initialized['isDigitalSignatureRequired'] = true;
        $this->isDigitalSignatureRequired = $isDigitalSignatureRequired;
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
    /**
     * The agreement status with respect to the participant set. This cannot be changed as part of the PUT call.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The agreement status with respect to the participant set. This cannot be changed as part of the PUT call.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}