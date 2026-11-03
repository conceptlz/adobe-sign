<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ParticipantAccessInfoList
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
     * Access type can be either URL or ACCESS_CODE.
     *
     * @var string|null
     */
    protected $accessType;
    /**
     * List of participant access infos
     *
     * @var list<ParticipantAccessInfo>|null
     */
    protected $participantAccessInfos;
    /**
     * Access type can be either URL or ACCESS_CODE.
     *
     * @return string|null
     */
    public function getAccessType(): ?string
    {
        return $this->accessType;
    }
    /**
     * Access type can be either URL or ACCESS_CODE.
     *
     * @param string|null $accessType
     *
     * @return self
     */
    public function setAccessType(?string $accessType): self
    {
        $this->initialized['accessType'] = true;
        $this->accessType = $accessType;
        return $this;
    }
    /**
     * List of participant access infos
     *
     * @return list<ParticipantAccessInfo>|null
     */
    public function getParticipantAccessInfos(): ?array
    {
        return $this->participantAccessInfos;
    }
    /**
     * List of participant access infos
     *
     * @param list<ParticipantAccessInfo>|null $participantAccessInfos
     *
     * @return self
     */
    public function setParticipantAccessInfos(?array $participantAccessInfos): self
    {
        $this->initialized['participantAccessInfos'] = true;
        $this->participantAccessInfos = $participantAccessInfos;
        return $this;
    }
}