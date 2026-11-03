<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SignerIdentityReportInfo
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
     * @var SecurityOption|null
     */
    protected $securityOption;
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
}