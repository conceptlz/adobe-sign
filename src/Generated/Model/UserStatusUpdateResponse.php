<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserStatusUpdateResponse
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
     * The result of the attempt to activate or deactivate the user
     *
     * @var string|null
     */
    protected $code;
    /**
     * A status value showing the result of this operation
     *
     * @var string|null
     */
    protected $state;
    /**
     * String result message if there was no error
     *
     * @var string|null
     */
    protected $message;
    /**
     * The result of the attempt to activate or deactivate the user
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * The result of the attempt to activate or deactivate the user
     *
     * @param string|null $code
     *
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
        return $this;
    }
    /**
     * A status value showing the result of this operation
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * A status value showing the result of this operation
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
    /**
     * String result message if there was no error
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * String result message if there was no error
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
}