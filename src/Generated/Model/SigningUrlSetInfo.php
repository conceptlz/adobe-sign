<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SigningUrlSetInfo
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
     * An array of urls for current signer set.
     *
     * @var list<SigningUrl>|null
     */
    protected $signingUrls;
    /**
     * The name of the current signer set. Returned only, if the API caller is the sender of agreement
     *
     * @var string|null
     */
    protected $signingUrlSetName;
    /**
     * An array of urls for current signer set.
     *
     * @return list<SigningUrl>|null
     */
    public function getSigningUrls(): ?array
    {
        return $this->signingUrls;
    }
    /**
     * An array of urls for current signer set.
     *
     * @param list<SigningUrl>|null $signingUrls
     *
     * @return self
     */
    public function setSigningUrls(?array $signingUrls): self
    {
        $this->initialized['signingUrls'] = true;
        $this->signingUrls = $signingUrls;
        return $this;
    }
    /**
     * The name of the current signer set. Returned only, if the API caller is the sender of agreement
     *
     * @return string|null
     */
    public function getSigningUrlSetName(): ?string
    {
        return $this->signingUrlSetName;
    }
    /**
     * The name of the current signer set. Returned only, if the API caller is the sender of agreement
     *
     * @param string|null $signingUrlSetName
     *
     * @return self
     */
    public function setSigningUrlSetName(?string $signingUrlSetName): self
    {
        $this->initialized['signingUrlSetName'] = true;
        $this->signingUrlSetName = $signingUrlSetName;
        return $this;
    }
}