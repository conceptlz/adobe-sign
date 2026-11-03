<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class NewSenderInfo
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
     * The unique identifier of the new sender.
     *
     * @var string|null
     */
    protected $senderId;
    /**
     * The unique identifier of the new sender.
     *
     * @return string|null
     */
    public function getSenderId(): ?string
    {
        return $this->senderId;
    }
    /**
     * The unique identifier of the new sender.
     *
     * @param string|null $senderId
     *
     * @return self
     */
    public function setSenderId(?string $senderId): self
    {
        $this->initialized['senderId'] = true;
        $this->senderId = $senderId;
        return $this;
    }
}