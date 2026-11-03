<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AccountEvent
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
    protected $accountEventId;
    /**
     * Type of account event
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
    public function getAccountEventId(): ?string
    {
        return $this->accountEventId;
    }
    /**
     * The identifier for the event.
     *
     * @param string|null $accountEventId
     *
     * @return self
     */
    public function setAccountEventId(?string $accountEventId): self
    {
        $this->initialized['accountEventId'] = true;
        $this->accountEventId = $accountEventId;
        return $this;
    }
    /**
     * Type of account event
     *
     * @return string|null
     */
    public function getEvent(): ?string
    {
        return $this->event;
    }
    /**
     * Type of account event
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