<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class HeaderDto
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
     * @var string|null
     */
    protected $headerName;
    /**
     * @var string|null
     */
    protected $headerValue;
    /**
     * @return string|null
     */
    public function getHeaderName(): ?string
    {
        return $this->headerName;
    }
    /**
     * @param string|null $headerName
     *
     * @return self
     */
    public function setHeaderName(?string $headerName): self
    {
        $this->initialized['headerName'] = true;
        $this->headerName = $headerName;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getHeaderValue(): ?string
    {
        return $this->headerValue;
    }
    /**
     * @param string|null $headerValue
     *
     * @return self
     */
    public function setHeaderValue(?string $headerValue): self
    {
        $this->initialized['headerValue'] = true;
        $this->headerValue = $headerValue;
        return $this;
    }
}