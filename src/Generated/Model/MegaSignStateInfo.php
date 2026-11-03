<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignStateInfo
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
     * The state to which the bulk send is to be updated
     *
     * @var string|null
     */
    protected $state;
    /**
     * @var AgreementCancellationInfo|null
     */
    protected $megaSignCancellationInfo;
    /**
     * The state to which the bulk send is to be updated
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * The state to which the bulk send is to be updated
     *
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * @return AgreementCancellationInfo|null
     */
    public function getMegaSignCancellationInfo(): ?AgreementCancellationInfo
    {
        return $this->megaSignCancellationInfo;
    }
    /**
     * @param AgreementCancellationInfo|null $megaSignCancellationInfo
     *
     * @return self
     */
    public function setMegaSignCancellationInfo(?AgreementCancellationInfo $megaSignCancellationInfo): self
    {
        $this->initialized['megaSignCancellationInfo'] = true;
        $this->megaSignCancellationInfo = $megaSignCancellationInfo;
        return $this;
    }
}