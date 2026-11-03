<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AccessInfoList
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
     * The unique identifier of the participant set. This cannot be changed as part of the PUT call.
     *
     * @var string|null
     */
    protected $participantSetId;
    /**
     * List of accessInfo JSON object
     *
     * @var list<AccessInfo>|null
     */
    protected $accessInfos;
    /**
     * The unique identifier of the participant set. This cannot be changed as part of the PUT call.
     *
     * @return string|null
     */
    public function getParticipantSetId(): ?string
    {
        return $this->participantSetId;
    }
    /**
     * The unique identifier of the participant set. This cannot be changed as part of the PUT call.
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
    /**
     * List of accessInfo JSON object
     *
     * @return list<AccessInfo>|null
     */
    public function getAccessInfos(): ?array
    {
        return $this->accessInfos;
    }
    /**
     * List of accessInfo JSON object
     *
     * @param list<AccessInfo>|null $accessInfos
     *
     * @return self
     */
    public function setAccessInfos(?array $accessInfos): self
    {
        $this->initialized['accessInfos'] = true;
        $this->accessInfos = $accessInfos;
        return $this;
    }
}