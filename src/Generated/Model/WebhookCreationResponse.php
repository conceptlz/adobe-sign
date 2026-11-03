<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WebhookCreationResponse
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
     * An identifier of the webhook resource created
     *
     * @var string|null
     */
    protected $id;
    /**
     * An identifier of the webhook resource created
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * An identifier of the webhook resource created
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