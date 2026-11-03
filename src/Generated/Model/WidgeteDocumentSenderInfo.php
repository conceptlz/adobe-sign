<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgeteDocumentSenderInfo
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
     *  The unique identifier of the creator of the web form.
     *
     * @var string|null
     */
    protected $participantId;
    /**
     * The date when the sender was added. This will be returned as part of GET call but is ignored if passed as part of PUT call.
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * True if the web form is hidden for the user that is calling the API. Only returned if self is true.
     *
     * @var bool|null
     */
    protected $hidden;
    /**
     * Name of the creator, if available.
     *
     * @var string|null
     */
    protected $name;
    /**
     * True if the creator of the web form is the same user that is calling the API.
     *
     * @var bool|null
     */
    protected $self;
    /**
     * Company of the creator, if available.
     *
     * @var string|null
     */
    protected $company;
    /**
     * The user ID of the sender. This will be returned as part of GET call but is ignored if passed as part of PUT call.
     *
     * @var string|null
     */
    protected $userId;
    /**
     * Email of the creator of the web form.
     *
     * @var string|null
     */
    protected $email;
    /**
     *  The unique identifier of the creator of the web form.
     *
     * @return string|null
     */
    public function getParticipantId(): ?string
    {
        return $this->participantId;
    }
    /**
     *  The unique identifier of the creator of the web form.
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
     * The date when the sender was added. This will be returned as part of GET call but is ignored if passed as part of PUT call.
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * The date when the sender was added. This will be returned as part of GET call but is ignored if passed as part of PUT call.
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
     * True if the web form is hidden for the user that is calling the API. Only returned if self is true.
     *
     * @return bool|null
     */
    public function getHidden(): ?bool
    {
        return $this->hidden;
    }
    /**
     * True if the web form is hidden for the user that is calling the API. Only returned if self is true.
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
     * Name of the creator, if available.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the creator, if available.
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
     * True if the creator of the web form is the same user that is calling the API.
     *
     * @return bool|null
     */
    public function getSelf(): ?bool
    {
        return $this->self;
    }
    /**
     * True if the creator of the web form is the same user that is calling the API.
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
     * Company of the creator, if available.
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * Company of the creator, if available.
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
     * The user ID of the sender. This will be returned as part of GET call but is ignored if passed as part of PUT call.
     *
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }
    /**
     * The user ID of the sender. This will be returned as part of GET call but is ignored if passed as part of PUT call.
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
     * Email of the creator of the web form.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email of the creator of the web form.
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
}