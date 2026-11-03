<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetParticipantInfo
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
     * @var PhoneDeliveryInfo|null
     */
    protected $phoneDeliveryInfo;
    /**
     * Time in UTC when the form data for the participant is auto saved during signing. If provided in a POST or a PUT, it will be ignored. The data is only available to the sender when there is existing form data for the participant
     *
     * @var string|null
     */
    protected $formDataLastAutoSavedTime;
    /**
     * Recipient's full name
     *
     * @var string|null
     */
    protected $name;
    /**
     * Indicates if the data in the email field is valid email and can be used for sending emails
     *
     * @var bool|null
     */
    protected $deliverableEmail;
    /**
     * The unique identifier of the participant. This will be ignored as part of POST or PUT calls. The Id might be null in draft state
     *
     * @var string|null
     */
    protected $id;
    /**
     * The isPrivate flag indicates whether a participant receives the agreement privately or not.
     *
     * @var bool|null
     */
    protected $isPrivate;
    /**
     * Email of the participant. It should be blank for the unknown participants.
     *
     * @var string|null
     */
    protected $email;
    /**
     * @var WidgetParticipantSecurityOption|null
     */
    protected $securityOption;
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
     * Recipient's full name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Recipient's full name
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
     * The unique identifier of the participant. This will be ignored as part of POST or PUT calls. The Id might be null in draft state
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the participant. This will be ignored as part of POST or PUT calls. The Id might be null in draft state
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
     * Email of the participant. It should be blank for the unknown participants.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email of the participant. It should be blank for the unknown participants.
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
}