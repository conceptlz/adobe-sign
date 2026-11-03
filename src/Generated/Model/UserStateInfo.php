<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserStateInfo
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
     * An optional comment describing why you want to activate/deactivate a given user
     *
     * @var string|null
     */
    protected $comment;
    /**
     * The state to which the user is to be updated. The valid states for this variable is currently, ACTIVE and INACTIVE
     *
     * @var string|null
     */
    protected $state;
    /**
     * An optional comment describing why you want to activate/deactivate a given user
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }
    /**
     * An optional comment describing why you want to activate/deactivate a given user
     *
     * @param string|null $comment
     *
     * @return self
     */
    public function setComment(?string $comment): self
    {
        $this->initialized['comment'] = true;
        $this->comment = $comment;
        return $this;
    }
    /**
     * The state to which the user is to be updated. The valid states for this variable is currently, ACTIVE and INACTIVE
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * The state to which the user is to be updated. The valid states for this variable is currently, ACTIVE and INACTIVE
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