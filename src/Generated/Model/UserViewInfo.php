<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserViewInfo
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
     * @var UserCommonViewConfiguration|null
     */
    protected $commonViewConfiguration;
    /**
     * Name of the requested user view
     *
     * @var string|null
     */
    protected $name;
    /**
     * @return UserCommonViewConfiguration|null
     */
    public function getCommonViewConfiguration(): ?UserCommonViewConfiguration
    {
        return $this->commonViewConfiguration;
    }
    /**
     * @param UserCommonViewConfiguration|null $commonViewConfiguration
     *
     * @return self
     */
    public function setCommonViewConfiguration(?UserCommonViewConfiguration $commonViewConfiguration): self
    {
        $this->initialized['commonViewConfiguration'] = true;
        $this->commonViewConfiguration = $commonViewConfiguration;
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
}