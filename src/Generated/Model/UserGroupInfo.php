<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserGroupInfo
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
     * @var SettingsInfo|null
     */
    protected $settings;
    /**
     * Date group was created
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * True if user is group admin.
     *
     * @var bool|null
     */
    protected $isGroupAdmin;
    /**
     * True if the group is the user's primary group.
     *
     * @var bool|null
     */
    protected $isPrimaryGroup;
    /**
     * Name of the group. This will be ignored as part of PUT call.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Unique identifier of the group
     *
     * @var string|null
     */
    protected $id;
    /**
     * Status of the group membership
     *
     * @var string|null
     */
    protected $status;
    /**
     * @return SettingsInfo|null
     */
    public function getSettings(): ?SettingsInfo
    {
        return $this->settings;
    }
    /**
     * @param SettingsInfo|null $settings
     *
     * @return self
     */
    public function setSettings(?SettingsInfo $settings): self
    {
        $this->initialized['settings'] = true;
        $this->settings = $settings;
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
     * True if user is group admin.
     *
     * @return bool|null
     */
    public function getIsGroupAdmin(): ?bool
    {
        return $this->isGroupAdmin;
    }
    /**
     * True if user is group admin.
     *
     * @param bool|null $isGroupAdmin
     *
     * @return self
     */
    public function setIsGroupAdmin(?bool $isGroupAdmin): self
    {
        $this->initialized['isGroupAdmin'] = true;
        $this->isGroupAdmin = $isGroupAdmin;
        return $this;
    }
    /**
     * True if the group is the user's primary group.
     *
     * @return bool|null
     */
    public function getIsPrimaryGroup(): ?bool
    {
        return $this->isPrimaryGroup;
    }
    /**
     * True if the group is the user's primary group.
     *
     * @param bool|null $isPrimaryGroup
     *
     * @return self
     */
    public function setIsPrimaryGroup(?bool $isPrimaryGroup): self
    {
        $this->initialized['isPrimaryGroup'] = true;
        $this->isPrimaryGroup = $isPrimaryGroup;
        return $this;
    }
    /**
     * Name of the group. This will be ignored as part of PUT call.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the group. This will be ignored as part of PUT call.
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
     * Unique identifier of the group
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Unique identifier of the group
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
     * Status of the group membership
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Status of the group membership
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