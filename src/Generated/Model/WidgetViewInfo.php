<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetViewInfo
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
     * @var WidgetCommonViewConfiguration|null
     */
    protected $commonViewConfiguration;
    /**
     * Name of the requested web form view
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var PersonalizedSigningViewConfiguration|null
     */
    protected $personalizedSigningViewConfiguration;
    /**
     * @return WidgetCommonViewConfiguration|null
     */
    public function getCommonViewConfiguration(): ?WidgetCommonViewConfiguration
    {
        return $this->commonViewConfiguration;
    }
    /**
     * @param WidgetCommonViewConfiguration|null $commonViewConfiguration
     *
     * @return self
     */
    public function setCommonViewConfiguration(?WidgetCommonViewConfiguration $commonViewConfiguration): self
    {
        $this->initialized['commonViewConfiguration'] = true;
        $this->commonViewConfiguration = $commonViewConfiguration;
        return $this;
    }
    /**
     * Name of the requested web form view
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the requested web form view
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
     * @return PersonalizedSigningViewConfiguration|null
     */
    public function getPersonalizedSigningViewConfiguration(): ?PersonalizedSigningViewConfiguration
    {
        return $this->personalizedSigningViewConfiguration;
    }
    /**
     * @param PersonalizedSigningViewConfiguration|null $personalizedSigningViewConfiguration
     *
     * @return self
     */
    public function setPersonalizedSigningViewConfiguration(?PersonalizedSigningViewConfiguration $personalizedSigningViewConfiguration): self
    {
        $this->initialized['personalizedSigningViewConfiguration'] = true;
        $this->personalizedSigningViewConfiguration = $personalizedSigningViewConfiguration;
        return $this;
    }
}