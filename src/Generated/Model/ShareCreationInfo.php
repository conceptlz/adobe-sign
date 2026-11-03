<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ShareCreationInfo
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
     * Optional message to the sharee
     *
     * @var string|null
     */
    protected $message;
    /**
     * The email address of the member with whom the agreement will be shared
     *
     * @var string|null
     */
    protected $email;
    /**
     * Optional message to the sharee
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * Optional message to the sharee
     *
     * @param string|null $message
     *
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
    /**
     * The email address of the member with whom the agreement will be shared
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The email address of the member with whom the agreement will be shared
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