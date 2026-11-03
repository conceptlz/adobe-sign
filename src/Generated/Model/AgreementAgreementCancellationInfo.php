<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementAgreementCancellationInfo
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
     * An optional comment describing to the recipients why you want to cancel the transaction
     *
     * @var string|null
     */
    protected $comment;
    /**
     * Whether or not you would like the recipients to be notified that the transaction has been cancelled. The default value is false
     *
     * @var bool|null
     */
    protected $notifyOthers;
    /**
     * An optional comment describing to the recipients why you want to cancel the transaction
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }
    /**
     * An optional comment describing to the recipients why you want to cancel the transaction
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
     * Whether or not you would like the recipients to be notified that the transaction has been cancelled. The default value is false
     *
     * @return bool|null
     */
    public function getNotifyOthers(): ?bool
    {
        return $this->notifyOthers;
    }
    /**
     * Whether or not you would like the recipients to be notified that the transaction has been cancelled. The default value is false
     *
     * @param bool|null $notifyOthers
     *
     * @return self
     */
    public function setNotifyOthers(?bool $notifyOthers): self
    {
        $this->initialized['notifyOthers'] = true;
        $this->notifyOthers = $notifyOthers;
        return $this;
    }
}