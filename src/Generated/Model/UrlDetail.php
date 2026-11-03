<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UrlDetail
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
     * Deliverable access option name associated with the url
     *
     * @var string|null
     */
    protected $accessOption;
    /**
     * Deliverable access action url
     *
     * @var string|null
     */
    protected $url;
    /**
     * Deliverable access option name associated with the url
     *
     * @return string|null
     */
    public function getAccessOption(): ?string
    {
        return $this->accessOption;
    }
    /**
     * Deliverable access option name associated with the url
     *
     * @param string|null $accessOption
     *
     * @return self
     */
    public function setAccessOption(?string $accessOption): self
    {
        $this->initialized['accessOption'] = true;
        $this->accessOption = $accessOption;
        return $this;
    }
    /**
     * Deliverable access action url
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Deliverable access action url
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