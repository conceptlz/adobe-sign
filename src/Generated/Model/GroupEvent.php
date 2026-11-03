<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class GroupEvent
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
     * The date of the group event. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $date;
    /**
     * Identifier of the account. This is a server generated attributed and can not be provided in POST/PUT calls.
     *
     * @var string|null
     */
    protected $accountId;
    /**
     * Account admin user ID
     *
     * @var string|null
     */
    protected $adminUserId;
    /**
     * The identifier for the event.
     *
     * @var string|null
     */
    protected $groupEventId;
    /**
     * Unique identifier of the group
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * Type of group event
     *
     * @var string|null
     */
    protected $event;
    /**
     * The user ID of the signing participant.
     *
     * @var string|null
     */
    protected $userId;
    /**
     * The date of the group event. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }
    /**
     * The date of the group event. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * Identifier of the account. This is a server generated attributed and can not be provided in POST/PUT calls.
     *
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }
    /**
     * Identifier of the account. This is a server generated attributed and can not be provided in POST/PUT calls. 
     *
     * @param string|null $accountId
     *
     * @return self
     */
    public function setAccountId(?string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;
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
     * The identifier for the event.
     *
     * @return string|null
     */
    public function getGroupEventId(): ?string
    {
        return $this->groupEventId;
    }
    /**
     * The identifier for the event.
     *
     * @param string|null $groupEventId
     *
     * @return self
     */
    public function setGroupEventId(?string $groupEventId): self
    {
        $this->initialized['groupEventId'] = true;
        $this->groupEventId = $groupEventId;
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
     * Type of group event
     *
     * @return string|null
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }
    /**
     * Type of group event
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
}