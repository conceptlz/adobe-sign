<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class TransientDocumentViewConfiguration
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
     * The type of generator to use when creating views for transient documents.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The type of generator to use when creating views for transient documents.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The type of generator to use when creating views for transient documents.
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