<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WorkflowDescription
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
     * Identifier of scope. Currently it is applicable for scope GROUP only and the value will be groupId.
     *
     * @var string|null
     */
    protected $scopeId;
    /**
     * An id of the form field layer to be applied to the agreement
     *
     * @var string|null
     */
    protected $formFieldLayerId;
    /**
     * @var WorkflowDefaultParams|null
     */
    protected $messageInfo;
    /**
     * The day on which the workflow was created
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
     * Information about customFieldInfos in DocumentCreationInfo input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @var list<MergeFieldInfoDescription>|null
     */
    protected $mergeFieldsInfo;
    /**
     * @var WorkflowDefaultParams|null
     */
    protected $agreementNameInfo;
    /**
     * @var PasswordFieldInfoDescription|null
     */
    protected $passwordInfo;
    /**
     * @var WorkflowDefaultParams|null
     */
    protected $authoringInfo;
    /**
     * Information about RecepientsInfo input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @var list<RecipientsListInfoDescription>|null
     */
    protected $recipientsListInfo;
    /**
     * The workflow scope (ACCOUNT or GROUP or OTHER)
     *
     * @var string|null
     */
    protected $scope;
    /**
     * @var ExpirationFieldInfoDescription|null
     */
    protected $expirationInfo;
    /**
     * The name of the workflow.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The day on which the workflow was last modified
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
     * Information about FileInfo input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @var list<FileInfosDescription>|null
     */
    protected $fileInfos;
    /**
     * Initial originator of the workflow
     *
     * @var string|null
     */
    protected $originatorId;
    /**
     * @var LocaleFieldInfoDescription|null
     */
    protected $localeInfo;
    /**
     * Information about CCList input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @var list<CCsListInfoDescription>|null
     */
    protected $ccsListInfo;
    /**
     * The workflow status (ACTIVE or DRAFT or INACTIVE or OTHER)
     *
     * @var string|null
     */
    protected $status;
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
     * An id of the form field layer to be applied to the agreement
     *
     * @return string|null
     */
    public function getFormFieldLayerId(): ?string
    {
        return $this->formFieldLayerId;
    }
    /**
     * An id of the form field layer to be applied to the agreement
     *
     * @param string|null $formFieldLayerId
     *
     * @return self
     */
    public function setFormFieldLayerId(?string $formFieldLayerId): self
    {
        $this->initialized['formFieldLayerId'] = true;
        $this->formFieldLayerId = $formFieldLayerId;
        return $this;
    }
    /**
     * @return WorkflowDefaultParams|null
     */
    public function getMessageInfo(): ?WorkflowDefaultParams
    {
        return $this->messageInfo;
    }
    /**
     * @param WorkflowDefaultParams|null $messageInfo
     *
     * @return self
     */
    public function setMessageInfo(?WorkflowDefaultParams $messageInfo): self
    {
        $this->initialized['messageInfo'] = true;
        $this->messageInfo = $messageInfo;
        return $this;
    }
    /**
     * The day on which the workflow was created
     *
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }
    /**
     * The day on which the workflow was created
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
     * Information about customFieldInfos in DocumentCreationInfo input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @return list<MergeFieldInfoDescription>|null
     */
    public function getMergeFieldsInfo(): ?array
    {
        return $this->mergeFieldsInfo;
    }
    /**
     * Information about customFieldInfos in DocumentCreationInfo input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @param list<MergeFieldInfoDescription>|null $mergeFieldsInfo
     *
     * @return self
     */
    public function setMergeFieldsInfo(?array $mergeFieldsInfo): self
    {
        $this->initialized['mergeFieldsInfo'] = true;
        $this->mergeFieldsInfo = $mergeFieldsInfo;
        return $this;
    }
    /**
     * @return WorkflowDefaultParams|null
     */
    public function getAgreementNameInfo(): ?WorkflowDefaultParams
    {
        return $this->agreementNameInfo;
    }
    /**
     * @param WorkflowDefaultParams|null $agreementNameInfo
     *
     * @return self
     */
    public function setAgreementNameInfo(?WorkflowDefaultParams $agreementNameInfo): self
    {
        $this->initialized['agreementNameInfo'] = true;
        $this->agreementNameInfo = $agreementNameInfo;
        return $this;
    }
    /**
     * @return PasswordFieldInfoDescription|null
     */
    public function getPasswordInfo(): ?PasswordFieldInfoDescription
    {
        return $this->passwordInfo;
    }
    /**
     * @param PasswordFieldInfoDescription|null $passwordInfo
     *
     * @return self
     */
    public function setPasswordInfo(?PasswordFieldInfoDescription $passwordInfo): self
    {
        $this->initialized['passwordInfo'] = true;
        $this->passwordInfo = $passwordInfo;
        return $this;
    }
    /**
     * @return WorkflowDefaultParams|null
     */
    public function getAuthoringInfo(): ?WorkflowDefaultParams
    {
        return $this->authoringInfo;
    }
    /**
     * @param WorkflowDefaultParams|null $authoringInfo
     *
     * @return self
     */
    public function setAuthoringInfo(?WorkflowDefaultParams $authoringInfo): self
    {
        $this->initialized['authoringInfo'] = true;
        $this->authoringInfo = $authoringInfo;
        return $this;
    }
    /**
     * Information about RecepientsInfo input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @return list<RecipientsListInfoDescription>|null
     */
    public function getRecipientsListInfo(): ?array
    {
        return $this->recipientsListInfo;
    }
    /**
     * Information about RecepientsInfo input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @param list<RecipientsListInfoDescription>|null $recipientsListInfo
     *
     * @return self
     */
    public function setRecipientsListInfo(?array $recipientsListInfo): self
    {
        $this->initialized['recipientsListInfo'] = true;
        $this->recipientsListInfo = $recipientsListInfo;
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
     * @return ExpirationFieldInfoDescription|null
     */
    public function getExpirationInfo(): ?ExpirationFieldInfoDescription
    {
        return $this->expirationInfo;
    }
    /**
     * @param ExpirationFieldInfoDescription|null $expirationInfo
     *
     * @return self
     */
    public function setExpirationInfo(?ExpirationFieldInfoDescription $expirationInfo): self
    {
        $this->initialized['expirationInfo'] = true;
        $this->expirationInfo = $expirationInfo;
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
     * The day on which the workflow was last modified
     *
     * @return string|null
     */
    public function getModified(): ?string
    {
        return $this->modified;
    }
    /**
     * The day on which the workflow was last modified
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
     * Information about FileInfo input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @return list<FileInfosDescription>|null
     */
    public function getFileInfos(): ?array
    {
        return $this->fileInfos;
    }
    /**
     * Information about FileInfo input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @param list<FileInfosDescription>|null $fileInfos
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
     * @return LocaleFieldInfoDescription|null
     */
    public function getLocaleInfo(): ?LocaleFieldInfoDescription
    {
        return $this->localeInfo;
    }
    /**
     * @param LocaleFieldInfoDescription|null $localeInfo
     *
     * @return self
     */
    public function setLocaleInfo(?LocaleFieldInfoDescription $localeInfo): self
    {
        $this->initialized['localeInfo'] = true;
        $this->localeInfo = $localeInfo;
        return $this;
    }
    /**
     * Information about CCList input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @return list<CCsListInfoDescription>|null
     */
    public function getCcsListInfo(): ?array
    {
        return $this->ccsListInfo;
    }
    /**
     * Information about CCList input field in the agreement creation request when using the API which creates an agreement in a workflow
     *
     * @param list<CCsListInfoDescription>|null $ccsListInfo
     *
     * @return self
     */
    public function setCcsListInfo(?array $ccsListInfo): self
    {
        $this->initialized['ccsListInfo'] = true;
        $this->ccsListInfo = $ccsListInfo;
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