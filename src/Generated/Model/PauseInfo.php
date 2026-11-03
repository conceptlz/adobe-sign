<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class PauseInfo
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
     * An enum value indicating the reason for the pause.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * Timestamp (ISO 8601) when pause period ends
     *
     * @var string|null
     */
    protected $expiration;
    /**
     * Secure participant Id. Present only if the cause of the pause was a participant.
     *
     * @var string|null
     */
    protected $triggeredBy;
    /**
     * An enum value indicating the reason for the pause.
     *
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }
    /**
     * An enum value indicating the reason for the pause.
     *
     * @param string|null $reason
     *
     * @return self
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;
        return $this;
    }
    /**
     * Timestamp (ISO 8601) when pause period ends
     *
     * @return string|null
     */
    public function getExpiration(): ?string
    {
        return $this->expiration;
    }
    /**
     * Timestamp (ISO 8601) when pause period ends
     *
     * @param string|null $expiration
     *
     * @return self
     */
    public function setExpiration(?string $expiration): self
    {
        $this->initialized['expiration'] = true;
        $this->expiration = $expiration;
        return $this;
    }
    /**
     * Secure participant Id. Present only if the cause of the pause was a participant.
     *
     * @return string|null
     */
    public function getTriggeredBy(): ?string
    {
        return $this->triggeredBy;
    }
    /**
     * Secure participant Id. Present only if the cause of the pause was a participant.
     *
     * @param string|null $triggeredBy
     *
     * @return self
     */
    public function setTriggeredBy(?string $triggeredBy): self
    {
        $this->initialized['triggeredBy'] = true;
        $this->triggeredBy = $triggeredBy;
        return $this;
    }
}