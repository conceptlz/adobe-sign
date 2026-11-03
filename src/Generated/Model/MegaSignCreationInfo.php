<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignCreationInfo
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
     * The unique identifier of the group to which the bulk send will belong to when it is created. If it is not provided during agreement creation the primary group of the creator will be used
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * @var ChildAgreementsInfo|null
     */
    protected $childAgreementsInfo;
    /**
     * The locale associated with this agreement - specifies the language for the signing page and emails, for example en_US or fr_FR. If none specified, defaults to the language configured for the agreement sender
     *
     * @var string|null
     */
    protected $locale;
    /**
     * @var VaultingInfo|null
     */
    protected $vaultingInfo;
    /**
     * @var MegaSignSecurityOption|null
     */
    protected $securityOption;
    /**
     * @var PostSignOption|null
     */
    protected $postSignOption;
    /**
     * Projected download size (MB) of the PDF document associated with each child agreement
     *
     * @var float|null
     */
    protected $singlePdfDownloadSize;
    /**
     * A list of one or more CCs that will be copied in the bulk send transaction. The CCs will each receive an email at the beginning of the transaction and also when the final document is signed. The email addresses will also receive a copy of the document, attached as a PDF file
     *
     * @var list<MegaSignCcInfo>|null
     */
    protected $ccs;
    /**
     * Is document retention applied for this resource.  If provided in POST or PUT, it will simply be ignored.
     *
     * @var bool|null
     */
    protected $isDocumentRetentionApplied;
    /**
     * The date of the last event that occurred for this bulk send.  Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $lastEventDate;
    /**
     * Email of agreement sender. Only provided in GET. Can not be provided in POST/PUT request. If provided in POST/PUT, it will be ignored
     *
     * @var string|null
     */
    protected $senderEmail;
    /**
     * The total number of bulk send children associated with the bulk send parent. If provided in POST, it will be ignored. If modified in PUT, it will throw error MODIFYING_IMMUTABLE_FIELDS
     *
     * @var int|null
     */
    protected $numChildren;
    /**
     * The unique identifier of bulk send
     *
     * @var string|null
     */
    protected $id;
    /**
     * State of the bulk send
     *
     * @var string|null
     */
    protected $state;
    /**
     * Integer which specifies the delay in hours before sending the first reminder.<br>This is an optional field. The minimum value allowed is 1 hour and the maximum value can’t be more than the difference of agreement creation and expiry time of the agreement in hours.<br>If this is not specified but the reminder frequency is specified, then the first reminder will be sent based on frequency.<br>i.e. if the reminder is created with frequency specified as daily, the firstReminderDelay will be 24 hours. Cannot be updated in a PUT
     *
     * @var int|null
     */
    protected $firstReminderDelay;
    /**
     * Specifies the type of signature you would like to request - written or e-signature. The possible values are <br> ESIGN : Agreement needs to be signed electronically <br>,
     * WRITTEN : Agreement will be signed using handwritten signature and signed document will be uploaded into the system
     *
     * @var string|null
     */
    protected $signatureType;
    /**
     * @var ExternalId|null
     */
    protected $externalId;
    /**
     * An optional message to the participants, describing what is being sent or why their signature is required
     *
     * @var string|null
     */
    protected $message;
    /**
     * Optional parameter that sets how often you want to send reminders to the participants. If it is not specified, the default frequency set for the account will be used
     *
     * @var string|null
     */
    protected $reminderFrequency;
    /**
     * Enhanced redirect information for the specific page the user will be taken to after completing the signing process. redirectOptions should not be provided in offline agreement creation. Note - A query parameter agreementStatus=declined will be automatically appended to the redirect URL when a participant declines the agreement
     *
     * @var list<RedirectOption>|null
     */
    protected $redirectOptions;
    /**
     * Date when bulk send was created. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * Information about the bulk send participants set.
     *
     * @var list<BulkParticipantSetInfo>|null
     */
    protected $participantSetsInfo;
    /**
     * Time after which Agreement expires and needs to be signed before it. Format should be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time. Should not be provided in offline agreement creation. Agreements in DRAFT and AUTHORING status do not expire. The expiration count down starts when agreement is sent.
     *
     * @var string|null
     */
    protected $expirationTime;
    /**
     * The name of the agreement that will be used to identify it, in emails, website and other places
     *
     * @var string|null
     */
    protected $name;
    /**
     * A list of one or more files (or references to files) that will be sent out for signature. If more than one file is provided, they will be combined into one PDF before being sent out. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @var list<FileInfo>|null
     */
    protected $fileInfos;
    /**
     * Status of the bulk send
     *
     * @var string|null
     */
    protected $status;
    /**
     * The unique identifier of the group to which the bulk send will belong to when it is created. If it is not provided during agreement creation the primary group of the creator will be used
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * The unique identifier of the group to which the bulk send will belong to when it is created. If it is not provided during agreement creation the primary group of the creator will be used
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
     * @return ChildAgreementsInfo|null
     */
    public function getChildAgreementsInfo(): ?ChildAgreementsInfo
    {
        return $this->childAgreementsInfo;
    }
    /**
     * @param ChildAgreementsInfo|null $childAgreementsInfo
     *
     * @return self
     */
    public function setChildAgreementsInfo(?ChildAgreementsInfo $childAgreementsInfo): self
    {
        $this->initialized['childAgreementsInfo'] = true;
        $this->childAgreementsInfo = $childAgreementsInfo;
        return $this;
    }
    /**
     * The locale associated with this agreement - specifies the language for the signing page and emails, for example en_US or fr_FR. If none specified, defaults to the language configured for the agreement sender
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
    /**
     * The locale associated with this agreement - specifies the language for the signing page and emails, for example en_US or fr_FR. If none specified, defaults to the language configured for the agreement sender
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
     * @return MegaSignSecurityOption|null
     */
    public function getSecurityOption(): ?MegaSignSecurityOption
    {
        return $this->securityOption;
    }
    /**
     * @param MegaSignSecurityOption|null $securityOption
     *
     * @return self
     */
    public function setSecurityOption(?MegaSignSecurityOption $securityOption): self
    {
        $this->initialized['securityOption'] = true;
        $this->securityOption = $securityOption;
        return $this;
    }
    /**
     * @return PostSignOption|null
     */
    public function getPostSignOption(): ?PostSignOption
    {
        return $this->postSignOption;
    }
    /**
     * @param PostSignOption|null $postSignOption
     *
     * @return self
     */
    public function setPostSignOption(?PostSignOption $postSignOption): self
    {
        $this->initialized['postSignOption'] = true;
        $this->postSignOption = $postSignOption;
        return $this;
    }
    /**
     * Projected download size (MB) of the PDF document associated with each child agreement
     *
     * @return float|null
     */
    public function getSinglePdfDownloadSize(): ?float
    {
        return $this->singlePdfDownloadSize;
    }
    /**
     * Projected download size (MB) of the PDF document associated with each child agreement
     *
     * @param float|null $singlePdfDownloadSize
     *
     * @return self
     */
    public function setSinglePdfDownloadSize(?float $singlePdfDownloadSize): self
    {
        $this->initialized['singlePdfDownloadSize'] = true;
        $this->singlePdfDownloadSize = $singlePdfDownloadSize;
        return $this;
    }
    /**
     * A list of one or more CCs that will be copied in the bulk send transaction. The CCs will each receive an email at the beginning of the transaction and also when the final document is signed. The email addresses will also receive a copy of the document, attached as a PDF file
     *
     * @return list<MegaSignCcInfo>|null
     */
    public function getCcs(): ?array
    {
        return $this->ccs;
    }
    /**
     * A list of one or more CCs that will be copied in the bulk send transaction. The CCs will each receive an email at the beginning of the transaction and also when the final document is signed. The email addresses will also receive a copy of the document, attached as a PDF file 
     *
     * @param list<MegaSignCcInfo>|null $ccs
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
     * The date of the last event that occurred for this bulk send.  Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getLastEventDate(): ?string
    {
        return $this->lastEventDate;
    }
    /**
     * The date of the last event that occurred for this bulk send.  Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * Email of agreement sender. Only provided in GET. Can not be provided in POST/PUT request. If provided in POST/PUT, it will be ignored
     *
     * @return string|null
     */
    public function getSenderEmail(): ?string
    {
        return $this->senderEmail;
    }
    /**
     * Email of agreement sender. Only provided in GET. Can not be provided in POST/PUT request. If provided in POST/PUT, it will be ignored
     *
     * @param string|null $senderEmail
     *
     * @return self
     */
    public function setSenderEmail(?string $senderEmail): self
    {
        $this->initialized['senderEmail'] = true;
        $this->senderEmail = $senderEmail;
        return $this;
    }
    /**
     * The total number of bulk send children associated with the bulk send parent. If provided in POST, it will be ignored. If modified in PUT, it will throw error MODIFYING_IMMUTABLE_FIELDS
     *
     * @return int|null
     */
    public function getNumChildren(): ?int
    {
        return $this->numChildren;
    }
    /**
     * The total number of bulk send children associated with the bulk send parent. If provided in POST, it will be ignored. If modified in PUT, it will throw error MODIFYING_IMMUTABLE_FIELDS
     *
     * @param int|null $numChildren
     *
     * @return self
     */
    public function setNumChildren(?int $numChildren): self
    {
        $this->initialized['numChildren'] = true;
        $this->numChildren = $numChildren;
        return $this;
    }
    /**
     * The unique identifier of bulk send
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of bulk send 
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
     * State of the bulk send
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * State of the bulk send
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
     * Integer which specifies the delay in hours before sending the first reminder.<br>This is an optional field. The minimum value allowed is 1 hour and the maximum value can’t be more than the difference of agreement creation and expiry time of the agreement in hours.<br>If this is not specified but the reminder frequency is specified, then the first reminder will be sent based on frequency.<br>i.e. if the reminder is created with frequency specified as daily, the firstReminderDelay will be 24 hours. Cannot be updated in a PUT
     *
     * @return int|null
     */
    public function getFirstReminderDelay(): ?int
    {
        return $this->firstReminderDelay;
    }
    /**
     * Integer which specifies the delay in hours before sending the first reminder.<br>This is an optional field. The minimum value allowed is 1 hour and the maximum value can’t be more than the difference of agreement creation and expiry time of the agreement in hours.<br>If this is not specified but the reminder frequency is specified, then the first reminder will be sent based on frequency.<br>i.e. if the reminder is created with frequency specified as daily, the firstReminderDelay will be 24 hours. Cannot be updated in a PUT
     *
     * @param int|null $firstReminderDelay
     *
     * @return self
     */
    public function setFirstReminderDelay(?int $firstReminderDelay): self
    {
        $this->initialized['firstReminderDelay'] = true;
        $this->firstReminderDelay = $firstReminderDelay;
        return $this;
    }
    /**
     * Specifies the type of signature you would like to request - written or e-signature. The possible values are <br> ESIGN : Agreement needs to be signed electronically <br>,
     * WRITTEN : Agreement will be signed using handwritten signature and signed document will be uploaded into the system
     *
     * @return string|null
     */
    public function getSignatureType(): ?string
    {
        return $this->signatureType;
    }
    /**
    * Specifies the type of signature you would like to request - written or e-signature. The possible values are <br> ESIGN : Agreement needs to be signed electronically <br>,
    WRITTEN : Agreement will be signed using handwritten signature and signed document will be uploaded into the system
    *
    * @param string|null $signatureType
    *
    * @return self
    */
    public function setSignatureType(?string $signatureType): self
    {
        $this->initialized['signatureType'] = true;
        $this->signatureType = $signatureType;
        return $this;
    }
    /**
     * @return ExternalId|null
     */
    public function getExternalId(): ?ExternalId
    {
        return $this->externalId;
    }
    /**
     * @param ExternalId|null $externalId
     *
     * @return self
     */
    public function setExternalId(?ExternalId $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;
        return $this;
    }
    /**
     * An optional message to the participants, describing what is being sent or why their signature is required
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * An optional message to the participants, describing what is being sent or why their signature is required
     *
     * @param string|null $message
     *
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
    /**
     * Optional parameter that sets how often you want to send reminders to the participants. If it is not specified, the default frequency set for the account will be used
     *
     * @return string|null
     */
    public function getReminderFrequency(): ?string
    {
        return $this->reminderFrequency;
    }
    /**
     * Optional parameter that sets how often you want to send reminders to the participants. If it is not specified, the default frequency set for the account will be used
     *
     * @param string|null $reminderFrequency
     *
     * @return self
     */
    public function setReminderFrequency(?string $reminderFrequency): self
    {
        $this->initialized['reminderFrequency'] = true;
        $this->reminderFrequency = $reminderFrequency;
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
     * Date when bulk send was created. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * Date when bulk send was created. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * Information about the bulk send participants set.
     *
     * @return list<BulkParticipantSetInfo>|null
     */
    public function getParticipantSetsInfo(): ?array
    {
        return $this->participantSetsInfo;
    }
    /**
     * Information about the bulk send participants set.
     *
     * @param list<BulkParticipantSetInfo>|null $participantSetsInfo
     *
     * @return self
     */
    public function setParticipantSetsInfo(?array $participantSetsInfo): self
    {
        $this->initialized['participantSetsInfo'] = true;
        $this->participantSetsInfo = $participantSetsInfo;
        return $this;
    }
    /**
     * Time after which Agreement expires and needs to be signed before it. Format should be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time. Should not be provided in offline agreement creation. Agreements in DRAFT and AUTHORING status do not expire. The expiration count down starts when agreement is sent.
     *
     * @return string|null
     */
    public function getExpirationTime(): ?string
    {
        return $this->expirationTime;
    }
    /**
     * Time after which Agreement expires and needs to be signed before it. Format should be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time. Should not be provided in offline agreement creation. Agreements in DRAFT and AUTHORING status do not expire. The expiration count down starts when agreement is sent.
     *
     * @param string|null $expirationTime
     *
     * @return self
     */
    public function setExpirationTime(?string $expirationTime): self
    {
        $this->initialized['expirationTime'] = true;
        $this->expirationTime = $expirationTime;
        return $this;
    }
    /**
     * The name of the agreement that will be used to identify it, in emails, website and other places
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The name of the agreement that will be used to identify it, in emails, website and other places
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
     * A list of one or more files (or references to files) that will be sent out for signature. If more than one file is provided, they will be combined into one PDF before being sent out. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @return list<FileInfo>|null
     */
    public function getFileInfos(): ?array
    {
        return $this->fileInfos;
    }
    /**
     * A list of one or more files (or references to files) that will be sent out for signature. If more than one file is provided, they will be combined into one PDF before being sent out. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @param list<FileInfo>|null $fileInfos
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
     * Status of the bulk send
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Status of the bulk send
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