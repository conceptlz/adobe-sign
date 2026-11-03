<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class EmailMatch
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
     * Allow matching of custom alternate email of the participant for the email matching identity check
     *
     * @var bool|null
     */
    protected $allowCustomAlternateEmail;
    /**
     * Allow registered alternate email of the participant for the email matching identity check
     *
     * @var bool|null
     */
    protected $allowRegisteredAlternateEmail;
    /**
     * Alternate emails of the participant for the email matching identity check
     *
     * @var list<string>|null
     */
    protected $alternateEmails;
    /**
     * Allow email matching of the participant for the email matching identity check
     *
     * @var bool|null
     */
    protected $requireEmailMatching;
    /**
     * Allow matching of custom alternate email of the participant for the email matching identity check
     *
     * @return bool|null
     */
    public function getAllowCustomAlternateEmail(): ?bool
    {
        return $this->allowCustomAlternateEmail;
    }
    /**
     * Allow matching of custom alternate email of the participant for the email matching identity check
     *
     * @param bool|null $allowCustomAlternateEmail
     *
     * @return self
     */
    public function setAllowCustomAlternateEmail(?bool $allowCustomAlternateEmail): self
    {
        $this->initialized['allowCustomAlternateEmail'] = true;
        $this->allowCustomAlternateEmail = $allowCustomAlternateEmail;
        return $this;
    }
    /**
     * Allow registered alternate email of the participant for the email matching identity check
     *
     * @return bool|null
     */
    public function getAllowRegisteredAlternateEmail(): ?bool
    {
        return $this->allowRegisteredAlternateEmail;
    }
    /**
     * Allow registered alternate email of the participant for the email matching identity check
     *
     * @param bool|null $allowRegisteredAlternateEmail
     *
     * @return self
     */
    public function setAllowRegisteredAlternateEmail(?bool $allowRegisteredAlternateEmail): self
    {
        $this->initialized['allowRegisteredAlternateEmail'] = true;
        $this->allowRegisteredAlternateEmail = $allowRegisteredAlternateEmail;
        return $this;
    }
    /**
     * Alternate emails of the participant for the email matching identity check
     *
     * @return list<string>|null
     */
    public function getAlternateEmails(): ?array
    {
        return $this->alternateEmails;
    }
    /**
     * Alternate emails of the participant for the email matching identity check
     *
     * @param list<string>|null $alternateEmails
     *
     * @return self
     */
    public function setAlternateEmails(?array $alternateEmails): self
    {
        $this->initialized['alternateEmails'] = true;
        $this->alternateEmails = $alternateEmails;
        return $this;
    }
    /**
     * Allow email matching of the participant for the email matching identity check
     *
     * @return bool|null
     */
    public function getRequireEmailMatching(): ?bool
    {
        return $this->requireEmailMatching;
    }
    /**
     * Allow email matching of the participant for the email matching identity check
     *
     * @param bool|null $requireEmailMatching
     *
     * @return self
     */
    public function setRequireEmailMatching(?bool $requireEmailMatching): self
    {
        $this->initialized['requireEmailMatching'] = true;
        $this->requireEmailMatching = $requireEmailMatching;
        return $this;
    }
}