<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserCreationResponse
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
     * Status of the user
     *
     * @var string|null
     */
    protected $userStatus;
    /**
     * The unique identifier for user in REST APIs. This identifier will not be compatible with any existing SOAP APIs and is different from user key that SOAP APIs provide and consume. userid being provided here and userkey that SOAP uses are different and the two can not be interchanged with each other
     *
     * @var string|null
     */
    protected $userId;
    /**
     * Status of the user
     *
     * @return string|null
     */
    public function getUserStatus(): ?string
    {
        return $this->userStatus;
    }
    /**
     * Status of the user
     *
     * @param string|null $userStatus
     *
     * @return self
     */
    public function setUserStatus(?string $userStatus): self
    {
        $this->initialized['userStatus'] = true;
        $this->userStatus = $userStatus;
        return $this;
    }
    /**
     * The unique identifier for user in REST APIs. This identifier will not be compatible with any existing SOAP APIs and is different from user key that SOAP APIs provide and consume. userid being provided here and userkey that SOAP uses are different and the two can not be interchanged with each other
     *
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }
    /**
     * The unique identifier for user in REST APIs. This identifier will not be compatible with any existing SOAP APIs and is different from user key that SOAP APIs provide and consume. userid being provided here and userkey that SOAP uses are different and the two can not be interchanged with each other
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