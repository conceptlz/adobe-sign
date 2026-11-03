<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignCcInfo
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
     * Email of the CC participant of the bulk send.
     *
     * @var string|null
     */
    protected $email;
    /**
     * Email of the CC participant of the bulk send.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email of the CC participant of the bulk send.
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
}