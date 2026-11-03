<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DisplayParticipantInfo
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
     * Displays the full name of the user, if available.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * Displays the name of the company of the user, if available
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
     * Displays the email of the user
     *
     * @var string|null
     */
    protected $email;
    /**
     * Displays the full name of the user, if available.
     *
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }
    /**
     * Displays the full name of the user, if available. 
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
     * Displays the name of the company of the user, if available
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * Displays the name of the company of the user, if available
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
     * Displays the email of the user
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Displays the email of the user
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