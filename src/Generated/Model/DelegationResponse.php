<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DelegationResponse
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
     * The unique identifier of the participant set to which the agreement was forwarded.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The unique identifier of the participant set to which the agreement was forwarded.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the participant set to which the agreement was forwarded.
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