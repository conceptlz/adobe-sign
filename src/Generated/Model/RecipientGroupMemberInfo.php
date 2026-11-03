<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class RecipientGroupMemberInfo
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
     * The email address for the recipient group member.
     *
     * @var string|null
     */
    protected $email;
    /**
     * The email address for the recipient group member.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The email address for the recipient group member.
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