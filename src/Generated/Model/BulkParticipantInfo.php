<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class BulkParticipantInfo
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
     * Email of the participant. Currently only supports sender email.
     *
     * @var string|null
     */
    protected $email;
    /**
     * Email of the participant. Currently only supports sender email.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email of the participant. Currently only supports sender email.
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