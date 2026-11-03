<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryDocumentInfoV6
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
     * Name of the library document creator.  It will be ignored in POST/PUT requests
     *
     * @var string|null
     */
    protected $creatorName;
    /**
     * The unique identifier of the library document owner. It will be ignored in POST requests
     *
     * @var string|null
     */
    protected $ownerId;
    /**
     * Email address of the library document owner. It will be ignored in POST/PUT requests
     *
     * @var string|null
     */
    protected $ownerEmail;
    /**
     * Date when library document was created. It will be ignored in POST/PUT requests. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * Is document retention applied for this resource.  If provided in POST or PUT, it will simply be ignored.
     *
     * @var bool|null
     */
    protected $isDocumentRetentionApplied;
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
     * The date of the last event that occurred for this library document
     *
     * @var string|null
     */
    protected $lastEventDate;
    /**
     * Date when library document was last modified. It will be ignored in POST/PUT requests. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $modifiedDate;
    /**
     * The name of the library template that will be used to identify it, in emails and on the website
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
     * A list of one or more files (or references to files) that will be used to create the template. If more than one file is provided, they will be combined into one PDF. Note: Only a single parameter in every FileInfo object must be specified
     *
     * @var list<FileInfoLibraryDocument>|null
     */
    protected $fileInfos;
    /**
     * The unique identifier that is used to refer to the library template. It will be ignored in POST requests
     *
     * @var string|null
     */
    protected $id;
    /**
     * State of the library document.
     *
     * @var string|null
     */
    protected $state;
    /**
     * Status of the library document
     *
     * @var string|null
     */
    protected $status;
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
     * Name of the library document creator.  It will be ignored in POST/PUT requests
     *
     * @return string|null
     */
    public function getCreatorName(): ?string
    {
        return $this->creatorName;
    }
    /**
     * Name of the library document creator.  It will be ignored in POST/PUT requests
     *
     * @param string|null $creatorName
     *
     * @return self
     */
    public function setCreatorName(?string $creatorName): self
    {
        $this->initialized['creatorName'] = true;
        $this->creatorName = $creatorName;
        return $this;
    }
    /**
     * The unique identifier of the library document owner. It will be ignored in POST requests
     *
     * @return string|null
     */
    public function getOwnerId(): ?string
    {
        return $this->ownerId;
    }
    /**
     * The unique identifier of the library document owner. It will be ignored in POST requests
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
     * Date when library document was created. It will be ignored in POST/PUT requests. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * Date when library document was created. It will be ignored in POST/PUT requests. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * Is document retention applied for this resource.  If provided in POST or PUT, it will simply be ignored.
     *
     * @return bool|null
     */
    public function getIsDocumentRetentionApplied(): ?bool
    {
        return $this->isDocumentRetentionApplied;
    }
    /**
     * Is document retention applied for this resource.  If provided in POST or PUT, it will simply be ignored.
     *
     * @param bool|null $isDocumentRetentionApplied
     *
     * @return self
     */
    public function setIsDocumentRetentionApplied(?bool $isDocumentRetentionApplied): self
    {
        $this->initialized['isDocumentRetentionApplied'] = true;
        $this->isDocumentRetentionApplied = $isDocumentRetentionApplied;
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
     * The date of the last event that occurred for this library document
     *
     * @return string|null
     */
    public function getLastEventDate(): ?string
    {
        return $this->lastEventDate;
    }
    /**
     * The date of the last event that occurred for this library document
     *
     * @param string|null $lastEventDate
     *
     * @return self
     */
    public function setLastEventDate(?string $lastEventDate): self
    {
        $this->initialized['lastEventDate'] = true;
        $this->lastEventDate = $lastEventDate;
        return $this;
    }
    /**
     * Date when library document was last modified. It will be ignored in POST/PUT requests. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getModifiedDate(): ?string
    {
        return $this->modifiedDate;
    }
    /**
     * Date when library document was last modified. It will be ignored in POST/PUT requests. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * The name of the library template that will be used to identify it, in emails and on the website
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The name of the library template that will be used to identify it, in emails and on the website
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
     * A list of one or more files (or references to files) that will be used to create the template. If more than one file is provided, they will be combined into one PDF. Note: Only a single parameter in every FileInfo object must be specified
     *
     * @return list<FileInfoLibraryDocument>|null
     */
    public function getFileInfos(): ?array
    {
        return $this->fileInfos;
    }
    /**
     * A list of one or more files (or references to files) that will be used to create the template. If more than one file is provided, they will be combined into one PDF. Note: Only a single parameter in every FileInfo object must be specified
     *
     * @param list<FileInfoLibraryDocument>|null $fileInfos
     *
     * @return self
     */
    public function setFileInfos(?array $fileInfos): self
    {
        $this->initialized['fileInfos'] = true;
        $this->fileInfos = $fileInfos;
        return $this;
    }
    /**
     * The unique identifier that is used to refer to the library template. It will be ignored in POST requests
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier that is used to refer to the library template. It will be ignored in POST requests
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
     * State of the library document.
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * State of the library document.
     *
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
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