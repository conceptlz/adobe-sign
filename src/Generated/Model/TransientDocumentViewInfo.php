<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class TransientDocumentViewInfo
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
     * @var TransientDocumentViewConfiguration|null
     */
    protected $transientDocumentViewConfiguration;
    /**
     * Name of the requested transientDocument view
     *
     * @var string|null
     */
    protected $name;
    /**
     * @return TransientDocumentViewConfiguration|null
     */
    public function getTransientDocumentViewConfiguration(): ?TransientDocumentViewConfiguration
    {
        return $this->transientDocumentViewConfiguration;
    }
    /**
     * @param TransientDocumentViewConfiguration|null $transientDocumentViewConfiguration
     *
     * @return self
     */
    public function setTransientDocumentViewConfiguration(?TransientDocumentViewConfiguration $transientDocumentViewConfiguration): self
    {
        $this->initialized['transientDocumentViewConfiguration'] = true;
        $this->transientDocumentViewConfiguration = $transientDocumentViewConfiguration;
        return $this;
    }
    /**
     * Name of the requested transientDocument view
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the requested transientDocument view
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