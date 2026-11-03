<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DelegatedParticipantInfo
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
     * The full name of the delegatee, if available.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * Email of the participant. In case of modifying a participant set (PUT) this is a required field. In case of GET, this is the required field and will always be returned unless it is a fax workflow (legacy agreements) that were created using fax as input
     *
     * @var string|null
     */
    protected $email;
    /**
     * @var DelegatedParticipantSecurityOption|null
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
     * The full name of the delegatee, if available.
     *
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }
    /**
     * The full name of the delegatee, if available.
     *
     * @param string|null $fullName
     *
     * @return self
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;
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
    /**
     * @return DelegatedParticipantSecurityOption|null
     */
    public function getSecurityOption(): ?DelegatedParticipantSecurityOption
    {
        return $this->securityOption;
    }
    /**
     * @param DelegatedParticipantSecurityOption|null $securityOption
     *
     * @return self
     */
    public function setSecurityOption(?DelegatedParticipantSecurityOption $securityOption): self
    {
        $this->initialized['securityOption'] = true;
        $this->securityOption = $securityOption;
        return $this;
    }
}