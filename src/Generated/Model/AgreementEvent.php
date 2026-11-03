<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementEvent
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
     * The date of the audit event. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $date;
    /**
     * This is present for ACTION_REQUESTED event when participation is private
     *
     * @var bool|null
     */
    protected $participantIsPrivate;
    /**
     * Signer changed name at signing : new name used to sign.
     *
     * @var string|null
     */
    protected $signerNewName;
    /**
     * Signing reason captured during ESIGN or DIGSIGN. Reasons are seperated by ;\n if there are more than one reason
     *
     * @var string|null
     */
    protected $signingReason;
    /**
     * Signer changed name at signing : name used previous to signing.
     *
     * @var string|null
     */
    protected $signerOldName;
    /**
     * A description of the audit event
     *
     * @var string|null
     */
    protected $description;
    /**
     * The signature input type selected by the signer
     *
     * @var string|null
     */
    protected $signatureInputType;
    /**
     * The IP address of the user that created the event
     *
     * @var string|null
     */
    protected $actingUserIpAddress;
    /**
     * Email address of the user that is the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @var string|null
     */
    protected $participantEmail;
    /**
     * Type of agreement event
     *
     * @var string|null
     */
    protected $type;
    /**
     * The unique identifier of the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @var string|null
     */
    protected $participantId;
    /**
     * Email address of the user that created the event
     *
     * @var string|null
     */
    protected $actingUserEmail;
    /**
     * @var DigitalSignatureInfo|null
     */
    protected $digitalSignatureInfo;
    /**
     * The device used to sign the agreement
     *
     * @var string|null
     */
    protected $signatureDevice;
    /**
     * The identifier for the event.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Phone number of the participant to whom an agreement URL is sent
     *
     * @var string|null
     */
    protected $participantPhoneNumber;
    /**
     * Full name of the user that initiated the event on behalf of the acting user when the account is shared. Will be empty if there is no account sharing in effect
     *
     * @var string|null
     */
    protected $initiatingUserName;
    /**
     * A list of one or more participants who received the reminders
     *
     * @var list<ReminderParticipant>|null
     */
    protected $reminderParticipants;
    /**
     * The name of the acting user
     *
     * @var string|null
     */
    protected $actingUserName;
    /**
     * Email of the user that was replaced by the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @var string|null
     */
    protected $replacedParticipantEmail;
    /**
     * @var AgreementEventElectronicSealInfo|null
     */
    protected $electronicSealInfo;
    /**
     * Role assumed by all participants in the participant set the participant belongs to (signer, approver etc.).
     *
     * @var string|null
     */
    protected $participantRole;
    /**
     * The identifier assigned by the vault provider for the vault event (if vaulted, otherwise null)
     *
     * @var string|null
     */
    protected $vaultEventId;
    /**
     * An ID which uniquely identifies the version of the document associated with this audit event
     *
     * @var string|null
     */
    protected $versionId;
    /**
     * Phone number from the device used when the participation is completed on a mobile phone
     *
     * @var string|null
     */
    protected $devicePhoneNumber;
    /**
     * Email address of the user that initiated the event on behalf of the acting user when the account is shared. Will be empty if there is no account sharing in effect
     *
     * @var string|null
     */
    protected $initiatingUserEmail;
    /**
     * Full name of the user that was replaced by the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @var string|null
     */
    protected $replacedParticipantName;
    /**
     * Name of the vault provider for the vault event (if vaulted, otherwise null)
     *
     * @var string|null
     */
    protected $vaultProviderName;
    /**
     * The event comment. For RECALLED or REJECTED, the reason given by the user that initiates the event. For DELEGATE or SHARE, the message from the acting user to the participant
     *
     * @var string|null
     */
    protected $comment;
    /**
     * The device used for the event.
     *
     * @var string|null
     */
    protected $device;
    /**
     * A list of removed participants.
     *
     * @var list<RemovedParticipant>|null
     */
    protected $removedParticipants;
    /**
     * A unique identifier linking offline events to synchronization events (specified for offline signing events and synchronization events, else null)
     *
     * @var string|null
     */
    protected $synchronizationId;
    /**
     * @var DeviceLocation|null
     */
    protected $deviceLocation;
    /**
     * The date of the audit event. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }
    /**
     * The date of the audit event. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $date
     *
     * @return self
     */
    public function setDate(?string $date): self
    {
        $this->initialized['date'] = true;
        $this->date = $date;
        return $this;
    }
    /**
     * This is present for ACTION_REQUESTED event when participation is private
     *
     * @return bool|null
     */
    public function getParticipantIsPrivate(): ?bool
    {
        return $this->participantIsPrivate;
    }
    /**
     * This is present for ACTION_REQUESTED event when participation is private
     *
     * @param bool|null $participantIsPrivate
     *
     * @return self
     */
    public function setParticipantIsPrivate(?bool $participantIsPrivate): self
    {
        $this->initialized['participantIsPrivate'] = true;
        $this->participantIsPrivate = $participantIsPrivate;
        return $this;
    }
    /**
     * Signer changed name at signing : new name used to sign.
     *
     * @return string|null
     */
    public function getSignerNewName(): ?string
    {
        return $this->signerNewName;
    }
    /**
     * Signer changed name at signing : new name used to sign.
     *
     * @param string|null $signerNewName
     *
     * @return self
     */
    public function setSignerNewName(?string $signerNewName): self
    {
        $this->initialized['signerNewName'] = true;
        $this->signerNewName = $signerNewName;
        return $this;
    }
    /**
     * Signing reason captured during ESIGN or DIGSIGN. Reasons are seperated by ;\n if there are more than one reason
     *
     * @return string|null
     */
    public function getSigningReason(): ?string
    {
        return $this->signingReason;
    }
    /**
     * Signing reason captured during ESIGN or DIGSIGN. Reasons are seperated by ;\n if there are more than one reason
     *
     * @param string|null $signingReason
     *
     * @return self
     */
    public function setSigningReason(?string $signingReason): self
    {
        $this->initialized['signingReason'] = true;
        $this->signingReason = $signingReason;
        return $this;
    }
    /**
     * Signer changed name at signing : name used previous to signing.
     *
     * @return string|null
     */
    public function getSignerOldName(): ?string
    {
        return $this->signerOldName;
    }
    /**
     * Signer changed name at signing : name used previous to signing.
     *
     * @param string|null $signerOldName
     *
     * @return self
     */
    public function setSignerOldName(?string $signerOldName): self
    {
        $this->initialized['signerOldName'] = true;
        $this->signerOldName = $signerOldName;
        return $this;
    }
    /**
     * A description of the audit event
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * A description of the audit event
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
     * The signature input type selected by the signer
     *
     * @return string|null
     */
    public function getSignatureInputType(): ?string
    {
        return $this->signatureInputType;
    }
    /**
     * The signature input type selected by the signer
     *
     * @param string|null $signatureInputType
     *
     * @return self
     */
    public function setSignatureInputType(?string $signatureInputType): self
    {
        $this->initialized['signatureInputType'] = true;
        $this->signatureInputType = $signatureInputType;
        return $this;
    }
    /**
     * The IP address of the user that created the event
     *
     * @return string|null
     */
    public function getActingUserIpAddress(): ?string
    {
        return $this->actingUserIpAddress;
    }
    /**
     * The IP address of the user that created the event
     *
     * @param string|null $actingUserIpAddress
     *
     * @return self
     */
    public function setActingUserIpAddress(?string $actingUserIpAddress): self
    {
        $this->initialized['actingUserIpAddress'] = true;
        $this->actingUserIpAddress = $actingUserIpAddress;
        return $this;
    }
    /**
     * Email address of the user that is the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @return string|null
     */
    public function getParticipantEmail(): ?string
    {
        return $this->participantEmail;
    }
    /**
     * Email address of the user that is the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @param string|null $participantEmail
     *
     * @return self
     */
    public function setParticipantEmail(?string $participantEmail): self
    {
        $this->initialized['participantEmail'] = true;
        $this->participantEmail = $participantEmail;
        return $this;
    }
    /**
     * Type of agreement event
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Type of agreement event
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
     * The unique identifier of the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @return string|null
     */
    public function getParticipantId(): ?string
    {
        return $this->participantId;
    }
    /**
     * The unique identifier of the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @param string|null $participantId
     *
     * @return self
     */
    public function setParticipantId(?string $participantId): self
    {
        $this->initialized['participantId'] = true;
        $this->participantId = $participantId;
        return $this;
    }
    /**
     * Email address of the user that created the event
     *
     * @return string|null
     */
    public function getActingUserEmail(): ?string
    {
        return $this->actingUserEmail;
    }
    /**
     * Email address of the user that created the event
     *
     * @param string|null $actingUserEmail
     *
     * @return self
     */
    public function setActingUserEmail(?string $actingUserEmail): self
    {
        $this->initialized['actingUserEmail'] = true;
        $this->actingUserEmail = $actingUserEmail;
        return $this;
    }
    /**
     * @return DigitalSignatureInfo|null
     */
    public function getDigitalSignatureInfo(): ?DigitalSignatureInfo
    {
        return $this->digitalSignatureInfo;
    }
    /**
     * @param DigitalSignatureInfo|null $digitalSignatureInfo
     *
     * @return self
     */
    public function setDigitalSignatureInfo(?DigitalSignatureInfo $digitalSignatureInfo): self
    {
        $this->initialized['digitalSignatureInfo'] = true;
        $this->digitalSignatureInfo = $digitalSignatureInfo;
        return $this;
    }
    /**
     * The device used to sign the agreement
     *
     * @return string|null
     */
    public function getSignatureDevice(): ?string
    {
        return $this->signatureDevice;
    }
    /**
     * The device used to sign the agreement
     *
     * @param string|null $signatureDevice
     *
     * @return self
     */
    public function setSignatureDevice(?string $signatureDevice): self
    {
        $this->initialized['signatureDevice'] = true;
        $this->signatureDevice = $signatureDevice;
        return $this;
    }
    /**
     * The identifier for the event.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The identifier for the event.
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
     * Phone number of the participant to whom an agreement URL is sent
     *
     * @return string|null
     */
    public function getParticipantPhoneNumber(): ?string
    {
        return $this->participantPhoneNumber;
    }
    /**
     * Phone number of the participant to whom an agreement URL is sent
     *
     * @param string|null $participantPhoneNumber
     *
     * @return self
     */
    public function setParticipantPhoneNumber(?string $participantPhoneNumber): self
    {
        $this->initialized['participantPhoneNumber'] = true;
        $this->participantPhoneNumber = $participantPhoneNumber;
        return $this;
    }
    /**
     * Full name of the user that initiated the event on behalf of the acting user when the account is shared. Will be empty if there is no account sharing in effect
     *
     * @return string|null
     */
    public function getInitiatingUserName(): ?string
    {
        return $this->initiatingUserName;
    }
    /**
     * Full name of the user that initiated the event on behalf of the acting user when the account is shared. Will be empty if there is no account sharing in effect
     *
     * @param string|null $initiatingUserName
     *
     * @return self
     */
    public function setInitiatingUserName(?string $initiatingUserName): self
    {
        $this->initialized['initiatingUserName'] = true;
        $this->initiatingUserName = $initiatingUserName;
        return $this;
    }
    /**
     * A list of one or more participants who received the reminders
     *
     * @return list<ReminderParticipant>|null
     */
    public function getReminderParticipants(): ?array
    {
        return $this->reminderParticipants;
    }
    /**
     * A list of one or more participants who received the reminders
     *
     * @param list<ReminderParticipant>|null $reminderParticipants
     *
     * @return self
     */
    public function setReminderParticipants(?array $reminderParticipants): self
    {
        $this->initialized['reminderParticipants'] = true;
        $this->reminderParticipants = $reminderParticipants;
        return $this;
    }
    /**
     * The name of the acting user
     *
     * @return string|null
     */
    public function getActingUserName(): ?string
    {
        return $this->actingUserName;
    }
    /**
     * The name of the acting user
     *
     * @param string|null $actingUserName
     *
     * @return self
     */
    public function setActingUserName(?string $actingUserName): self
    {
        $this->initialized['actingUserName'] = true;
        $this->actingUserName = $actingUserName;
        return $this;
    }
    /**
     * Email of the user that was replaced by the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @return string|null
     */
    public function getReplacedParticipantEmail(): ?string
    {
        return $this->replacedParticipantEmail;
    }
    /**
     * Email of the user that was replaced by the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @param string|null $replacedParticipantEmail
     *
     * @return self
     */
    public function setReplacedParticipantEmail(?string $replacedParticipantEmail): self
    {
        $this->initialized['replacedParticipantEmail'] = true;
        $this->replacedParticipantEmail = $replacedParticipantEmail;
        return $this;
    }
    /**
     * @return AgreementEventElectronicSealInfo|null
     */
    public function getElectronicSealInfo(): ?AgreementEventElectronicSealInfo
    {
        return $this->electronicSealInfo;
    }
    /**
     * @param AgreementEventElectronicSealInfo|null $electronicSealInfo
     *
     * @return self
     */
    public function setElectronicSealInfo(?AgreementEventElectronicSealInfo $electronicSealInfo): self
    {
        $this->initialized['electronicSealInfo'] = true;
        $this->electronicSealInfo = $electronicSealInfo;
        return $this;
    }
    /**
     * Role assumed by all participants in the participant set the participant belongs to (signer, approver etc.).
     *
     * @return string|null
     */
    public function getParticipantRole(): ?string
    {
        return $this->participantRole;
    }
    /**
     * Role assumed by all participants in the participant set the participant belongs to (signer, approver etc.).
     *
     * @param string|null $participantRole
     *
     * @return self
     */
    public function setParticipantRole(?string $participantRole): self
    {
        $this->initialized['participantRole'] = true;
        $this->participantRole = $participantRole;
        return $this;
    }
    /**
     * The identifier assigned by the vault provider for the vault event (if vaulted, otherwise null)
     *
     * @return string|null
     */
    public function getVaultEventId(): ?string
    {
        return $this->vaultEventId;
    }
    /**
     * The identifier assigned by the vault provider for the vault event (if vaulted, otherwise null)
     *
     * @param string|null $vaultEventId
     *
     * @return self
     */
    public function setVaultEventId(?string $vaultEventId): self
    {
        $this->initialized['vaultEventId'] = true;
        $this->vaultEventId = $vaultEventId;
        return $this;
    }
    /**
     * An ID which uniquely identifies the version of the document associated with this audit event
     *
     * @return string|null
     */
    public function getVersionId(): ?string
    {
        return $this->versionId;
    }
    /**
     * An ID which uniquely identifies the version of the document associated with this audit event
     *
     * @param string|null $versionId
     *
     * @return self
     */
    public function setVersionId(?string $versionId): self
    {
        $this->initialized['versionId'] = true;
        $this->versionId = $versionId;
        return $this;
    }
    /**
     * Phone number from the device used when the participation is completed on a mobile phone
     *
     * @return string|null
     */
    public function getDevicePhoneNumber(): ?string
    {
        return $this->devicePhoneNumber;
    }
    /**
     * Phone number from the device used when the participation is completed on a mobile phone
     *
     * @param string|null $devicePhoneNumber
     *
     * @return self
     */
    public function setDevicePhoneNumber(?string $devicePhoneNumber): self
    {
        $this->initialized['devicePhoneNumber'] = true;
        $this->devicePhoneNumber = $devicePhoneNumber;
        return $this;
    }
    /**
     * Email address of the user that initiated the event on behalf of the acting user when the account is shared. Will be empty if there is no account sharing in effect
     *
     * @return string|null
     */
    public function getInitiatingUserEmail(): ?string
    {
        return $this->initiatingUserEmail;
    }
    /**
     * Email address of the user that initiated the event on behalf of the acting user when the account is shared. Will be empty if there is no account sharing in effect
     *
     * @param string|null $initiatingUserEmail
     *
     * @return self
     */
    public function setInitiatingUserEmail(?string $initiatingUserEmail): self
    {
        $this->initialized['initiatingUserEmail'] = true;
        $this->initiatingUserEmail = $initiatingUserEmail;
        return $this;
    }
    /**
     * Full name of the user that was replaced by the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @return string|null
     */
    public function getReplacedParticipantName(): ?string
    {
        return $this->replacedParticipantName;
    }
    /**
     * Full name of the user that was replaced by the participant for the event. This may be different than the acting user for certain event types. For example, for a DELEGATION event, this is the user who was delegated to
     *
     * @param string|null $replacedParticipantName
     *
     * @return self
     */
    public function setReplacedParticipantName(?string $replacedParticipantName): self
    {
        $this->initialized['replacedParticipantName'] = true;
        $this->replacedParticipantName = $replacedParticipantName;
        return $this;
    }
    /**
     * Name of the vault provider for the vault event (if vaulted, otherwise null)
     *
     * @return string|null
     */
    public function getVaultProviderName(): ?string
    {
        return $this->vaultProviderName;
    }
    /**
     * Name of the vault provider for the vault event (if vaulted, otherwise null)
     *
     * @param string|null $vaultProviderName
     *
     * @return self
     */
    public function setVaultProviderName(?string $vaultProviderName): self
    {
        $this->initialized['vaultProviderName'] = true;
        $this->vaultProviderName = $vaultProviderName;
        return $this;
    }
    /**
     * The event comment. For RECALLED or REJECTED, the reason given by the user that initiates the event. For DELEGATE or SHARE, the message from the acting user to the participant
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }
    /**
     * The event comment. For RECALLED or REJECTED, the reason given by the user that initiates the event. For DELEGATE or SHARE, the message from the acting user to the participant
     *
     * @param string|null $comment
     *
     * @return self
     */
    public function setComment(?string $comment): self
    {
        $this->initialized['comment'] = true;
        $this->comment = $comment;
        return $this;
    }
    /**
     * The device used for the event.
     *
     * @return string|null
     */
    public function getDevice(): ?string
    {
        return $this->device;
    }
    /**
     * The device used for the event.
     *
     * @param string|null $device
     *
     * @return self
     */
    public function setDevice(?string $device): self
    {
        $this->initialized['device'] = true;
        $this->device = $device;
        return $this;
    }
    /**
     * A list of removed participants.
     *
     * @return list<RemovedParticipant>|null
     */
    public function getRemovedParticipants(): ?array
    {
        return $this->removedParticipants;
    }
    /**
     * A list of removed participants.
     *
     * @param list<RemovedParticipant>|null $removedParticipants
     *
     * @return self
     */
    public function setRemovedParticipants(?array $removedParticipants): self
    {
        $this->initialized['removedParticipants'] = true;
        $this->removedParticipants = $removedParticipants;
        return $this;
    }
    /**
     * A unique identifier linking offline events to synchronization events (specified for offline signing events and synchronization events, else null)
     *
     * @return string|null
     */
    public function getSynchronizationId(): ?string
    {
        return $this->synchronizationId;
    }
    /**
     * A unique identifier linking offline events to synchronization events (specified for offline signing events and synchronization events, else null)
     *
     * @param string|null $synchronizationId
     *
     * @return self
     */
    public function setSynchronizationId(?string $synchronizationId): self
    {
        $this->initialized['synchronizationId'] = true;
        $this->synchronizationId = $synchronizationId;
        return $this;
    }
    /**
     * @return DeviceLocation|null
     */
    public function getDeviceLocation(): ?DeviceLocation
    {
        return $this->deviceLocation;
    }
    /**
     * @param DeviceLocation|null $deviceLocation
     *
     * @return self
     */
    public function setDeviceLocation(?DeviceLocation $deviceLocation): self
    {
        $this->initialized['deviceLocation'] = true;
        $this->deviceLocation = $deviceLocation;
        return $this;
    }
}