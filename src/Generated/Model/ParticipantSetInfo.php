<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ParticipantSetInfo
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
     * Role assumed by all participants in the set (signer, approver etc.)
     *
     * @var string|null
     */
    protected $role;
    /**
     * The allowed signature types for participants in the set.
     *
     * @var list<string>|null
     */
    protected $signatureInputTypes;
    /**
     * Notification types to disable for all members in this participant set. Currently applies only to email notifications; SMS and WhatsApp notifications are not affected. INITIAL: first notification when agreement is sent to participant for action (e.g., 'please sign' email). INTERMEDIATE: status update notifications during the signing workflow, including when participants sign, delegate, reject, or when other workflow events occur. FINAL: completion notification when the agreement is fully executed and all participants have completed their actions. CANCELLATION: notifications when the agreement is cancelled by sender or expires. REMINDER: all reminder notifications for pending participant actions, including both one-time manual reminders and recurring scheduled reminders. This will be ignored as part of PUT calls. Not returned in GET calls.
     *
     * @var list<string>|null
     */
    protected $disabledNotificationTypes;
    /**
     * The unique label of a participant set.<br>For custom workflows, label specified in the participation set should map it to the participation step in the custom workflow.
     *
     * @var string|null
     */
    protected $label;
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set. Required, unless ParticipantSet has the ELECTRONIC_SEALER role. Email and/or phone delivery info field is expected.
     *
     * @var list<ParticipantSetMemberInfo>|null
     */
    protected $memberInfos;
    /**
     * When you enable limited document visibility (documentVisibilityEnabled), you can specify which file (fileInfo) should be made visible to which specific participant set.<br>Specify one or more label values of a fileInfos element.<br>Each signer participant sets must contain at least one required signature field in at least one visible file included in this API call; if not a page with a signature field is automatically appended for any missing participant sets. If there is a possibility that one or more participant sets do not have a required signature field in the files included in the API call, all signer participant sets should include a special index value of '0' to make this automatically appended signature page visible to the signer. Not doing so may result in an error. For all other roles, you may omit this value to exclude this page.
     *
     * @var list<string>|null
     */
    protected $visiblePages;
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
     * Name of the participant set (it can be empty, but if present it must be unique within a single agreement). Maximum no of characters in participant set name is restricted to 255
     *
     * @var string|null
     */
    protected $name;
    /**
     * The unique identifier of the participant. This will be ignored as part of POST or PUT calls. The Id might be null in draft state
     *
     * @var string|null
     */
    protected $id;
    /**
     * Participant set's private message - all participants in the set will receive the same message
     *
     * @var string|null
     */
    protected $privateMessage;
    /**
     * Require recipient to sign agreement with digital signature
     *
     * @var bool|null
     */
    protected $isDigitalSignatureRequired;
    /**
     * Index indicating position at which signing group needs to sign. Signing group to sign at first place is assigned a 1 index. Different signingOrder specified in input should form a valid consecutive increasing sequence of integers. Otherwise signingOrder will be considered invalid. Order for Witness participant must match the provider order in parallel and hybrid flows. In sequential flows, the witness order must follow the provider order.
     *
     * @var int|null
     */
    protected $order;
    /**
     * Role assumed by all participants in the set (signer, approver etc.)
     *
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }
    /**
     * Role assumed by all participants in the set (signer, approver etc.)
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
     * Notification types to disable for all members in this participant set. Currently applies only to email notifications; SMS and WhatsApp notifications are not affected. INITIAL: first notification when agreement is sent to participant for action (e.g., 'please sign' email). INTERMEDIATE: status update notifications during the signing workflow, including when participants sign, delegate, reject, or when other workflow events occur. FINAL: completion notification when the agreement is fully executed and all participants have completed their actions. CANCELLATION: notifications when the agreement is cancelled by sender or expires. REMINDER: all reminder notifications for pending participant actions, including both one-time manual reminders and recurring scheduled reminders. This will be ignored as part of PUT calls. Not returned in GET calls.
     *
     * @return list<string>|null
     */
    public function getDisabledNotificationTypes(): ?array
    {
        return $this->disabledNotificationTypes;
    }
    /**
     * Notification types to disable for all members in this participant set. Currently applies only to email notifications; SMS and WhatsApp notifications are not affected. INITIAL: first notification when agreement is sent to participant for action (e.g., 'please sign' email). INTERMEDIATE: status update notifications during the signing workflow, including when participants sign, delegate, reject, or when other workflow events occur. FINAL: completion notification when the agreement is fully executed and all participants have completed their actions. CANCELLATION: notifications when the agreement is cancelled by sender or expires. REMINDER: all reminder notifications for pending participant actions, including both one-time manual reminders and recurring scheduled reminders. This will be ignored as part of PUT calls. Not returned in GET calls.
     *
     * @param list<string>|null $disabledNotificationTypes
     *
     * @return self
     */
    public function setDisabledNotificationTypes(?array $disabledNotificationTypes): self
    {
        $this->initialized['disabledNotificationTypes'] = true;
        $this->disabledNotificationTypes = $disabledNotificationTypes;
        return $this;
    }
    /**
     * The unique label of a participant set.<br>For custom workflows, label specified in the participation set should map it to the participation step in the custom workflow.
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * The unique label of a participant set.<br>For custom workflows, label specified in the participation set should map it to the participation step in the custom workflow.
     *
     * @param string|null $label
     *
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
        return $this;
    }
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set. Required, unless ParticipantSet has the ELECTRONIC_SEALER role. Email and/or phone delivery info field is expected.
     *
     * @return list<ParticipantSetMemberInfo>|null
     */
    public function getMemberInfos(): ?array
    {
        return $this->memberInfos;
    }
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set. Required, unless ParticipantSet has the ELECTRONIC_SEALER role. Email and/or phone delivery info field is expected.
     *
     * @param list<ParticipantSetMemberInfo>|null $memberInfos
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
     * When you enable limited document visibility (documentVisibilityEnabled), you can specify which file (fileInfo) should be made visible to which specific participant set.<br>Specify one or more label values of a fileInfos element.<br>Each signer participant sets must contain at least one required signature field in at least one visible file included in this API call; if not a page with a signature field is automatically appended for any missing participant sets. If there is a possibility that one or more participant sets do not have a required signature field in the files included in the API call, all signer participant sets should include a special index value of '0' to make this automatically appended signature page visible to the signer. Not doing so may result in an error. For all other roles, you may omit this value to exclude this page.
     *
     * @return list<string>|null
     */
    public function getVisiblePages(): ?array
    {
        return $this->visiblePages;
    }
    /**
     * When you enable limited document visibility (documentVisibilityEnabled), you can specify which file (fileInfo) should be made visible to which specific participant set.<br>Specify one or more label values of a fileInfos element.<br>Each signer participant sets must contain at least one required signature field in at least one visible file included in this API call; if not a page with a signature field is automatically appended for any missing participant sets. If there is a possibility that one or more participant sets do not have a required signature field in the files included in the API call, all signer participant sets should include a special index value of '0' to make this automatically appended signature page visible to the signer. Not doing so may result in an error. For all other roles, you may omit this value to exclude this page.
     *
     * @param list<string>|null $visiblePages
     *
     * @return self
     */
    public function setVisiblePages(?array $visiblePages): self
    {
        $this->initialized['visiblePages'] = true;
        $this->visiblePages = $visiblePages;
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
     * Name of the participant set (it can be empty, but if present it must be unique within a single agreement). Maximum no of characters in participant set name is restricted to 255
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the participant set (it can be empty, but if present it must be unique within a single agreement). Maximum no of characters in participant set name is restricted to 255
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
     * The unique identifier of the participant. This will be ignored as part of POST or PUT calls. The Id might be null in draft state
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the participant. This will be ignored as part of POST or PUT calls. The Id might be null in draft state
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
     * Participant set's private message - all participants in the set will receive the same message
     *
     * @return string|null
     */
    public function getPrivateMessage(): ?string
    {
        return $this->privateMessage;
    }
    /**
     * Participant set's private message - all participants in the set will receive the same message
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
     * Index indicating position at which signing group needs to sign. Signing group to sign at first place is assigned a 1 index. Different signingOrder specified in input should form a valid consecutive increasing sequence of integers. Otherwise signingOrder will be considered invalid. Order for Witness participant must match the provider order in parallel and hybrid flows. In sequential flows, the witness order must follow the provider order.
     *
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }
    /**
     * Index indicating position at which signing group needs to sign. Signing group to sign at first place is assigned a 1 index. Different signingOrder specified in input should form a valid consecutive increasing sequence of integers. Otherwise signingOrder will be considered invalid. Order for Witness participant must match the provider order in parallel and hybrid flows. In sequential flows, the witness order must follow the provider order.
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