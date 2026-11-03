<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class EmailOption
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
     * @var SendOptions|null
     */
    protected $sendOptions;
    /**
     * @return SendOptions|null
     */
    public function getSendOptions(): ?SendOptions
    {
        return $this->sendOptions;
    }
    /**
     * @param SendOptions|null $sendOptions
     *
     * @return self
     */
    public function setSendOptions(?SendOptions $sendOptions): self
    {
        $this->initialized['sendOptions'] = true;
        $this->sendOptions = $sendOptions;
        return $this;
    }
}