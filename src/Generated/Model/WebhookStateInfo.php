<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WebhookStateInfo
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
     * The state to which the webhook should be changed to
     *
     * @var string|null
     */
    protected $state;
    /**
     * The state to which the webhook should be changed to
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * The state to which the webhook should be changed to
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