<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementCreationInfo
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
     * True if the agreement was created with a document containing valid digital signatures and is preserving them.  If provided in POST or PUT, it will simply be ignored.
     *
     * @var bool|null
     */
    protected $hasPreservedDigitalSignatures;
    /**
     * The unique identifier of the group to which the agreement belongs to. If not provided during agreement creation, primary group of the creator will be used
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * The locale associated with this agreement - specifies the language for the signing page and emails, for example en_US or fr_FR. If none specified, defaults to the language configured for the agreement sender
     *
     * @var string|null
     */
    protected $locale;
    /**
     * The kind of agreement
     *
     * @var string|null
     */
    protected $type;
    /**
     * @var VaultingInfo|null
     */
    protected $vaultingInfo;
    /**
     * @var SecurityOption|null
     */
    protected $securityOption;
    /**
     * @var PostSignOption|null
     */
    protected $postSignOption;
    /**
     * Additional information for agreements that require notarization
     *
     * @var NotaryInfo|null
     */
    protected $notaryInfo;
    /**
     * A list of one or more CCs that will be copied in the agreement transaction. The CCs will each receive an email at the beginning of the transaction and also when the final document is signed. The email addresses will also receive a copy of the document, attached as a PDF file. Should not be provided in offline agreement creation.
     *
     * @var list<AgreementCcInfo>|null
     */
    protected $ccs;
    /**
     * Indicates the SenderSigns type that applies to the agreement.
     *
     * @var string|null
     */
    protected $senderSigns;
    /**
     * If set to true, enable limited document visibility. Should not be provided in offline agreement creation.
     *
     * @var bool|null
     */
    protected $documentVisibilityEnabled;
    /**
     * Is document retention applied for this resource.  If provided in POST or PUT, it will simply be ignored.
     *
     * @var bool|null
     */
    protected $isDocumentRetentionApplied;
    /**
     * Document retention applied date for this resource.  If provided in POST or PUT, it will simply be ignored.
     *
     * @var string|null
     */
    protected $documentRetentionAppliedDate;
    /**
     * True if agreement has signer identity report available.  If provided in POST or PUT, it will simply be ignored.
     *
     * @var bool|null
     */
    protected $hasSignerIdentityReport;
    /**
     * The date of the last event that occurred for this agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * The unique identifier of the agreement.If provided in POST, it will simply be ignored
     *
     * @var string|null
     */
    protected $id;
    /**
     * The state in which the agreement should land. The state field can only be provided in POST calls, will never get returned in GET /agreements/{ID} and will be ignored if provided in PUT /agreements/{ID} call. The eventual status of the agreement can be obtained from GET /agreements/ID
     *
     * @var string|null
     */
    protected $state;
    /**
     * Optional default values for fields to merge into the document. The values will be presented to the signers for editable fields; for read-only fields the provided values will not be editable during the signing process.
     *
     * @var list<MergefieldInfo>|null
     */
    protected $mergeFieldInfo;
    /**
     * Notification types to disable for the agreement sender. Currently applies only to email notifications; SMS and WhatsApp notifications are not affected. INITIAL: agreement sent confirmation when the agreement is first created and sent out. INTERMEDIATE: status update notifications during the signing workflow, including when participants sign, delegate, reject, or when other workflow events occur. FINAL: completion notification when the agreement is fully executed and all participants have completed their actions. CANCELLATION: notifications when the agreement is cancelled or expires. REMINDER: all reminder notifications (typically not sent to sender). This will be ignored as part of PUT calls. Not returned in GET calls.
     *
     * @var list<string>|null
     */
    protected $senderDisabledNotificationTypes;
    /**
     * Integer which specifies the delay in hours before sending the first reminder.<br>This is an optional field. The minimum value allowed is 1 hour and the maximum value can’t be more than the difference of agreement creation and expiry time of the agreement in hours.<br>If this is not specified but the reminder frequency is specified, then the first reminder will be sent based on frequency.<br>i.e. if the reminder is created with frequency specified as daily, the firstReminderDelay will be 24 hours. Should not be provided in offline agreement creation.
     *
     * @var int|null
     */
    protected $firstReminderDelay;
    /**
     * @var AgreementSettingsInfo|null
     */
    protected $agreementSettingsInfo;
    /**
     * @var EmailOption|null
     */
    protected $emailOption;
    /**
     * A list of form field generators that will produce form fields on the agreement once the agreement is placed in an AUTHORING or IN_PROCESS state
     *
     * @var list<FormFieldGenerator>|null
     */
    protected $formFieldGenerators;
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
     * @var OfflineDeviceInfo|null
     */
    protected $deviceInfo;
    /**
     * The parent id of a bulk send child *OR* the originating id of a web form agreement instance
     *
     * @var string|null
     */
    protected $parentId;
    /**
     * This value specifies the participants for whom the agreement is restricted
     *
     * @var string|null
     */
    protected $restrictedFor;
    /**
     * @var PauseInfo|null
     */
    protected $pauseInfo;
    /**
     * Optional parameter that sets how often you want to send reminders to the participants. If it is not specified, the default frequency set for the account will be used. Should not be provided in offline agreement creation. If provided in PUT as a different value than the current one, an error will be thrown.
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
     * Date when agreement was created. This is a server generated attributed and can not be provided in POST/PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * A list of one or more participant set. A participant set may have one or more participant. If any member of the participant set takes the action that has been assigned to the set(Sign/Approve/Acknowledge etc), the action is considered as the action taken by whole participation set. For regular (non-Send in Bulk) documents, there is no limit on the number of electronic signatures in a single document. Written signatures are limited to four per document
     *
     * @var list<ParticipantSetInfo>|null
     */
    protected $participantSetsInfo;
    /**
     * True if form field data is present.  If provided in POST or PUT, it will simply be ignored.
     *
     * @var bool|null
     */
    protected $hasFormFieldData;
    /**
     * Time after which Agreement expires and needs to be signed before it. Format should be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time. Should not be provided in offline agreement creation. Agreements in DRAFT and AUTHORING status do not expire. The expiration count down starts when agreement is sent.
     *
     * @var string|null
     */
    protected $expirationTime;
    /**
     * Specifies the form field layer template or source of form fields to apply on the files in this transaction. If specified, the FileInfo for this parameter must refer to a form field layer template via libraryDocumentId or libraryDocumentName, or if specified via transientDocumentId or documentURL, it must be of a supported file type. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @var list<AgreementFileInfo>|null
     */
    protected $formFieldLayerTemplates;
    /**
     * The name of the agreement that will be used to identify it, in emails, website and other places
     *
     * @var string|null
     */
    protected $name;
    /**
     * Indicates the experience being used by the originator to send an agreement. <br>FILL_SIGN: originator is using Fill and Sign experience <br>SELF_SIGN: originator is using Self Signing experience <br>REGULAR_SEND: originator is using regular Send experience
     *
     * @var string|null
     */
    protected $sendType;
    /**
     * A list of one or more files (or references to files) that will be sent out for signature. If more than one file is provided, they will be combined into one PDF before being sent out. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @var list<AgreementFileInfo>|null
     */
    protected $fileInfos;
    /**
     * The group id of agreement at the time of creation.
     *
     * @var string|null
     */
    protected $createdGroupId;
    /**
     * The identifier of custom workflow which defines the routing path of an agreement. Should not be provided in offline agreement creation.
     *
     * @var string|null
     */
    protected $workflowId;
    /**
     * This is a server generated attribute which provides the detailed status of an agreement.
     *
     * @var string|null
     */
    protected $status;
    /**
     * True if the agreement was created with a document containing valid digital signatures and is preserving them.  If provided in POST or PUT, it will simply be ignored.
     *
     * @return bool|null
     */
    public function getHasPreservedDigitalSignatures(): ?bool
    {
        return $this->hasPreservedDigitalSignatures;
    }
    /**
     * True if the agreement was created with a document containing valid digital signatures and is preserving them.  If provided in POST or PUT, it will simply be ignored.
     *
     * @param bool|null $hasPreservedDigitalSignatures
     *
     * @return self
     */
    public function setHasPreservedDigitalSignatures(?bool $hasPreservedDigitalSignatures): self
    {
        $this->initialized['hasPreservedDigitalSignatures'] = true;
        $this->hasPreservedDigitalSignatures = $hasPreservedDigitalSignatures;
        return $this;
    }
    /**
     * The unique identifier of the group to which the agreement belongs to. If not provided during agreement creation, primary group of the creator will be used
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * The unique identifier of the group to which the agreement belongs to. If not provided during agreement creation, primary group of the creator will be used
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
     * The kind of agreement
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The kind of agreement
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
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
     * Additional information for agreements that require notarization
     *
     * @return NotaryInfo|null
     */
    public function getNotaryInfo(): ?NotaryInfo
    {
        return $this->notaryInfo;
    }
    /**
     * Additional information for agreements that require notarization
     *
     * @param NotaryInfo|null $notaryInfo
     *
     * @return self
     */
    public function setNotaryInfo(?NotaryInfo $notaryInfo): self
    {
        $this->initialized['notaryInfo'] = true;
        $this->notaryInfo = $notaryInfo;
        return $this;
    }
    /**
     * A list of one or more CCs that will be copied in the agreement transaction. The CCs will each receive an email at the beginning of the transaction and also when the final document is signed. The email addresses will also receive a copy of the document, attached as a PDF file. Should not be provided in offline agreement creation.
     *
     * @return list<AgreementCcInfo>|null
     */
    public function getCcs(): ?array
    {
        return $this->ccs;
    }
    /**
     * A list of one or more CCs that will be copied in the agreement transaction. The CCs will each receive an email at the beginning of the transaction and also when the final document is signed. The email addresses will also receive a copy of the document, attached as a PDF file. Should not be provided in offline agreement creation.
     *
     * @param list<AgreementCcInfo>|null $ccs
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
     * Indicates the SenderSigns type that applies to the agreement.
     *
     * @return string|null
     */
    public function getSenderSigns(): ?string
    {
        return $this->senderSigns;
    }
    /**
     * Indicates the SenderSigns type that applies to the agreement.
     *
     * @param string|null $senderSigns
     *
     * @return self
     */
    public function setSenderSigns(?string $senderSigns): self
    {
        $this->initialized['senderSigns'] = true;
        $this->senderSigns = $senderSigns;
        return $this;
    }
    /**
     * If set to true, enable limited document visibility. Should not be provided in offline agreement creation.
     *
     * @return bool|null
     */
    public function getDocumentVisibilityEnabled(): ?bool
    {
        return $this->documentVisibilityEnabled;
    }
    /**
     * If set to true, enable limited document visibility. Should not be provided in offline agreement creation.
     *
     * @param bool|null $documentVisibilityEnabled
     *
     * @return self
     */
    public function setDocumentVisibilityEnabled(?bool $documentVisibilityEnabled): self
    {
        $this->initialized['documentVisibilityEnabled'] = true;
        $this->documentVisibilityEnabled = $documentVisibilityEnabled;
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
     * Document retention applied date for this resource.  If provided in POST or PUT, it will simply be ignored.
     *
     * @return string|null
     */
    public function getDocumentRetentionAppliedDate(): ?string
    {
        return $this->documentRetentionAppliedDate;
    }
    /**
     * Document retention applied date for this resource.  If provided in POST or PUT, it will simply be ignored.
     *
     * @param string|null $documentRetentionAppliedDate
     *
     * @return self
     */
    public function setDocumentRetentionAppliedDate(?string $documentRetentionAppliedDate): self
    {
        $this->initialized['documentRetentionAppliedDate'] = true;
        $this->documentRetentionAppliedDate = $documentRetentionAppliedDate;
        return $this;
    }
    /**
     * True if agreement has signer identity report available.  If provided in POST or PUT, it will simply be ignored.
     *
     * @return bool|null
     */
    public function getHasSignerIdentityReport(): ?bool
    {
        return $this->hasSignerIdentityReport;
    }
    /**
     * True if agreement has signer identity report available.  If provided in POST or PUT, it will simply be ignored.
     *
     * @param bool|null $hasSignerIdentityReport
     *
     * @return self
     */
    public function setHasSignerIdentityReport(?bool $hasSignerIdentityReport): self
    {
        $this->initialized['hasSignerIdentityReport'] = true;
        $this->hasSignerIdentityReport = $hasSignerIdentityReport;
        return $this;
    }
    /**
     * The date of the last event that occurred for this agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getLastEventDate(): ?string
    {
        return $this->lastEventDate;
    }
    /**
     * The date of the last event that occurred for this agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * The unique identifier of the agreement.If provided in POST, it will simply be ignored
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the agreement.If provided in POST, it will simply be ignored
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
     * The state in which the agreement should land. The state field can only be provided in POST calls, will never get returned in GET /agreements/{ID} and will be ignored if provided in PUT /agreements/{ID} call. The eventual status of the agreement can be obtained from GET /agreements/ID
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * The state in which the agreement should land. The state field can only be provided in POST calls, will never get returned in GET /agreements/{ID} and will be ignored if provided in PUT /agreements/{ID} call. The eventual status of the agreement can be obtained from GET /agreements/ID
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
     * Optional default values for fields to merge into the document. The values will be presented to the signers for editable fields; for read-only fields the provided values will not be editable during the signing process.
     *
     * @return list<MergefieldInfo>|null
     */
    public function getMergeFieldInfo(): ?array
    {
        return $this->mergeFieldInfo;
    }
    /**
     * Optional default values for fields to merge into the document. The values will be presented to the signers for editable fields; for read-only fields the provided values will not be editable during the signing process.
     *
     * @param list<MergefieldInfo>|null $mergeFieldInfo
     *
     * @return self
     */
    public function setMergeFieldInfo(?array $mergeFieldInfo): self
    {
        $this->initialized['mergeFieldInfo'] = true;
        $this->mergeFieldInfo = $mergeFieldInfo;
        return $this;
    }
    /**
     * Notification types to disable for the agreement sender. Currently applies only to email notifications; SMS and WhatsApp notifications are not affected. INITIAL: agreement sent confirmation when the agreement is first created and sent out. INTERMEDIATE: status update notifications during the signing workflow, including when participants sign, delegate, reject, or when other workflow events occur. FINAL: completion notification when the agreement is fully executed and all participants have completed their actions. CANCELLATION: notifications when the agreement is cancelled or expires. REMINDER: all reminder notifications (typically not sent to sender). This will be ignored as part of PUT calls. Not returned in GET calls.
     *
     * @return list<string>|null
     */
    public function getSenderDisabledNotificationTypes(): ?array
    {
        return $this->senderDisabledNotificationTypes;
    }
    /**
     * Notification types to disable for the agreement sender. Currently applies only to email notifications; SMS and WhatsApp notifications are not affected. INITIAL: agreement sent confirmation when the agreement is first created and sent out. INTERMEDIATE: status update notifications during the signing workflow, including when participants sign, delegate, reject, or when other workflow events occur. FINAL: completion notification when the agreement is fully executed and all participants have completed their actions. CANCELLATION: notifications when the agreement is cancelled or expires. REMINDER: all reminder notifications (typically not sent to sender). This will be ignored as part of PUT calls. Not returned in GET calls.
     *
     * @param list<string>|null $senderDisabledNotificationTypes
     *
     * @return self
     */
    public function setSenderDisabledNotificationTypes(?array $senderDisabledNotificationTypes): self
    {
        $this->initialized['senderDisabledNotificationTypes'] = true;
        $this->senderDisabledNotificationTypes = $senderDisabledNotificationTypes;
        return $this;
    }
    /**
     * Integer which specifies the delay in hours before sending the first reminder.<br>This is an optional field. The minimum value allowed is 1 hour and the maximum value can’t be more than the difference of agreement creation and expiry time of the agreement in hours.<br>If this is not specified but the reminder frequency is specified, then the first reminder will be sent based on frequency.<br>i.e. if the reminder is created with frequency specified as daily, the firstReminderDelay will be 24 hours. Should not be provided in offline agreement creation.
     *
     * @return int|null
     */
    public function getFirstReminderDelay(): ?int
    {
        return $this->firstReminderDelay;
    }
    /**
     * Integer which specifies the delay in hours before sending the first reminder.<br>This is an optional field. The minimum value allowed is 1 hour and the maximum value can’t be more than the difference of agreement creation and expiry time of the agreement in hours.<br>If this is not specified but the reminder frequency is specified, then the first reminder will be sent based on frequency.<br>i.e. if the reminder is created with frequency specified as daily, the firstReminderDelay will be 24 hours. Should not be provided in offline agreement creation.
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
     * @return AgreementSettingsInfo|null
     */
    public function getAgreementSettingsInfo(): ?AgreementSettingsInfo
    {
        return $this->agreementSettingsInfo;
    }
    /**
     * @param AgreementSettingsInfo|null $agreementSettingsInfo
     *
     * @return self
     */
    public function setAgreementSettingsInfo(?AgreementSettingsInfo $agreementSettingsInfo): self
    {
        $this->initialized['agreementSettingsInfo'] = true;
        $this->agreementSettingsInfo = $agreementSettingsInfo;
        return $this;
    }
    /**
     * @return EmailOption|null
     */
    public function getEmailOption(): ?EmailOption
    {
        return $this->emailOption;
    }
    /**
     * @param EmailOption|null $emailOption
     *
     * @return self
     */
    public function setEmailOption(?EmailOption $emailOption): self
    {
        $this->initialized['emailOption'] = true;
        $this->emailOption = $emailOption;
        return $this;
    }
    /**
     * A list of form field generators that will produce form fields on the agreement once the agreement is placed in an AUTHORING or IN_PROCESS state
     *
     * @return list<FormFieldGenerator>|null
     */
    public function getFormFieldGenerators(): ?array
    {
        return $this->formFieldGenerators;
    }
    /**
     * A list of form field generators that will produce form fields on the agreement once the agreement is placed in an AUTHORING or IN_PROCESS state
     *
     * @param list<FormFieldGenerator>|null $formFieldGenerators
     *
     * @return self
     */
    public function setFormFieldGenerators(?array $formFieldGenerators): self
    {
        $this->initialized['formFieldGenerators'] = true;
        $this->formFieldGenerators = $formFieldGenerators;
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
     * @return OfflineDeviceInfo|null
     */
    public function getDeviceInfo(): ?OfflineDeviceInfo
    {
        return $this->deviceInfo;
    }
    /**
     * @param OfflineDeviceInfo|null $deviceInfo
     *
     * @return self
     */
    public function setDeviceInfo(?OfflineDeviceInfo $deviceInfo): self
    {
        $this->initialized['deviceInfo'] = true;
        $this->deviceInfo = $deviceInfo;
        return $this;
    }
    /**
     * The parent id of a bulk send child *OR* the originating id of a web form agreement instance
     *
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }
    /**
     * The parent id of a bulk send child *OR* the originating id of a web form agreement instance
     *
     * @param string|null $parentId
     *
     * @return self
     */
    public function setParentId(?string $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;
        return $this;
    }
    /**
     * This value specifies the participants for whom the agreement is restricted
     *
     * @return string|null
     */
    public function getRestrictedFor(): ?string
    {
        return $this->restrictedFor;
    }
    /**
     * This value specifies the participants for whom the agreement is restricted
     *
     * @param string|null $restrictedFor
     *
     * @return self
     */
    public function setRestrictedFor(?string $restrictedFor): self
    {
        $this->initialized['restrictedFor'] = true;
        $this->restrictedFor = $restrictedFor;
        return $this;
    }
    /**
     * @return PauseInfo|null
     */
    public function getPauseInfo(): ?PauseInfo
    {
        return $this->pauseInfo;
    }
    /**
     * @param PauseInfo|null $pauseInfo
     *
     * @return self
     */
    public function setPauseInfo(?PauseInfo $pauseInfo): self
    {
        $this->initialized['pauseInfo'] = true;
        $this->pauseInfo = $pauseInfo;
        return $this;
    }
    /**
     * Optional parameter that sets how often you want to send reminders to the participants. If it is not specified, the default frequency set for the account will be used. Should not be provided in offline agreement creation. If provided in PUT as a different value than the current one, an error will be thrown.
     *
     * @return string|null
     */
    public function getReminderFrequency(): ?string
    {
        return $this->reminderFrequency;
    }
    /**
     * Optional parameter that sets how often you want to send reminders to the participants. If it is not specified, the default frequency set for the account will be used. Should not be provided in offline agreement creation. If provided in PUT as a different value than the current one, an error will be thrown.
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
     * Date when agreement was created. This is a server generated attributed and can not be provided in POST/PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * Date when agreement was created. This is a server generated attributed and can not be provided in POST/PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * A list of one or more participant set. A participant set may have one or more participant. If any member of the participant set takes the action that has been assigned to the set(Sign/Approve/Acknowledge etc), the action is considered as the action taken by whole participation set. For regular (non-Send in Bulk) documents, there is no limit on the number of electronic signatures in a single document. Written signatures are limited to four per document
     *
     * @return list<ParticipantSetInfo>|null
     */
    public function getParticipantSetsInfo(): ?array
    {
        return $this->participantSetsInfo;
    }
    /**
     * A list of one or more participant set. A participant set may have one or more participant. If any member of the participant set takes the action that has been assigned to the set(Sign/Approve/Acknowledge etc), the action is considered as the action taken by whole participation set. For regular (non-Send in Bulk) documents, there is no limit on the number of electronic signatures in a single document. Written signatures are limited to four per document
     *
     * @param list<ParticipantSetInfo>|null $participantSetsInfo
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
     * True if form field data is present.  If provided in POST or PUT, it will simply be ignored.
     *
     * @return bool|null
     */
    public function getHasFormFieldData(): ?bool
    {
        return $this->hasFormFieldData;
    }
    /**
     * True if form field data is present.  If provided in POST or PUT, it will simply be ignored.
     *
     * @param bool|null $hasFormFieldData
     *
     * @return self
     */
    public function setHasFormFieldData(?bool $hasFormFieldData): self
    {
        $this->initialized['hasFormFieldData'] = true;
        $this->hasFormFieldData = $hasFormFieldData;
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
     * Specifies the form field layer template or source of form fields to apply on the files in this transaction. If specified, the FileInfo for this parameter must refer to a form field layer template via libraryDocumentId or libraryDocumentName, or if specified via transientDocumentId or documentURL, it must be of a supported file type. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @return list<AgreementFileInfo>|null
     */
    public function getFormFieldLayerTemplates(): ?array
    {
        return $this->formFieldLayerTemplates;
    }
    /**
     * Specifies the form field layer template or source of form fields to apply on the files in this transaction. If specified, the FileInfo for this parameter must refer to a form field layer template via libraryDocumentId or libraryDocumentName, or if specified via transientDocumentId or documentURL, it must be of a supported file type. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @param list<AgreementFileInfo>|null $formFieldLayerTemplates
     *
     * @return self
     */
    public function setFormFieldLayerTemplates(?array $formFieldLayerTemplates): self
    {
        $this->initialized['formFieldLayerTemplates'] = true;
        $this->formFieldLayerTemplates = $formFieldLayerTemplates;
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
     * Indicates the experience being used by the originator to send an agreement. <br>FILL_SIGN: originator is using Fill and Sign experience <br>SELF_SIGN: originator is using Self Signing experience <br>REGULAR_SEND: originator is using regular Send experience
     *
     * @return string|null
     */
    public function getSendType(): ?string
    {
        return $this->sendType;
    }
    /**
     * Indicates the experience being used by the originator to send an agreement. <br>FILL_SIGN: originator is using Fill and Sign experience <br>SELF_SIGN: originator is using Self Signing experience <br>REGULAR_SEND: originator is using regular Send experience
     *
     * @param string|null $sendType
     *
     * @return self
     */
    public function setSendType(?string $sendType): self
    {
        $this->initialized['sendType'] = true;
        $this->sendType = $sendType;
        return $this;
    }
    /**
     * A list of one or more files (or references to files) that will be sent out for signature. If more than one file is provided, they will be combined into one PDF before being sent out. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @return list<AgreementFileInfo>|null
     */
    public function getFileInfos(): ?array
    {
        return $this->fileInfos;
    }
    /**
     * A list of one or more files (or references to files) that will be sent out for signature. If more than one file is provided, they will be combined into one PDF before being sent out. Note: Only one of the four parameters in every FileInfo object must be specified
     *
     * @param list<AgreementFileInfo>|null $fileInfos
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
     * The group id of agreement at the time of creation.
     *
     * @return string|null
     */
    public function getCreatedGroupId(): ?string
    {
        return $this->createdGroupId;
    }
    /**
     * The group id of agreement at the time of creation.
     *
     * @param string|null $createdGroupId
     *
     * @return self
     */
    public function setCreatedGroupId(?string $createdGroupId): self
    {
        $this->initialized['createdGroupId'] = true;
        $this->createdGroupId = $createdGroupId;
        return $this;
    }
    /**
     * The identifier of custom workflow which defines the routing path of an agreement. Should not be provided in offline agreement creation.
     *
     * @return string|null
     */
    public function getWorkflowId(): ?string
    {
        return $this->workflowId;
    }
    /**
     * The identifier of custom workflow which defines the routing path of an agreement. Should not be provided in offline agreement creation.
     *
     * @param string|null $workflowId
     *
     * @return self
     */
    public function setWorkflowId(?string $workflowId): self
    {
        $this->initialized['workflowId'] = true;
        $this->workflowId = $workflowId;
        return $this;
    }
    /**
     * This is a server generated attribute which provides the detailed status of an agreement.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * This is a server generated attribute which provides the detailed status of an agreement.
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