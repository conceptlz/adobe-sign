<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserEvent
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
     * The date of the user event. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $date;
    /**
     * Account admin user ID
     *
     * @var string|null
     */
    protected $adminUserId;
    /**
     * The identifier for the group where user is moved from.
     *
     * @var string|null
     */
    protected $fromGroupId;
    /**
     * The identifier for the group where user is moved to.
     *
     * @var string|null
     */
    protected $toGroupId;
    /**
     * Type of user event
     *
     * @var string|null
     */
    protected $event;
    /**
     * The identifier for the event.
     *
     * @var string|null
     */
    protected $userEventId;
    /**
     * The user ID of the signing participant.
     *
     * @var string|null
     */
    protected $userId;
    /**
     * The identifier for participation.
     *
     * @var string|null
     */
    protected $participationId;
    /**
     * The date of the user event. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }
    /**
     * The date of the user event. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $date
     *
     * @return self
     */
    public function setDate(?string $date): self
    {
        $this->initialized['date'] = true;
        $this->date = $date;
        return $this;
    }
    /**
     * Account admin user ID
     *
     * @return string|null
     */
    public function getAdminUserId(): ?string
    {
        return $this->adminUserId;
    }
    /**
     * Account admin user ID
     *
     * @param string|null $adminUserId
     *
     * @return self
     */
    public function setAdminUserId(?string $adminUserId): self
    {
        $this->initialized['adminUserId'] = true;
        $this->adminUserId = $adminUserId;
        return $this;
    }
    /**
     * The identifier for the group where user is moved from.
     *
     * @return string|null
     */
    public function getFromGroupId(): ?string
    {
        return $this->fromGroupId;
    }
    /**
     * The identifier for the group where user is moved from.
     *
     * @param string|null $fromGroupId
     *
     * @return self
     */
    public function setFromGroupId(?string $fromGroupId): self
    {
        $this->initialized['fromGroupId'] = true;
        $this->fromGroupId = $fromGroupId;
        return $this;
    }
    /**
     * The identifier for the group where user is moved to.
     *
     * @return string|null
     */
    public function getToGroupId(): ?string
    {
        return $this->toGroupId;
    }
    /**
     * The identifier for the group where user is moved to.
     *
     * @param string|null $toGroupId
     *
     * @return self
     */
    public function setToGroupId(?string $toGroupId): self
    {
        $this->initialized['toGroupId'] = true;
        $this->toGroupId = $toGroupId;
        return $this;
    }
    /**
     * Type of user event
     *
     * @return string|null
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }
    /**
     * Type of user event
     *
     * @param string|null $event
     *
     * @return self
     */
    public function setEvent(?string $event): self
    {
        $this->initialized['event'] = true;
        $this->event = $event;
        return $this;
    }
    /**
     * The identifier for the event.
     *
     * @return string|null
     */
    public function getUserEventId(): ?string
    {
        return $this->userEventId;
    }
    /**
     * The identifier for the event.
     *
     * @param string|null $userEventId
     *
     * @return self
     */
    public function setUserEventId(?string $userEventId): self
    {
        $this->initialized['userEventId'] = true;
        $this->userEventId = $userEventId;
        return $this;
    }
    /**
     * The user ID of the signing participant.
     *
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }
    /**
     * The user ID of the signing participant.
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
     * The identifier for participation.
     *
     * @return string|null
     */
    public function getParticipationId(): ?string
    {
        return $this->participationId;
    }
    /**
     * The identifier for participation.
     *
     * @param string|null $participationId
     *
     * @return self
     */
    public function setParticipationId(?string $participationId): self
    {
        $this->initialized['participationId'] = true;
        $this->participationId = $participationId;
        return $this;
    }
}