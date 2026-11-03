<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetAgreement
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
     * True if agreement is hidden for the user
     *
     * @var bool|null
     */
    protected $hidden;
    /**
     * The display date for the agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $displayDate;
    /**
     * Unique identifier of the group
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * True if this is an e-sign document
     *
     * @var bool|null
     */
    protected $esign;
    /**
     * Name of the Agreement
     *
     * @var string|null
     */
    protected $name;
    /**
     * The most relevant current user set for the agreement. It is typically the next signer if the agreement is from the current user, or the sender if received from another user
     *
     * @var list<DisplayWidgetParticipantSetInfo>|null
     */
    protected $displayParticipantSetInfos;
    /**
     * A version ID which uniquely identifies the current version of the agreement
     *
     * @var string|null
     */
    protected $latestVersionId;
    /**
     * The unique identifier of the agreement.If provided in POST, it will simply be ignored
     *
     * @var string|null
     */
    protected $id;
    /**
     * The kind of agreement
     *
     * @var string|null
     */
    protected $type;
    /**
     * The parent id of a bulk send child *OR* the originating id of a web form agreement instance
     *
     * @var string|null
     */
    protected $parentId;
    /**
     * The current status of the document from the perspective of the originator
     *
     * @var string|null
     */
    protected $status;
    /**
     * True if agreement is hidden for the user
     *
     * @return bool|null
     */
    public function getHidden(): ?bool
    {
        return $this->hidden;
    }
    /**
     * True if agreement is hidden for the user
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
     * The display date for the agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getDisplayDate(): ?string
    {
        return $this->displayDate;
    }
    /**
     * The display date for the agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $displayDate
     *
     * @return self
     */
    public function setDisplayDate(?string $displayDate): self
    {
        $this->initialized['displayDate'] = true;
        $this->displayDate = $displayDate;
        return $this;
    }
    /**
     * Unique identifier of the group
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * Unique identifier of the group
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
     * True if this is an e-sign document
     *
     * @return bool|null
     */
    public function getEsign(): ?bool
    {
        return $this->esign;
    }
    /**
     * True if this is an e-sign document
     *
     * @param bool|null $esign
     *
     * @return self
     */
    public function setEsign(?bool $esign): self
    {
        $this->initialized['esign'] = true;
        $this->esign = $esign;
        return $this;
    }
    /**
     * Name of the Agreement
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the Agreement
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
     * The most relevant current user set for the agreement. It is typically the next signer if the agreement is from the current user, or the sender if received from another user
     *
     * @return list<DisplayWidgetParticipantSetInfo>|null
     */
    public function getDisplayParticipantSetInfos(): ?array
    {
        return $this->displayParticipantSetInfos;
    }
    /**
     * The most relevant current user set for the agreement. It is typically the next signer if the agreement is from the current user, or the sender if received from another user
     *
     * @param list<DisplayWidgetParticipantSetInfo>|null $displayParticipantSetInfos
     *
     * @return self
     */
    public function setDisplayParticipantSetInfos(?array $displayParticipantSetInfos): self
    {
        $this->initialized['displayParticipantSetInfos'] = true;
        $this->displayParticipantSetInfos = $displayParticipantSetInfos;
        return $this;
    }
    /**
     * A version ID which uniquely identifies the current version of the agreement
     *
     * @return string|null
     */
    public function getLatestVersionId(): ?string
    {
        return $this->latestVersionId;
    }
    /**
     * A version ID which uniquely identifies the current version of the agreement
     *
     * @param string|null $latestVersionId
     *
     * @return self
     */
    public function setLatestVersionId(?string $latestVersionId): self
    {
        $this->initialized['latestVersionId'] = true;
        $this->latestVersionId = $latestVersionId;
        return $this;
    }
    /**
     * The unique identifier of the agreement.If provided in POST, it will simply be ignored
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the agreement.If provided in POST, it will simply be ignored
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
     * The kind of agreement
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The kind of agreement
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
     * The parent id of a bulk send child *OR* the originating id of a web form agreement instance
     *
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }
    /**
     * The parent id of a bulk send child *OR* the originating id of a web form agreement instance
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
     * The current status of the document from the perspective of the originator
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The current status of the document from the perspective of the originator
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