<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementViewInfo
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
     * @var ComposeViewConfiguration|null
     */
    protected $composeViewConfiguration;
    /**
     * @var AgreementViewConfiguration|null
     */
    protected $commonViewConfiguration;
    /**
     * Name of the requested agreement view
     *
     * @var string|null
     */
    protected $name;
    /**
     * @return ComposeViewConfiguration|null
     */
    public function getComposeViewConfiguration(): ?ComposeViewConfiguration
    {
        return $this->composeViewConfiguration;
    }
    /**
     * @param ComposeViewConfiguration|null $composeViewConfiguration
     *
     * @return self
     */
    public function setComposeViewConfiguration(?ComposeViewConfiguration $composeViewConfiguration): self
    {
        $this->initialized['composeViewConfiguration'] = true;
        $this->composeViewConfiguration = $composeViewConfiguration;
        return $this;
    }
    /**
     * @return AgreementViewConfiguration|null
     */
    public function getCommonViewConfiguration(): ?AgreementViewConfiguration
    {
        return $this->commonViewConfiguration;
    }
    /**
     * @param AgreementViewConfiguration|null $commonViewConfiguration
     *
     * @return self
     */
    public function setCommonViewConfiguration(?AgreementViewConfiguration $commonViewConfiguration): self
    {
        $this->initialized['commonViewConfiguration'] = true;
        $this->commonViewConfiguration = $commonViewConfiguration;
        return $this;
    }
    /**
     * Name of the requested agreement view
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the requested agreement view
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