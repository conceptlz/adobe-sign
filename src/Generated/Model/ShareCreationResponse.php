<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ShareCreationResponse
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
     * The unique identifier of the participant
     *
     * @var string|null
     */
    protected $participantId;
    /**
     * The email address that was requested
     *
     * @var string|null
     */
    protected $email;
    /**
     * The unique identifier of the participant
     *
     * @return string|null
     */
    public function getParticipantId(): ?string
    {
        return $this->participantId;
    }
    /**
     * The unique identifier of the participant
     *
     * @param string|null $participantId
     *
     * @return self
     */
    public function setParticipantId(?string $participantId): self
    {
        $this->initialized['participantId'] = true;
        $this->participantId = $participantId;
        return $this;
    }
    /**
     * The email address that was requested
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The email address that was requested
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