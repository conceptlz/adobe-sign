<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ParticipantAccessInfo
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
     * The participant identifier. Note: At once, only one identifier is acceptable - either participantId or participantSetId
     *
     * @var string|null
     */
    protected $participantId;
    /**
     * Array of participant access option. It can be one or more access options for participantSet
     *
     * @var list<string>|null
     */
    protected $accessOption;
    /**
     * The participantSet identifier. Note: At once, only one identifier is acceptable - either participantId or participantSetId
     *
     * @var string|null
     */
    protected $participantSetId;
    /**
     * The participant identifier. Note: At once, only one identifier is acceptable - either participantId or participantSetId
     *
     * @return string|null
     */
    public function getParticipantId(): ?string
    {
        return $this->participantId;
    }
    /**
     * The participant identifier. Note: At once, only one identifier is acceptable - either participantId or participantSetId
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
     * Array of participant access option. It can be one or more access options for participantSet
     *
     * @return list<string>|null
     */
    public function getAccessOption(): ?array
    {
        return $this->accessOption;
    }
    /**
     * Array of participant access option. It can be one or more access options for participantSet
     *
     * @param list<string>|null $accessOption
     *
     * @return self
     */
    public function setAccessOption(?array $accessOption): self
    {
        $this->initialized['accessOption'] = true;
        $this->accessOption = $accessOption;
        return $this;
    }
    /**
     * The participantSet identifier. Note: At once, only one identifier is acceptable - either participantId or participantSetId
     *
     * @return string|null
     */
    public function getParticipantSetId(): ?string
    {
        return $this->participantSetId;
    }
    /**
     * The participantSet identifier. Note: At once, only one identifier is acceptable - either participantId or participantSetId
     *
     * @param string|null $participantSetId
     *
     * @return self
     */
    public function setParticipantSetId(?string $participantSetId): self
    {
        $this->initialized['participantSetId'] = true;
        $this->participantSetId = $participantSetId;
        return $this;
    }
}