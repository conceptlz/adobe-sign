<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SendOptions
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
     * Control notification mails for Agreement initiation events - ACTION_REQUESTED and CREATED
     *
     * @var string|null
     */
    protected $initEmails;
    /**
     * Control notification mails for agreement-in-process events - DELEGATED, REPLACED
     *
     * @var string|null
     */
    protected $inFlightEmails;
    /**
     * Control notification mails for agreement completion events - COMPLETED, CANCELLED, EXPIRED and REJECTED
     *
     * @var string|null
     */
    protected $completionEmails;
    /**
     * Control notification mails for Agreement initiation events - ACTION_REQUESTED and CREATED
     *
     * @return string|null
     */
    public function getInitEmails(): ?string
    {
        return $this->initEmails;
    }
    /**
     * Control notification mails for Agreement initiation events - ACTION_REQUESTED and CREATED
     *
     * @param string|null $initEmails
     *
     * @return self
     */
    public function setInitEmails(?string $initEmails): self
    {
        $this->initialized['initEmails'] = true;
        $this->initEmails = $initEmails;
        return $this;
    }
    /**
     * Control notification mails for agreement-in-process events - DELEGATED, REPLACED
     *
     * @return string|null
     */
    public function getInFlightEmails(): ?string
    {
        return $this->inFlightEmails;
    }
    /**
     * Control notification mails for agreement-in-process events - DELEGATED, REPLACED
     *
     * @param string|null $inFlightEmails
     *
     * @return self
     */
    public function setInFlightEmails(?string $inFlightEmails): self
    {
        $this->initialized['inFlightEmails'] = true;
        $this->inFlightEmails = $inFlightEmails;
        return $this;
    }
    /**
     * Control notification mails for agreement completion events - COMPLETED, CANCELLED, EXPIRED and REJECTED
     *
     * @return string|null
     */
    public function getCompletionEmails(): ?string
    {
        return $this->completionEmails;
    }
    /**
     * Control notification mails for agreement completion events - COMPLETED, CANCELLED, EXPIRED and REJECTED
     *
     * @param string|null $completionEmails
     *
     * @return self
     */
    public function setCompletionEmails(?string $completionEmails): self
    {
        $this->initialized['completionEmails'] = true;
        $this->completionEmails = $completionEmails;
        return $this;
    }
}