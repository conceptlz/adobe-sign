<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignViewInfo
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
     * @var CommonViewConfiguration|null
     */
    protected $commonViewConfiguration;
    /**
     * Name of the requested bulk send view
     *
     * @var string|null
     */
    protected $name;
    /**
     * @return CommonViewConfiguration|null
     */
    public function getCommonViewConfiguration(): ?CommonViewConfiguration
    {
        return $this->commonViewConfiguration;
    }
    /**
     * @param CommonViewConfiguration|null $commonViewConfiguration
     *
     * @return self
     */
    public function setCommonViewConfiguration(?CommonViewConfiguration $commonViewConfiguration): self
    {
        $this->initialized['commonViewConfiguration'] = true;
        $this->commonViewConfiguration = $commonViewConfiguration;
        return $this;
    }
    /**
     * Name of the requested bulk send view
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the requested bulk send view
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
}