<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class GroupInfo
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
     * Is the default group for the account
     *
     * @var bool|null
     */
    protected $isDefaultGroup;
    /**
     * Name of the group
     *
     * @var string|null
     */
    protected $groupName;
    /**
     * Date group was created
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * Unique identifier of the group
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * Is the default group for the account
     *
     * @return bool|null
     */
    public function getIsDefaultGroup(): ?bool
    {
        return $this->isDefaultGroup;
    }
    /**
     * Is the default group for the account
     *
     * @param bool|null $isDefaultGroup
     *
     * @return self
     */
    public function setIsDefaultGroup(?bool $isDefaultGroup): self
    {
        $this->initialized['isDefaultGroup'] = true;
        $this->isDefaultGroup = $isDefaultGroup;
        return $this;
    }
    /**
     * Name of the group
     *
     * @return string|null
     */
    public function getGroupName(): ?string
    {
        return $this->groupName;
    }
    /**
     * Name of the group
     *
     * @param string|null $groupName
     *
     * @return self
     */
    public function setGroupName(?string $groupName): self
    {
        $this->initialized['groupName'] = true;
        $this->groupName = $groupName;
        return $this;
    }
    /**
     * Date group was created
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * Date group was created
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
}