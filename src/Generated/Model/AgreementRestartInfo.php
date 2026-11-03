<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementRestartInfo
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
     * Message explaining the reason for the agreement restart
     *
     * @var string|null
     */
    protected $message;
    /**
     * Message explaining the reason for the agreement restart
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * Message explaining the reason for the agreement restart
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