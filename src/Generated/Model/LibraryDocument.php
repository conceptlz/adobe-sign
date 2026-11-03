<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryDocument
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
     * True if Library Document is hidden
     *
     * @var bool|null
     */
    protected $hidden;
    /**
     * Email address of the library document creator. It will be ignored in POST/PUT requests
     *
     * @var string|null
     */
    protected $creatorEmail;
    /**
     * Specifies who should have access to this library document. GLOBAL sharing is a restricted operation.
     *
     * @var string|null
     */
    protected $sharingMode;
    /**
     * The unique identifier of the group to which the library template belongs to. If not provided during creation, primary group of the creator will be used
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * Email address of the library document owner. It will be ignored in POST/PUT requests
     *
     * @var string|null
     */
    protected $ownerEmail;
    /**
     * A list of one or more library template types
     *
     * @var list<string>|null
     */
    protected $templateTypes;
    /**
     * Name of the library document owner.  It will be ignored in POST/PUT requests
     *
     * @var string|null
     */
    protected $ownerName;
    /**
     * The date on which the library document was last modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $modifiedDate;
    /**
     * The name of the library document
     *
     * @var string|null
     */
    protected $name;
    /**
     * List of sharees, valid only in case of USER share
     *
     * @var list<SharingGroupInfo>|null
     */
    protected $sharingGroupInfos;
    /**
     * The unique identifier that is used to refer to the library template
     *
     * @var string|null
     */
    protected $id;
    /**
     * List of sharees to which library document is shared
     *
     * @var list<SharingInfo>|null
     */
    protected $sharees;
    /**
     * Status of the library document
     *
     * @var string|null
     */
    protected $status;
    /**
     * True if Library Document is hidden
     *
     * @return bool|null
     */
    public function getHidden(): ?bool
    {
        return $this->hidden;
    }
    /**
     * True if Library Document is hidden
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
     * Email address of the library document creator. It will be ignored in POST/PUT requests
     *
     * @return string|null
     */
    public function getCreatorEmail(): ?string
    {
        return $this->creatorEmail;
    }
    /**
     * Email address of the library document creator. It will be ignored in POST/PUT requests
     *
     * @param string|null $creatorEmail
     *
     * @return self
     */
    public function setCreatorEmail(?string $creatorEmail): self
    {
        $this->initialized['creatorEmail'] = true;
        $this->creatorEmail = $creatorEmail;
        return $this;
    }
    /**
     * Specifies who should have access to this library document. GLOBAL sharing is a restricted operation.
     *
     * @return string|null
     */
    public function getSharingMode(): ?string
    {
        return $this->sharingMode;
    }
    /**
     * Specifies who should have access to this library document. GLOBAL sharing is a restricted operation.
     *
     * @param string|null $sharingMode
     *
     * @return self
     */
    public function setSharingMode(?string $sharingMode): self
    {
        $this->initialized['sharingMode'] = true;
        $this->sharingMode = $sharingMode;
        return $this;
    }
    /**
     * The unique identifier of the group to which the library template belongs to. If not provided during creation, primary group of the creator will be used
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * The unique identifier of the group to which the library template belongs to. If not provided during creation, primary group of the creator will be used
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
     * Email address of the library document owner. It will be ignored in POST/PUT requests
     *
     * @return string|null
     */
    public function getOwnerEmail(): ?string
    {
        return $this->ownerEmail;
    }
    /**
     * Email address of the library document owner. It will be ignored in POST/PUT requests
     *
     * @param string|null $ownerEmail
     *
     * @return self
     */
    public function setOwnerEmail(?string $ownerEmail): self
    {
        $this->initialized['ownerEmail'] = true;
        $this->ownerEmail = $ownerEmail;
        return $this;
    }
    /**
     * A list of one or more library template types
     *
     * @return list<string>|null
     */
    public function getTemplateTypes(): ?array
    {
        return $this->templateTypes;
    }
    /**
     * A list of one or more library template types
     *
     * @param list<string>|null $templateTypes
     *
     * @return self
     */
    public function setTemplateTypes(?array $templateTypes): self
    {
        $this->initialized['templateTypes'] = true;
        $this->templateTypes = $templateTypes;
        return $this;
    }
    /**
     * Name of the library document owner.  It will be ignored in POST/PUT requests
     *
     * @return string|null
     */
    public function getOwnerName(): ?string
    {
        return $this->ownerName;
    }
    /**
     * Name of the library document owner.  It will be ignored in POST/PUT requests
     *
     * @param string|null $ownerName
     *
     * @return self
     */
    public function setOwnerName(?string $ownerName): self
    {
        $this->initialized['ownerName'] = true;
        $this->ownerName = $ownerName;
        return $this;
    }
    /**
     * The date on which the library document was last modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getModifiedDate(): ?string
    {
        return $this->modifiedDate;
    }
    /**
     * The date on which the library document was last modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $modifiedDate
     *
     * @return self
     */
    public function setModifiedDate(?string $modifiedDate): self
    {
        $this->initialized['modifiedDate'] = true;
        $this->modifiedDate = $modifiedDate;
        return $this;
    }
    /**
     * The name of the library document
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The name of the library document
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
     * List of sharees, valid only in case of USER share
     *
     * @return list<SharingGroupInfo>|null
     */
    public function getSharingGroupInfos(): ?array
    {
        return $this->sharingGroupInfos;
    }
    /**
     * List of sharees, valid only in case of USER share
     *
     * @param list<SharingGroupInfo>|null $sharingGroupInfos
     *
     * @return self
     */
    public function setSharingGroupInfos(?array $sharingGroupInfos): self
    {
        $this->initialized['sharingGroupInfos'] = true;
        $this->sharingGroupInfos = $sharingGroupInfos;
        return $this;
    }
    /**
     * The unique identifier that is used to refer to the library template
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier that is used to refer to the library template
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
     * List of sharees to which library document is shared
     *
     * @return list<SharingInfo>|null
     */
    public function getSharees(): ?array
    {
        return $this->sharees;
    }
    /**
     * List of sharees to which library document is shared
     *
     * @param list<SharingInfo>|null $sharees
     *
     * @return self
     */
    public function setSharees(?array $sharees): self
    {
        $this->initialized['sharees'] = true;
        $this->sharees = $sharees;
        return $this;
    }
    /**
     * Status of the library document
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Status of the library document
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