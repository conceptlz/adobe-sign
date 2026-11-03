<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FetchedWidgetInfo
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
     * List of all the participants in the web form except web form signer
     *
     * @var list<WidgetAdditionalParticipationSetInfo>|null
     */
    protected $additionalParticipantSetsInfo;
    /**
     * Email of web form creator. Only returned in GET response. Cannot be provided in POST/PUT request. If provided in POST, it will simply be ignored
     *
     * @var string|null
     */
    protected $creatorEmail;
    /**
     * The ID of the group to which the web form belongs to. If not provided during creation, primary group of the creator will be used
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * Name of web form creator. It will be ignored in POST/PUT requests
     *
     * @var string|null
     */
    protected $creatorName;
    /**
     * The locale associated with this web form - specifies the language for the signing page and emails, for example en_US or fr_FR. If none specified, defaults to the language configured for the web form creator
     *
     * @var string|null
     */
    protected $locale;
    /**
     * The unique identifier of the web form owner. It will be ignored in POST requests
     *
     * @var string|null
     */
    protected $ownerId;
    /**
     * @var VaultingInfo|null
     */
    protected $vaultingInfo;
    /**
     * @var SecurityOption|null
     */
    protected $securityOption;
    /**
     * Email of web form owner. It will be ignored in POST/PUT requests
     *
     * @var string|null
     */
    protected $ownerEmail;
    /**
     * @var WidgetParticipantSetInfo|null
     */
    protected $widgetParticipantSetInfo;
    /**
     * @var WidgetInActiveInfo|null
     */
    protected $widgetInActiveInfo;
    /**
     * A list of one or more email addresses that you want to copy on this transaction. The email addresses will each receive an email when the final agreement created through web form is signed. The email addresses will also receive a copy of the document, attached as a PDF file
     *
     * @var list<WidgetCcInfo>|null
     */
    protected $ccs;
    /**
     * Enhanced redirect information for the specific page the user will be taken to after completing the signing process. redirectOptions should not be provided in offline agreement creation. Note - A query parameter agreementStatus=declined will be automatically appended to the redirect URL when a participant declines the agreement
     *
     * @var list<RedirectOption>|null
     */
    protected $redirectOptions;
    /**
     * Date when web form was created. If provided in POST, it will simply be ignored. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * Name of web form owner. It will be ignored in POST/PUT requests
     *
     * @var string|null
     */
    protected $ownerName;
    /**
     * The date of the last event that occurred for this web form.  Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $lastEventDate;
    /**
     * The name of the web form that will be used to identify it, in emails, website and other places
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var WidgetRedirectionInfo|null
     */
    protected $completionInfo;
    /**
     * @var WidgetRedirectionInfo|null
     */
    protected $authFailureInfo;
    /**
     * A list of one or more files (or references to files) that will be used to create the web form. If more than one file is provided, they will be combined before the web form is created. Library documents are not permitted. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @var list<WidgetFileInfo>|null
     */
    protected $fileInfos;
    /**
     * A resource identifier that can be used to uniquely identify the web form in other apis. If provided in POST, it will simply be ignored
     *
     * @var string|null
     */
    protected $id;
    /**
     * The state in which the web form should land. For example in order to create a web form in DRAFT state, field should be DRAFT. The state field will never get returned in GET /widgets/{ID} and will be ignored if provided in PUT /widgets/{ID} call. The eventual status of the web form can be obtained from GET /widgets/ID
     *
     * @var string|null
     */
    protected $state;
    /**
     * Status of the Web Form. If provided in POST, it will simply be ignored
     *
     * @var string|null
     */
    protected $status;
    /**
     * List of all the participants in the web form except web form signer
     *
     * @return list<WidgetAdditionalParticipationSetInfo>|null
     */
    public function getAdditionalParticipantSetsInfo(): ?array
    {
        return $this->additionalParticipantSetsInfo;
    }
    /**
     * List of all the participants in the web form except web form signer
     *
     * @param list<WidgetAdditionalParticipationSetInfo>|null $additionalParticipantSetsInfo
     *
     * @return self
     */
    public function setAdditionalParticipantSetsInfo(?array $additionalParticipantSetsInfo): self
    {
        $this->initialized['additionalParticipantSetsInfo'] = true;
        $this->additionalParticipantSetsInfo = $additionalParticipantSetsInfo;
        return $this;
    }
    /**
     * Email of web form creator. Only returned in GET response. Cannot be provided in POST/PUT request. If provided in POST, it will simply be ignored
     *
     * @return string|null
     */
    public function getCreatorEmail(): ?string
    {
        return $this->creatorEmail;
    }
    /**
     * Email of web form creator. Only returned in GET response. Cannot be provided in POST/PUT request. If provided in POST, it will simply be ignored
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
     * The ID of the group to which the web form belongs to. If not provided during creation, primary group of the creator will be used
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * The ID of the group to which the web form belongs to. If not provided during creation, primary group of the creator will be used
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
     * Name of web form creator. It will be ignored in POST/PUT requests
     *
     * @return string|null
     */
    public function getCreatorName(): ?string
    {
        return $this->creatorName;
    }
    /**
     * Name of web form creator. It will be ignored in POST/PUT requests
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
     * The locale associated with this web form - specifies the language for the signing page and emails, for example en_US or fr_FR. If none specified, defaults to the language configured for the web form creator
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
    /**
     * The locale associated with this web form - specifies the language for the signing page and emails, for example en_US or fr_FR. If none specified, defaults to the language configured for the web form creator
     *
     * @param string|null $locale
     *
     * @return self
     */
    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;
        return $this;
    }
    /**
     * The unique identifier of the web form owner. It will be ignored in POST requests
     *
     * @return string|null
     */
    public function getOwnerId(): ?string
    {
        return $this->ownerId;
    }
    /**
     * The unique identifier of the web form owner. It will be ignored in POST requests
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
     * @return VaultingInfo|null
     */
    public function getVaultingInfo(): ?VaultingInfo
    {
        return $this->vaultingInfo;
    }
    /**
     * @param VaultingInfo|null $vaultingInfo
     *
     * @return self
     */
    public function setVaultingInfo(?VaultingInfo $vaultingInfo): self
    {
        $this->initialized['vaultingInfo'] = true;
        $this->vaultingInfo = $vaultingInfo;
        return $this;
    }
    /**
     * @return SecurityOption|null
     */
    public function getSecurityOption(): ?SecurityOption
    {
        return $this->securityOption;
    }
    /**
     * @param SecurityOption|null $securityOption
     *
     * @return self
     */
    public function setSecurityOption(?SecurityOption $securityOption): self
    {
        $this->initialized['securityOption'] = true;
        $this->securityOption = $securityOption;
        return $this;
    }
    /**
     * Email of web form owner. It will be ignored in POST/PUT requests
     *
     * @return string|null
     */
    public function getOwnerEmail(): ?string
    {
        return $this->ownerEmail;
    }
    /**
     * Email of web form owner. It will be ignored in POST/PUT requests
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
     * @return WidgetParticipantSetInfo|null
     */
    public function getWidgetParticipantSetInfo(): ?WidgetParticipantSetInfo
    {
        return $this->widgetParticipantSetInfo;
    }
    /**
     * @param WidgetParticipantSetInfo|null $widgetParticipantSetInfo
     *
     * @return self
     */
    public function setWidgetParticipantSetInfo(?WidgetParticipantSetInfo $widgetParticipantSetInfo): self
    {
        $this->initialized['widgetParticipantSetInfo'] = true;
        $this->widgetParticipantSetInfo = $widgetParticipantSetInfo;
        return $this;
    }
    /**
     * @return WidgetInActiveInfo|null
     */
    public function getWidgetInActiveInfo(): ?WidgetInActiveInfo
    {
        return $this->widgetInActiveInfo;
    }
    /**
     * @param WidgetInActiveInfo|null $widgetInActiveInfo
     *
     * @return self
     */
    public function setWidgetInActiveInfo(?WidgetInActiveInfo $widgetInActiveInfo): self
    {
        $this->initialized['widgetInActiveInfo'] = true;
        $this->widgetInActiveInfo = $widgetInActiveInfo;
        return $this;
    }
    /**
     * A list of one or more email addresses that you want to copy on this transaction. The email addresses will each receive an email when the final agreement created through web form is signed. The email addresses will also receive a copy of the document, attached as a PDF file
     *
     * @return list<WidgetCcInfo>|null
     */
    public function getCcs(): ?array
    {
        return $this->ccs;
    }
    /**
     * A list of one or more email addresses that you want to copy on this transaction. The email addresses will each receive an email when the final agreement created through web form is signed. The email addresses will also receive a copy of the document, attached as a PDF file
     *
     * @param list<WidgetCcInfo>|null $ccs
     *
     * @return self
     */
    public function setCcs(?array $ccs): self
    {
        $this->initialized['ccs'] = true;
        $this->ccs = $ccs;
        return $this;
    }
    /**
     * Enhanced redirect information for the specific page the user will be taken to after completing the signing process. redirectOptions should not be provided in offline agreement creation. Note - A query parameter agreementStatus=declined will be automatically appended to the redirect URL when a participant declines the agreement
     *
     * @return list<RedirectOption>|null
     */
    public function getRedirectOptions(): ?array
    {
        return $this->redirectOptions;
    }
    /**
     * Enhanced redirect information for the specific page the user will be taken to after completing the signing process. redirectOptions should not be provided in offline agreement creation. Note - A query parameter agreementStatus=declined will be automatically appended to the redirect URL when a participant declines the agreement
     *
     * @param list<RedirectOption>|null $redirectOptions
     *
     * @return self
     */
    public function setRedirectOptions(?array $redirectOptions): self
    {
        $this->initialized['redirectOptions'] = true;
        $this->redirectOptions = $redirectOptions;
        return $this;
    }
    /**
     * Date when web form was created. If provided in POST, it will simply be ignored. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * Date when web form was created. If provided in POST, it will simply be ignored. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * Name of web form owner. It will be ignored in POST/PUT requests
     *
     * @return string|null
     */
    public function getOwnerName(): ?string
    {
        return $this->ownerName;
    }
    /**
     * Name of web form owner. It will be ignored in POST/PUT requests
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
     * The date of the last event that occurred for this web form.  Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getLastEventDate(): ?string
    {
        return $this->lastEventDate;
    }
    /**
     * The date of the last event that occurred for this web form.  Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * The name of the web form that will be used to identify it, in emails, website and other places
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The name of the web form that will be used to identify it, in emails, website and other places
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
     * @return WidgetRedirectionInfo|null
     */
    public function getCompletionInfo(): ?WidgetRedirectionInfo
    {
        return $this->completionInfo;
    }
    /**
     * @param WidgetRedirectionInfo|null $completionInfo
     *
     * @return self
     */
    public function setCompletionInfo(?WidgetRedirectionInfo $completionInfo): self
    {
        $this->initialized['completionInfo'] = true;
        $this->completionInfo = $completionInfo;
        return $this;
    }
    /**
     * @return WidgetRedirectionInfo|null
     */
    public function getAuthFailureInfo(): ?WidgetRedirectionInfo
    {
        return $this->authFailureInfo;
    }
    /**
     * @param WidgetRedirectionInfo|null $authFailureInfo
     *
     * @return self
     */
    public function setAuthFailureInfo(?WidgetRedirectionInfo $authFailureInfo): self
    {
        $this->initialized['authFailureInfo'] = true;
        $this->authFailureInfo = $authFailureInfo;
        return $this;
    }
    /**
     * A list of one or more files (or references to files) that will be used to create the web form. If more than one file is provided, they will be combined before the web form is created. Library documents are not permitted. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @return list<WidgetFileInfo>|null
     */
    public function getFileInfos(): ?array
    {
        return $this->fileInfos;
    }
    /**
     * A list of one or more files (or references to files) that will be used to create the web form. If more than one file is provided, they will be combined before the web form is created. Library documents are not permitted. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @param list<WidgetFileInfo>|null $fileInfos
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
     * A resource identifier that can be used to uniquely identify the web form in other apis. If provided in POST, it will simply be ignored
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * A resource identifier that can be used to uniquely identify the web form in other apis. If provided in POST, it will simply be ignored
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
     * The state in which the web form should land. For example in order to create a web form in DRAFT state, field should be DRAFT. The state field will never get returned in GET /widgets/{ID} and will be ignored if provided in PUT /widgets/{ID} call. The eventual status of the web form can be obtained from GET /widgets/ID
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * The state in which the web form should land. For example in order to create a web form in DRAFT state, field should be DRAFT. The state field will never get returned in GET /widgets/{ID} and will be ignored if provided in PUT /widgets/{ID} call. The eventual status of the web form can be obtained from GET /widgets/ID
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
     * Status of the Web Form. If provided in POST, it will simply be ignored
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Status of the Web Form. If provided in POST, it will simply be ignored
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