<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SigningUrlResponse
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
     * An array of urls for signer sets involved in this agreement.
     *
     * @var list<SigningUrlSetInfo>|null
     */
    protected $signingUrlSetInfos;
    /**
     * An array of urls for signer sets involved in this agreement.
     *
     * @return list<SigningUrlSetInfo>|null
     */
    public function getSigningUrlSetInfos(): ?array
    {
        return $this->signingUrlSetInfos;
    }
    /**
     * An array of urls for signer sets involved in this agreement.
     *
     * @param list<SigningUrlSetInfo>|null $signingUrlSetInfos
     *
     * @return self
     */
    public function setSigningUrlSetInfos(?array $signingUrlSetInfos): self
    {
        $this->initialized['signingUrlSetInfos'] = true;
        $this->signingUrlSetInfos = $signingUrlSetInfos;
        return $this;
    }
}