<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetStateInfo
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
     * @var WidgetInActiveInfo|null
     */
    protected $widgetInActiveInfo;
    /**
     * State of the Web Form
     *
     * @var string|null
     */
    protected $state;
    /**
     * @return WidgetInActiveInfo|null
     */
    public function getWidgetInActiveInfo(): ?WidgetInActiveInfo
    {
        return $this->widgetInActiveInfo;
    }
    /**
     * @param WidgetInActiveInfo|null $widgetInActiveInfo
     *
     * @return self
     */
    public function setWidgetInActiveInfo(?WidgetInActiveInfo $widgetInActiveInfo): self
    {
        $this->initialized['widgetInActiveInfo'] = true;
        $this->widgetInActiveInfo = $widgetInActiveInfo;
        return $this;
    }
    /**
     * State of the Web Form
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * State of the Web Form
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
}