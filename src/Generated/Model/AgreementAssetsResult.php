<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementAssetsResult
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
     * ['SENDER' or 'CC' or 'SIGNER' or 'APPROVER' or 'FORM_FILLER' or 'ACCEPTOR' or 'CERTIFIED_RECIPIENT' or 'DELEGATE_TO_SIGNER' or 'DELEGATE_TO_APPROVER' or 'DELEGATE_TO_FORM_FILLER' or 'DELEGATE_TO_ACCEPTOR' or 'DELEGATE_TO_CERTIFIED_RECIPIENT' or 'NOTARY_SIGNER' or 'ELECTRONIC_SEALER' or 'HOST' or 'IN_PERSON_SIGNER' or 'SHARE' or 'OTHER']: The roles user has on agreement assets.
     *
     * @var list<string>|null
     */
    protected $role;
    /**
     * True if agreement asset is hidden for the user.
     *
     * @var bool|null
     */
    protected $hidden;
    /**
     * Unique identifier of the group associated with the owner of the view of the agreement asset.
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * An arbitrary value from your system, which can be specified at sending time and then later returned or queried.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * ['DOCUMENT' or 'FORM_FIELD_LAYER']: The sub types of the agreement asset. Only agreement assets with type LIBRARY_TEMPLATE currently have this field populated.
     *
     * @var list<mixed>|null
     */
    protected $subTypes;
    /**
     * ['AGREEMENT' or 'MEGASIGN_CHILD' or 'WIDGET_INSTANCE' or 'MEGASIGN_PARENT' or 'LIBRARY_TEMPLATE' or 'WIDGET']: The kind of the agreement asset.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Unique identifier of the owner of the view of the agreement asset.
     *
     * @var string|null
     */
    protected $userId;
    /**
     * the parent id of a bulk send child *OR* the originating id of a web form agreement instance.
     *
     * @var string|null
     */
    protected $parentId;
    /**
     * List of all participants for the agreement asset except where the document view owner, i.e. API caller, is a participant. Fields related to the document view owner ('userId', 'groupId', 'role', 'status', 'hidden') and their role, if any, as participant are included at the top level of AgreementAssetsResult object.
     *
     * @var list<SearchResultParticipant>|null
     */
    protected $participantList;
    /**
     * The date on which the agreement asset was created. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * The last date the agreement was modified by user action (signing, canceling, etc.). The Modified value updates with every action until the agreement reaches a terminal status (Complete/Canceled/Expired). Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @var string|null
     */
    protected $modifiedDate;
    /**
     * Name of the agreement asset.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The unique identifier of the agreement asset.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The identifier of custom workflow which defines the routing path of an agreement.
     *
     * @var string|null
     */
    protected $workflowId;
    /**
     * The date on which the agreement asset expires and needs to be signed before it. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @var string|null
     */
    protected $expirationDate;
    /**
     * ['WAITING_FOR_MY_SIGNATURE' or 'WAITING_FOR_MY_APPROVAL' or 'WAITING_FOR_MY_DELEGATION' or 'WAITING_FOR_MY_ACKNOWLEDGEMENT' or 'WAITING_FOR_MY_ACCEPTANCE' or 'WAITING_FOR_MY_FORM_FILLING' or 'WAITING_FOR_MY_HOSTING' or 'WAITING_FOR_AUTHORING' or 'WAITING_FOR_PREFILL' or 'WAITING_FOR_REVISION' or 'OUT_FOR_SIGNATURE' or 'OUT_FOR_APPROVAL' or 'OUT_FOR_DELIVERY' or 'OUT_FOR_ACCEPTANCE' or 'OUT_FOR_FORM_FILLING' or 'SIGNED' or 'APPROVED' or 'FORM_FILLED' or 'DELIVERED' or 'ACCEPTED' or 'ARCHIVED' or 'CANCELLED' or 'REMOVED' or 'EXPIRED' or 'AUTHORING' or 'ACTIVE' or 'DISABLED' or 'WAITING_FOR_NOTARIZATION' or  'ACCEPT_BEFORE_NOTARIZATION' or 'PAUSED' or 'SCHEDULED' or 'OTHER']: detailed status of the agreement asset. <b>Please note that PARTIAL and DRAFT agreements are not supported for search.</b>
     *
     * @var string|null
     */
    protected $status;
    /**
     * ['SENDER' or 'CC' or 'SIGNER' or 'APPROVER' or 'FORM_FILLER' or 'ACCEPTOR' or 'CERTIFIED_RECIPIENT' or 'DELEGATE_TO_SIGNER' or 'DELEGATE_TO_APPROVER' or 'DELEGATE_TO_FORM_FILLER' or 'DELEGATE_TO_ACCEPTOR' or 'DELEGATE_TO_CERTIFIED_RECIPIENT' or 'NOTARY_SIGNER' or 'ELECTRONIC_SEALER' or 'HOST' or 'IN_PERSON_SIGNER' or 'SHARE' or 'OTHER']: The roles user has on agreement assets.
     *
     * @return list<string>|null
     */
    public function getRole(): ?array
    {
        return $this->role;
    }
    /**
     * ['SENDER' or 'CC' or 'SIGNER' or 'APPROVER' or 'FORM_FILLER' or 'ACCEPTOR' or 'CERTIFIED_RECIPIENT' or 'DELEGATE_TO_SIGNER' or 'DELEGATE_TO_APPROVER' or 'DELEGATE_TO_FORM_FILLER' or 'DELEGATE_TO_ACCEPTOR' or 'DELEGATE_TO_CERTIFIED_RECIPIENT' or 'NOTARY_SIGNER' or 'ELECTRONIC_SEALER' or 'HOST' or 'IN_PERSON_SIGNER' or 'SHARE' or 'OTHER']: The roles user has on agreement assets.
     *
     * @param list<string>|null $role
     *
     * @return self
     */
    public function setRole(?array $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;
        return $this;
    }
    /**
     * True if agreement asset is hidden for the user.
     *
     * @return bool|null
     */
    public function getHidden(): ?bool
    {
        return $this->hidden;
    }
    /**
     * True if agreement asset is hidden for the user.
     *
     * @param bool|null $hidden
     *
     * @return self
     */
    public function setHidden(?bool $hidden): self
    {
        $this->initialized['hidden'] = true;
        $this->hidden = $hidden;
        return $this;
    }
    /**
     * Unique identifier of the group associated with the owner of the view of the agreement asset.
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * Unique identifier of the group associated with the owner of the view of the agreement asset.
     *
     * @param string|null $groupId
     *
     * @return self
     */
    public function setGroupId(?string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;
        return $this;
    }
    /**
     * An arbitrary value from your system, which can be specified at sending time and then later returned or queried.
     *
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }
    /**
     * An arbitrary value from your system, which can be specified at sending time and then later returned or queried.
     *
     * @param string|null $externalId
     *
     * @return self
     */
    public function setExternalId(?string $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;
        return $this;
    }
    /**
     * ['DOCUMENT' or 'FORM_FIELD_LAYER']: The sub types of the agreement asset. Only agreement assets with type LIBRARY_TEMPLATE currently have this field populated.
     *
     * @return list<mixed>|null
     */
    public function getSubTypes(): ?array
    {
        return $this->subTypes;
    }
    /**
     * ['DOCUMENT' or 'FORM_FIELD_LAYER']: The sub types of the agreement asset. Only agreement assets with type LIBRARY_TEMPLATE currently have this field populated.
     *
     * @param list<mixed>|null $subTypes
     *
     * @return self
     */
    public function setSubTypes(?array $subTypes): self
    {
        $this->initialized['subTypes'] = true;
        $this->subTypes = $subTypes;
        return $this;
    }
    /**
     * ['AGREEMENT' or 'MEGASIGN_CHILD' or 'WIDGET_INSTANCE' or 'MEGASIGN_PARENT' or 'LIBRARY_TEMPLATE' or 'WIDGET']: The kind of the agreement asset.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * ['AGREEMENT' or 'MEGASIGN_CHILD' or 'WIDGET_INSTANCE' or 'MEGASIGN_PARENT' or 'LIBRARY_TEMPLATE' or 'WIDGET']: The kind of the agreement asset.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * Unique identifier of the owner of the view of the agreement asset.
     *
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }
    /**
     * Unique identifier of the owner of the view of the agreement asset.
     *
     * @param string|null $userId
     *
     * @return self
     */
    public function setUserId(?string $userId): self
    {
        $this->initialized['userId'] = true;
        $this->userId = $userId;
        return $this;
    }
    /**
     * the parent id of a bulk send child *OR* the originating id of a web form agreement instance.
     *
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }
    /**
     * the parent id of a bulk send child *OR* the originating id of a web form agreement instance.
     *
     * @param string|null $parentId
     *
     * @return self
     */
    public function setParentId(?string $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;
        return $this;
    }
    /**
     * List of all participants for the agreement asset except where the document view owner, i.e. API caller, is a participant. Fields related to the document view owner ('userId', 'groupId', 'role', 'status', 'hidden') and their role, if any, as participant are included at the top level of AgreementAssetsResult object.
     *
     * @return list<SearchResultParticipant>|null
     */
    public function getParticipantList(): ?array
    {
        return $this->participantList;
    }
    /**
     * List of all participants for the agreement asset except where the document view owner, i.e. API caller, is a participant. Fields related to the document view owner ('userId', 'groupId', 'role', 'status', 'hidden') and their role, if any, as participant are included at the top level of AgreementAssetsResult object.
     *
     * @param list<SearchResultParticipant>|null $participantList
     *
     * @return self
     */
    public function setParticipantList(?array $participantList): self
    {
        $this->initialized['participantList'] = true;
        $this->participantList = $participantList;
        return $this;
    }
    /**
     * The date on which the agreement asset was created. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * The date on which the agreement asset was created. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @param string|null $createdDate
     *
     * @return self
     */
    public function setCreatedDate(?string $createdDate): self
    {
        $this->initialized['createdDate'] = true;
        $this->createdDate = $createdDate;
        return $this;
    }
    /**
     * The last date the agreement was modified by user action (signing, canceling, etc.). The Modified value updates with every action until the agreement reaches a terminal status (Complete/Canceled/Expired). Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @return string|null
     */
    public function getModifiedDate(): ?string
    {
        return $this->modifiedDate;
    }
    /**
     * The last date the agreement was modified by user action (signing, canceling, etc.). The Modified value updates with every action until the agreement reaches a terminal status (Complete/Canceled/Expired). Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @param string|null $modifiedDate
     *
     * @return self
     */
    public function setModifiedDate(?string $modifiedDate): self
    {
        $this->initialized['modifiedDate'] = true;
        $this->modifiedDate = $modifiedDate;
        return $this;
    }
    /**
     * Name of the agreement asset.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the agreement asset.
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
     * The unique identifier of the agreement asset.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the agreement asset.
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
     * The identifier of custom workflow which defines the routing path of an agreement.
     *
     * @return string|null
     */
    public function getWorkflowId(): ?string
    {
        return $this->workflowId;
    }
    /**
     * The identifier of custom workflow which defines the routing path of an agreement.
     *
     * @param string|null $workflowId
     *
     * @return self
     */
    public function setWorkflowId(?string $workflowId): self
    {
        $this->initialized['workflowId'] = true;
        $this->workflowId = $workflowId;
        return $this;
    }
    /**
     * The date on which the agreement asset expires and needs to be signed before it. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @return string|null
     */
    public function getExpirationDate(): ?string
    {
        return $this->expirationDate;
    }
    /**
     * The date on which the agreement asset expires and needs to be signed before it. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @param string|null $expirationDate
     *
     * @return self
     */
    public function setExpirationDate(?string $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;
        return $this;
    }
    /**
     * ['WAITING_FOR_MY_SIGNATURE' or 'WAITING_FOR_MY_APPROVAL' or 'WAITING_FOR_MY_DELEGATION' or 'WAITING_FOR_MY_ACKNOWLEDGEMENT' or 'WAITING_FOR_MY_ACCEPTANCE' or 'WAITING_FOR_MY_FORM_FILLING' or 'WAITING_FOR_MY_HOSTING' or 'WAITING_FOR_AUTHORING' or 'WAITING_FOR_PREFILL' or 'WAITING_FOR_REVISION' or 'OUT_FOR_SIGNATURE' or 'OUT_FOR_APPROVAL' or 'OUT_FOR_DELIVERY' or 'OUT_FOR_ACCEPTANCE' or 'OUT_FOR_FORM_FILLING' or 'SIGNED' or 'APPROVED' or 'FORM_FILLED' or 'DELIVERED' or 'ACCEPTED' or 'ARCHIVED' or 'CANCELLED' or 'REMOVED' or 'EXPIRED' or 'AUTHORING' or 'ACTIVE' or 'DISABLED' or 'WAITING_FOR_NOTARIZATION' or  'ACCEPT_BEFORE_NOTARIZATION' or 'PAUSED' or 'SCHEDULED' or 'OTHER']: detailed status of the agreement asset. <b>Please note that PARTIAL and DRAFT agreements are not supported for search.</b>
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * ['WAITING_FOR_MY_SIGNATURE' or 'WAITING_FOR_MY_APPROVAL' or 'WAITING_FOR_MY_DELEGATION' or 'WAITING_FOR_MY_ACKNOWLEDGEMENT' or 'WAITING_FOR_MY_ACCEPTANCE' or 'WAITING_FOR_MY_FORM_FILLING' or 'WAITING_FOR_MY_HOSTING' or 'WAITING_FOR_AUTHORING' or 'WAITING_FOR_PREFILL' or 'WAITING_FOR_REVISION' or 'OUT_FOR_SIGNATURE' or 'OUT_FOR_APPROVAL' or 'OUT_FOR_DELIVERY' or 'OUT_FOR_ACCEPTANCE' or 'OUT_FOR_FORM_FILLING' or 'SIGNED' or 'APPROVED' or 'FORM_FILLED' or 'DELIVERED' or 'ACCEPTED' or 'ARCHIVED' or 'CANCELLED' or 'REMOVED' or 'EXPIRED' or 'AUTHORING' or 'ACTIVE' or 'DISABLED' or 'WAITING_FOR_NOTARIZATION' or  'ACCEPT_BEFORE_NOTARIZATION' or 'PAUSED' or 'SCHEDULED' or 'OTHER']: detailed status of the agreement asset. <b>Please note that PARTIAL and DRAFT agreements are not supported for search.</b>
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