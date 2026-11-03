<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DelegatedParticipantSecurityOption
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
     * @var PhoneInfo|null
     */
    protected $phoneInfo;
    /**
     * @return PhoneInfo|null
     */
    public function getPhoneInfo(): ?PhoneInfo
    {
        return $this->phoneInfo;
    }
    /**
     * @param PhoneInfo|null $phoneInfo
     *
     * @return self
     */
    public function setPhoneInfo(?PhoneInfo $phoneInfo): self
    {
        $this->initialized['phoneInfo'] = true;
        $this->phoneInfo = $phoneInfo;
        return $this;
    }
}