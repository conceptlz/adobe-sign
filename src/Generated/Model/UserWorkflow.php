<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserWorkflow
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
     * The full name of the workflow originator. It will be ignored in POST/PUT requests
     *
     * @var string|null
     */
    protected $originatorName;
    /**
     * Identifier of scope. Currently it is applicable for scope GROUP only and the value will be groupId.
     *
     * @var string|null
     */
    protected $scopeId;
    /**
     * The date on which the workflow was created. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $created;
    /**
     * The display name of the workflow.
     *
     * @var string|null
     */
    protected $displayName;
    /**
     * Description provided for this workflow at the time of its creation
     *
     * @var string|null
     */
    protected $description;
    /**
     * Unique string for matching a document to this workflow
     *
     * @var string|null
     */
    protected $matchText;
    /**
     * The workflow scope (ACCOUNT or GROUP or OTHER)
     *
     * @var string|null
     */
    protected $scope;
    /**
     * The name of the workflow.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The date on which the workflow was modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $modified;
    /**
     * List of sharees, valid only in case of USER share
     *
     * @var list<SharingGroupInfo>|null
     */
    protected $sharingGroupInfos;
    /**
     * The unique identifier of a workflow
     *
     * @var string|null
     */
    protected $id;
    /**
     * Initial originator of the workflow
     *
     * @var string|null
     */
    protected $originatorId;
    /**
     * The workflow status (ACTIVE or DRAFT or INACTIVE or OTHER)
     *
     * @var string|null
     */
    protected $status;
    /**
     * The full name of the workflow originator. It will be ignored in POST/PUT requests
     *
     * @return string|null
     */
    public function getOriginatorName(): ?string
    {
        return $this->originatorName;
    }
    /**
     * The full name of the workflow originator. It will be ignored in POST/PUT requests
     *
     * @param string|null $originatorName
     *
     * @return self
     */
    public function setOriginatorName(?string $originatorName): self
    {
        $this->initialized['originatorName'] = true;
        $this->originatorName = $originatorName;
        return $this;
    }
    /**
     * Identifier of scope. Currently it is applicable for scope GROUP only and the value will be groupId.
     *
     * @return string|null
     */
    public function getScopeId(): ?string
    {
        return $this->scopeId;
    }
    /**
     * Identifier of scope. Currently it is applicable for scope GROUP only and the value will be groupId.
     *
     * @param string|null $scopeId
     *
     * @return self
     */
    public function setScopeId(?string $scopeId): self
    {
        $this->initialized['scopeId'] = true;
        $this->scopeId = $scopeId;
        return $this;
    }
    /**
     * The date on which the workflow was created. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }
    /**
     * The date on which the workflow was created. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $created
     *
     * @return self
     */
    public function setCreated(?string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;
        return $this;
    }
    /**
     * The display name of the workflow.
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * The display name of the workflow.
     *
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Description provided for this workflow at the time of its creation
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Description provided for this workflow at the time of its creation
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * Unique string for matching a document to this workflow
     *
     * @return string|null
     */
    public function getMatchText(): ?string
    {
        return $this->matchText;
    }
    /**
     * Unique string for matching a document to this workflow
     *
     * @param string|null $matchText
     *
     * @return self
     */
    public function setMatchText(?string $matchText): self
    {
        $this->initialized['matchText'] = true;
        $this->matchText = $matchText;
        return $this;
    }
    /**
     * The workflow scope (ACCOUNT or GROUP or OTHER)
     *
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }
    /**
     * The workflow scope (ACCOUNT or GROUP or OTHER)
     *
     * @param string|null $scope
     *
     * @return self
     */
    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * The name of the workflow.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The name of the workflow.
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
     * The date on which the workflow was modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getModified(): ?string
    {
        return $this->modified;
    }
    /**
     * The date on which the workflow was modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $modified
     *
     * @return self
     */
    public function setModified(?string $modified): self
    {
        $this->initialized['modified'] = true;
        $this->modified = $modified;
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
     * The unique identifier of a workflow
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of a workflow
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
     * Initial originator of the workflow
     *
     * @return string|null
     */
    public function getOriginatorId(): ?string
    {
        return $this->originatorId;
    }
    /**
     * Initial originator of the workflow
     *
     * @param string|null $originatorId
     *
     * @return self
     */
    public function setOriginatorId(?string $originatorId): self
    {
        $this->initialized['originatorId'] = true;
        $this->originatorId = $originatorId;
        return $this;
    }
    /**
     * The workflow status (ACTIVE or DRAFT or INACTIVE or OTHER)
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The workflow status (ACTIVE or DRAFT or INACTIVE or OTHER)
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