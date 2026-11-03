<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ReminderParticipant
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
     * The unique identifier of the participant
     *
     * @var string|null
     */
    protected $participantId;
    /**
     * @var PhoneDeliveryInfo|null
     */
    protected $phoneDeliveryInfo;
    /**
     * The full name of the participant
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
     * The email address of the participant
     *
     * @var string|null
     */
    protected $email;
    /**
     * The unique identifier of the participant
     *
     * @return string|null
     */
    public function getParticipantId(): ?string
    {
        return $this->participantId;
    }
    /**
     * The unique identifier of the participant
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
     * The full name of the participant
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The full name of the participant
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
     * The email address of the participant
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The email address of the participant
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