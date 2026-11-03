<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignCreationResponse
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
     * Unique identifier of the bulk send parent agreement
     *
     * @var string|null
     */
    protected $id;
    /**
     * Unique identifier of the bulk send parent agreement
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Unique identifier of the bulk send parent agreement
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
}