<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserView
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
     * Embedded code of url of resource
     *
     * @var string|null
     */
    protected $embeddedCode;
    /**
     * Name of the requested user view
     *
     * @var string|null
     */
    protected $name;
    /**
     * Expiration of user url
     *
     * @var string|null
     */
    protected $expiration;
    /**
     * Url of resource location
     *
     * @var string|null
     */
    protected $url;
    /**
     * Embedded code of url of resource
     *
     * @return string|null
     */
    public function getEmbeddedCode(): ?string
    {
        return $this->embeddedCode;
    }
    /**
     * Embedded code of url of resource 
     *
     * @param string|null $embeddedCode
     *
     * @return self
     */
    public function setEmbeddedCode(?string $embeddedCode): self
    {
        $this->initialized['embeddedCode'] = true;
        $this->embeddedCode = $embeddedCode;
        return $this;
    }
    /**
     * Name of the requested user view
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the requested user view
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Expiration of user url
     *
     * @return string|null
     */
    public function getExpiration(): ?string
    {
        return $this->expiration;
    }
    /**
     * Expiration of user url 
     *
     * @param string|null $expiration
     *
     * @return self
     */
    public function setExpiration(?string $expiration): self
    {
        $this->initialized['expiration'] = true;
        $this->expiration = $expiration;
        return $this;
    }
    /**
     * Url of resource location
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Url of resource location
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
}