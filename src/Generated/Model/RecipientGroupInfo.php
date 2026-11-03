<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class RecipientGroupInfo
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
     * The type of ownership for this recipient group.
     *
     * @var string|null
     */
    protected $ownerType;
    /**
     * The date the recipient group was created. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * The user id for the creator of the recipient group.
     *
     * @var string|null
     */
    protected $createdBy;
    /**
     * The date the recipient group was last modified. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @var string|null
     */
    protected $lastModifiedDate;
    /**
     * The user id for the user who last modified the recipient group.
     *
     * @var string|null
     */
    protected $lastModifiedBy;
    /**
     * The number of members in the recipient group.
     *
     * @var int|null
     */
    protected $memberCount;
    /**
     * The list of the members of the recipient group.
     *
     * @var list<RecipientGroupMemberInfo>|null
     */
    protected $members;
    /**
     * The display name for the recipient group.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The type of permission the caller has for accessing the recipient group.
     *
     * @var string|null
     */
    protected $permission;
    /**
     * The unique identifier for the recipient group.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The id for the owner of the recipient group.  Could be a user id, group id, or account id, depending on ownerType below.
     *
     * @var string|null
     */
    protected $ownerId;
    /**
     * The type of ownership for this recipient group.
     *
     * @return string|null
     */
    public function getOwnerType(): ?string
    {
        return $this->ownerType;
    }
    /**
     * The type of ownership for this recipient group.
     *
     * @param string|null $ownerType
     *
     * @return self
     */
    public function setOwnerType(?string $ownerType): self
    {
        $this->initialized['ownerType'] = true;
        $this->ownerType = $ownerType;
        return $this;
    }
    /**
     * The date the recipient group was created. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * The date the recipient group was created. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
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
     * The user id for the creator of the recipient group.
     *
     * @return string|null
     */
    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }
    /**
     * The user id for the creator of the recipient group.
     *
     * @param string|null $createdBy
     *
     * @return self
     */
    public function setCreatedBy(?string $createdBy): self
    {
        $this->initialized['createdBy'] = true;
        $this->createdBy = $createdBy;
        return $this;
    }
    /**
     * The date the recipient group was last modified. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @return string|null
     */
    public function getLastModifiedDate(): ?string
    {
        return $this->lastModifiedDate;
    }
    /**
     * The date the recipient group was last modified. Format would be date-time with an offset from UTC/Greenwich in the ISO-8601 calendar system, such as 2007-12-03T10:15:30+01:00.
     *
     * @param string|null $lastModifiedDate
     *
     * @return self
     */
    public function setLastModifiedDate(?string $lastModifiedDate): self
    {
        $this->initialized['lastModifiedDate'] = true;
        $this->lastModifiedDate = $lastModifiedDate;
        return $this;
    }
    /**
     * The user id for the user who last modified the recipient group.
     *
     * @return string|null
     */
    public function getLastModifiedBy(): ?string
    {
        return $this->lastModifiedBy;
    }
    /**
     * The user id for the user who last modified the recipient group.
     *
     * @param string|null $lastModifiedBy
     *
     * @return self
     */
    public function setLastModifiedBy(?string $lastModifiedBy): self
    {
        $this->initialized['lastModifiedBy'] = true;
        $this->lastModifiedBy = $lastModifiedBy;
        return $this;
    }
    /**
     * The number of members in the recipient group.
     *
     * @return int|null
     */
    public function getMemberCount(): ?int
    {
        return $this->memberCount;
    }
    /**
     * The number of members in the recipient group.
     *
     * @param int|null $memberCount
     *
     * @return self
     */
    public function setMemberCount(?int $memberCount): self
    {
        $this->initialized['memberCount'] = true;
        $this->memberCount = $memberCount;
        return $this;
    }
    /**
     * The list of the members of the recipient group.
     *
     * @return list<RecipientGroupMemberInfo>|null
     */
    public function getMembers(): ?array
    {
        return $this->members;
    }
    /**
     * The list of the members of the recipient group.
     *
     * @param list<RecipientGroupMemberInfo>|null $members
     *
     * @return self
     */
    public function setMembers(?array $members): self
    {
        $this->initialized['members'] = true;
        $this->members = $members;
        return $this;
    }
    /**
     * The display name for the recipient group.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The display name for the recipient group.
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
     * The type of permission the caller has for accessing the recipient group.
     *
     * @return string|null
     */
    public function getPermission(): ?string
    {
        return $this->permission;
    }
    /**
     * The type of permission the caller has for accessing the recipient group.
     *
     * @param string|null $permission
     *
     * @return self
     */
    public function setPermission(?string $permission): self
    {
        $this->initialized['permission'] = true;
        $this->permission = $permission;
        return $this;
    }
    /**
     * The unique identifier for the recipient group.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier for the recipient group.
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
     * The id for the owner of the recipient group.  Could be a user id, group id, or account id, depending on ownerType below.
     *
     * @return string|null
     */
    public function getOwnerId(): ?string
    {
        return $this->ownerId;
    }
    /**
     * The id for the owner of the recipient group.  Could be a user id, group id, or account id, depending on ownerType below.
     *
     * @param string|null $ownerId
     *
     * @return self
     */
    public function setOwnerId(?string $ownerId): self
    {
        $this->initialized['ownerId'] = true;
        $this->ownerId = $ownerId;
        return $this;
    }
}