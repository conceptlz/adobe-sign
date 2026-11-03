<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DigAuthInfo
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
     * Digital Identity Gateway LoginHint. This will be used for Digital Identity Gateway Authentication when present. Must be 255 characters or less.
     *
     * @var string|null
     */
    protected $loginHint;
    /**
     * Digital Identity Gateway Provider Id. When replacing a participant that has DIG_ID authentication specified, you must supply a provider id for the new participant.
     *
     * @var string|null
     */
    protected $providerId;
    /**
     * Digital Identity Gateway Provider Description. This will be ignored as part of POST or PUT calls.
     *
     * @var string|null
     */
    protected $providerDesc;
    /**
     * Digital Identity Gateway Provider Name. This will be ignored as part of POST or PUT calls.
     *
     * @var string|null
     */
    protected $providerName;
    /**
     * Digital Identity Gateway LoginHint. This will be used for Digital Identity Gateway Authentication when present. Must be 255 characters or less.
     *
     * @return string|null
     */
    public function getLoginHint(): ?string
    {
        return $this->loginHint;
    }
    /**
     * Digital Identity Gateway LoginHint. This will be used for Digital Identity Gateway Authentication when present. Must be 255 characters or less.
     *
     * @param string|null $loginHint
     *
     * @return self
     */
    public function setLoginHint(?string $loginHint): self
    {
        $this->initialized['loginHint'] = true;
        $this->loginHint = $loginHint;
        return $this;
    }
    /**
     * Digital Identity Gateway Provider Id. When replacing a participant that has DIG_ID authentication specified, you must supply a provider id for the new participant.
     *
     * @return string|null
     */
    public function getProviderId(): ?string
    {
        return $this->providerId;
    }
    /**
     * Digital Identity Gateway Provider Id. When replacing a participant that has DIG_ID authentication specified, you must supply a provider id for the new participant.
     *
     * @param string|null $providerId
     *
     * @return self
     */
    public function setProviderId(?string $providerId): self
    {
        $this->initialized['providerId'] = true;
        $this->providerId = $providerId;
        return $this;
    }
    /**
     * Digital Identity Gateway Provider Description. This will be ignored as part of POST or PUT calls.
     *
     * @return string|null
     */
    public function getProviderDesc(): ?string
    {
        return $this->providerDesc;
    }
    /**
     * Digital Identity Gateway Provider Description. This will be ignored as part of POST or PUT calls.
     *
     * @param string|null $providerDesc
     *
     * @return self
     */
    public function setProviderDesc(?string $providerDesc): self
    {
        $this->initialized['providerDesc'] = true;
        $this->providerDesc = $providerDesc;
        return $this;
    }
    /**
     * Digital Identity Gateway Provider Name. This will be ignored as part of POST or PUT calls.
     *
     * @return string|null
     */
    public function getProviderName(): ?string
    {
        return $this->providerName;
    }
    /**
     * Digital Identity Gateway Provider Name. This will be ignored as part of POST or PUT calls.
     *
     * @param string|null $providerName
     *
     * @return self
     */
    public function setProviderName(?string $providerName): self
    {
        $this->initialized['providerName'] = true;
        $this->providerName = $providerName;
        return $this;
    }
}