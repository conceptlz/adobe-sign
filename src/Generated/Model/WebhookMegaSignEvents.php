<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WebhookMegaSignEvents
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
     * Determines whether megaign detailed info will be returned in the response payload
     *
     * @var bool|null
     */
    protected $includeDetailedInfo;
    /**
     * Determines whether megaign detailed info will be returned in the response payload
     *
     * @return bool|null
     */
    public function getIncludeDetailedInfo(): ?bool
    {
        return $this->includeDetailedInfo;
    }
    /**
     * Determines whether megaign detailed info will be returned in the response payload
     *
     * @param bool|null $includeDetailedInfo
     *
     * @return self
     */
    public function setIncludeDetailedInfo(?bool $includeDetailedInfo): self
    {
        $this->initialized['includeDetailedInfo'] = true;
        $this->includeDetailedInfo = $includeDetailedInfo;
        return $this;
    }
}