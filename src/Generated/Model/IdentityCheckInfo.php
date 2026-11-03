<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class IdentityCheckInfo
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
     * @var EmailMatch|null
     */
    protected $emailMatch;
    /**
     * @var NameMatch|null
     */
    protected $nameMatch;
    /**
     * @return EmailMatch|null
     */
    public function getEmailMatch(): ?EmailMatch
    {
        return $this->emailMatch;
    }
    /**
     * @param EmailMatch|null $emailMatch
     *
     * @return self
     */
    public function setEmailMatch(?EmailMatch $emailMatch): self
    {
        $this->initialized['emailMatch'] = true;
        $this->emailMatch = $emailMatch;
        return $this;
    }
    /**
     * @return NameMatch|null
     */
    public function getNameMatch(): ?NameMatch
    {
        return $this->nameMatch;
    }
    /**
     * @param NameMatch|null $nameMatch
     *
     * @return self
     */
    public function setNameMatch(?NameMatch $nameMatch): self
    {
        $this->initialized['nameMatch'] = true;
        $this->nameMatch = $nameMatch;
        return $this;
    }
}