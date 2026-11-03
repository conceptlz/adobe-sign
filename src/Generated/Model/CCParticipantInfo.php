<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class CCParticipantInfo
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
     *  The unique identifier of the CC participant of the agreement.
     *
     * @var string|null
     */
    protected $participantId;
    /**
     * True if the agreement is hidden for the user that is calling the API. Only returned if self is true.
     *
     * @var bool|null
     */
    protected $hidden;
    /**
     * Name of the CC participant, if available.
     *
     * @var string|null
     */
    protected $name;
    /**
     * True if the CC participant is the same user that is calling the API.
     *
     * @var bool|null
     */
    protected $self;
    /**
     * Company of the CC participant, if available.
     *
     * @var string|null
     */
    protected $company;
    /**
     * To assign a signing order index to a CC, this should follow the same indexing as participantSetInfo order. CC will be notified when the participant is requested and when the agreement is completed. In case of null or 0, the CC is considered a general CC, where he/she will be notified when the agreement is sent and completed. CC can be both general cc and a participant's cc, eg. [0,1]. This will be ignored as part of PUT calls.
     *
     * @var list<int>|null
     */
    protected $ccSigningOrder;
    /**
     * The extended status of the participant. If provided in POST/PUT, it will be ignored
     *
     * @var string|null
     */
    protected $extendedStatus;
    /**
     * Email of the CC participant of the agreement
     *
     * @var string|null
     */
    protected $email;
    /**
     * The status of the participant. This cannot be changed as part of the PUT call. New participants will be ignored if added with status that is not ACTIVE.
     *
     * @var string|null
     */
    protected $status;
    /**
     *  The unique identifier of the CC participant of the agreement.
     *
     * @return string|null
     */
    public function getParticipantId(): ?string
    {
        return $this->participantId;
    }
    /**
     *  The unique identifier of the CC participant of the agreement.
     *
     * @param string|null $participantId
     *
     * @return self
     */
    public function setParticipantId(?string $participantId): self
    {
        $this->initialized['participantId'] = true;
        $this->participantId = $participantId;
        return $this;
    }
    /**
     * True if the agreement is hidden for the user that is calling the API. Only returned if self is true.
     *
     * @return bool|null
     */
    public function getHidden(): ?bool
    {
        return $this->hidden;
    }
    /**
     * True if the agreement is hidden for the user that is calling the API. Only returned if self is true.
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
     * Name of the CC participant, if available.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the CC participant, if available.
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
     * True if the CC participant is the same user that is calling the API.
     *
     * @return bool|null
     */
    public function getSelf(): ?bool
    {
        return $this->self;
    }
    /**
     * True if the CC participant is the same user that is calling the API.
     *
     * @param bool|null $self
     *
     * @return self
     */
    public function setSelf(?bool $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * Company of the CC participant, if available.
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * Company of the CC participant, if available.
     *
     * @param string|null $company
     *
     * @return self
     */
    public function setCompany(?string $company): self
    {
        $this->initialized['company'] = true;
        $this->company = $company;
        return $this;
    }
    /**
     * To assign a signing order index to a CC, this should follow the same indexing as participantSetInfo order. CC will be notified when the participant is requested and when the agreement is completed. In case of null or 0, the CC is considered a general CC, where he/she will be notified when the agreement is sent and completed. CC can be both general cc and a participant's cc, eg. [0,1]. This will be ignored as part of PUT calls.
     *
     * @return list<int>|null
     */
    public function getCcSigningOrder(): ?array
    {
        return $this->ccSigningOrder;
    }
    /**
     * To assign a signing order index to a CC, this should follow the same indexing as participantSetInfo order. CC will be notified when the participant is requested and when the agreement is completed. In case of null or 0, the CC is considered a general CC, where he/she will be notified when the agreement is sent and completed. CC can be both general cc and a participant's cc, eg. [0,1]. This will be ignored as part of PUT calls.
     *
     * @param list<int>|null $ccSigningOrder
     *
     * @return self
     */
    public function setCcSigningOrder(?array $ccSigningOrder): self
    {
        $this->initialized['ccSigningOrder'] = true;
        $this->ccSigningOrder = $ccSigningOrder;
        return $this;
    }
    /**
     * The extended status of the participant. If provided in POST/PUT, it will be ignored
     *
     * @return string|null
     */
    public function getExtendedStatus(): ?string
    {
        return $this->extendedStatus;
    }
    /**
     * The extended status of the participant. If provided in POST/PUT, it will be ignored
     *
     * @param string|null $extendedStatus
     *
     * @return self
     */
    public function setExtendedStatus(?string $extendedStatus): self
    {
        $this->initialized['extendedStatus'] = true;
        $this->extendedStatus = $extendedStatus;
        return $this;
    }
    /**
     * Email of the CC participant of the agreement
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email of the CC participant of the agreement
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
    /**
     * The status of the participant. This cannot be changed as part of the PUT call. New participants will be ignored if added with status that is not ACTIVE.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The status of the participant. This cannot be changed as part of the PUT call. New participants will be ignored if added with status that is not ACTIVE.
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