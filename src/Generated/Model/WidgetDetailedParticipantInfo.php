<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetDetailedParticipantInfo
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
     * True if the agreement is hidden for the user that is calling the API. Only returned if self is true. Ignored (not required) if modifying a participant (PUT).
     *
     * @var bool|null
     */
    protected $hidden;
    /**
     * The isPrivate flag indicates whether a participant receives the agreement privately or not.
     *
     * @var bool|null
     */
    protected $isPrivate;
    /**
     * The user ID of the participant. This will be returned as part of GET call but is ignored if passed as part of PUT call.
     *
     * @var string|null
     */
    protected $userId;
    /**
     * @var WidgetParticipantSecurityOption|null
     */
    protected $securityOption;
    /**
     * @var PhoneDeliveryInfo|null
     */
    protected $phoneDeliveryInfo;
    /**
     * The date when the participant was added. This will be returned as part of GET call but is ignored if passed as part of PUT call.
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * Time in UTC when the form data for the participant is auto saved during signing. If provided in a POST or a PUT, it will be ignored. The data is only available to the sender when there is existing form data for the participant
     *
     * @var string|null
     */
    protected $formDataLastAutoSavedTime;
    /**
     * The name of the participant, if available. Name is required for witness participants as part of the PUT call.
     *
     * @var string|null
     */
    protected $name;
    /**
     * True if this participant is the same user that is calling the API. Returned as part of Get. Ignored (not required) if modifying a participant set (PUT).
     *
     * @var bool|null
     */
    protected $self;
    /**
     * The company of the participant, if available. This cannot be changed as part of the PUT call.
     *
     * @var string|null
     */
    protected $company;
    /**
     * Indicates if the data in the email field is valid email and can be used for sending emails
     *
     * @var bool|null
     */
    protected $deliverableEmail;
    /**
     * The unique identifier of the participant. This will be returned as part of Get call.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Email of the participant. In case of modifying a participant set (PUT) this is a required field. In case of GET, this is the required field and will always be returned unless it is a fax workflow (legacy agreements) that were created using fax as input
     *
     * @var string|null
     */
    protected $email;
    /**
     * True if the agreement is hidden for the user that is calling the API. Only returned if self is true. Ignored (not required) if modifying a participant (PUT).
     *
     * @return bool|null
     */
    public function getHidden(): ?bool
    {
        return $this->hidden;
    }
    /**
     * True if the agreement is hidden for the user that is calling the API. Only returned if self is true. Ignored (not required) if modifying a participant (PUT).
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
     * The isPrivate flag indicates whether a participant receives the agreement privately or not.
     *
     * @return bool|null
     */
    public function getIsPrivate(): ?bool
    {
        return $this->isPrivate;
    }
    /**
     * The isPrivate flag indicates whether a participant receives the agreement privately or not.
     *
     * @param bool|null $isPrivate
     *
     * @return self
     */
    public function setIsPrivate(?bool $isPrivate): self
    {
        $this->initialized['isPrivate'] = true;
        $this->isPrivate = $isPrivate;
        return $this;
    }
    /**
     * The user ID of the participant. This will be returned as part of GET call but is ignored if passed as part of PUT call.
     *
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }
    /**
     * The user ID of the participant. This will be returned as part of GET call but is ignored if passed as part of PUT call.
     *
     * @param string|null $userId
     *
     * @return self
     */
    public function setUserId(?string $userId): self
    {
        $this->initialized['userId'] = true;
        $this->userId = $userId;
        return $this;
    }
    /**
     * @return WidgetParticipantSecurityOption|null
     */
    public function getSecurityOption(): ?WidgetParticipantSecurityOption
    {
        return $this->securityOption;
    }
    /**
     * @param WidgetParticipantSecurityOption|null $securityOption
     *
     * @return self
     */
    public function setSecurityOption(?WidgetParticipantSecurityOption $securityOption): self
    {
        $this->initialized['securityOption'] = true;
        $this->securityOption = $securityOption;
        return $this;
    }
    /**
     * @return PhoneDeliveryInfo|null
     */
    public function getPhoneDeliveryInfo(): ?PhoneDeliveryInfo
    {
        return $this->phoneDeliveryInfo;
    }
    /**
     * @param PhoneDeliveryInfo|null $phoneDeliveryInfo
     *
     * @return self
     */
    public function setPhoneDeliveryInfo(?PhoneDeliveryInfo $phoneDeliveryInfo): self
    {
        $this->initialized['phoneDeliveryInfo'] = true;
        $this->phoneDeliveryInfo = $phoneDeliveryInfo;
        return $this;
    }
    /**
     * The date when the participant was added. This will be returned as part of GET call but is ignored if passed as part of PUT call.
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * The date when the participant was added. This will be returned as part of GET call but is ignored if passed as part of PUT call.
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
     * Time in UTC when the form data for the participant is auto saved during signing. If provided in a POST or a PUT, it will be ignored. The data is only available to the sender when there is existing form data for the participant
     *
     * @return string|null
     */
    public function getFormDataLastAutoSavedTime(): ?string
    {
        return $this->formDataLastAutoSavedTime;
    }
    /**
     * Time in UTC when the form data for the participant is auto saved during signing. If provided in a POST or a PUT, it will be ignored. The data is only available to the sender when there is existing form data for the participant
     *
     * @param string|null $formDataLastAutoSavedTime
     *
     * @return self
     */
    public function setFormDataLastAutoSavedTime(?string $formDataLastAutoSavedTime): self
    {
        $this->initialized['formDataLastAutoSavedTime'] = true;
        $this->formDataLastAutoSavedTime = $formDataLastAutoSavedTime;
        return $this;
    }
    /**
     * The name of the participant, if available. Name is required for witness participants as part of the PUT call.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The name of the participant, if available. Name is required for witness participants as part of the PUT call.
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
     * True if this participant is the same user that is calling the API. Returned as part of Get. Ignored (not required) if modifying a participant set (PUT).
     *
     * @return bool|null
     */
    public function getSelf(): ?bool
    {
        return $this->self;
    }
    /**
     * True if this participant is the same user that is calling the API. Returned as part of Get. Ignored (not required) if modifying a participant set (PUT).
     *
     * @param bool|null $self
     *
     * @return self
     */
    public function setSelf(?bool $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * The company of the participant, if available. This cannot be changed as part of the PUT call.
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * The company of the participant, if available. This cannot be changed as part of the PUT call.
     *
     * @param string|null $company
     *
     * @return self
     */
    public function setCompany(?string $company): self
    {
        $this->initialized['company'] = true;
        $this->company = $company;
        return $this;
    }
    /**
     * Indicates if the data in the email field is valid email and can be used for sending emails
     *
     * @return bool|null
     */
    public function getDeliverableEmail(): ?bool
    {
        return $this->deliverableEmail;
    }
    /**
     * Indicates if the data in the email field is valid email and can be used for sending emails
     *
     * @param bool|null $deliverableEmail
     *
     * @return self
     */
    public function setDeliverableEmail(?bool $deliverableEmail): self
    {
        $this->initialized['deliverableEmail'] = true;
        $this->deliverableEmail = $deliverableEmail;
        return $this;
    }
    /**
     * The unique identifier of the participant. This will be returned as part of Get call.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the participant. This will be returned as part of Get call.
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
     * Email of the participant. In case of modifying a participant set (PUT) this is a required field. In case of GET, this is the required field and will always be returned unless it is a fax workflow (legacy agreements) that were created using fax as input
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email of the participant. In case of modifying a participant set (PUT) this is a required field. In case of GET, this is the required field and will always be returned unless it is a fax workflow (legacy agreements) that were created using fax as input
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
}