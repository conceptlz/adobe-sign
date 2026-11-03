<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DelegatedParticipantSetInfo
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
     * Participant set's private message - all participants in the set will receive the same message. This cannot be changed as part of the PUT call.
     *
     * @var string|null
     */
    protected $privateMessage;
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set. Required, unless ParticipantSet has the ELECTRONIC_SEALER role. Email and/or phone delivery info field is expected.
     *
     * @var list<DelegatedParticipantInfo>|null
     */
    protected $memberInfos;
    /**
     * Participant set's private message - all participants in the set will receive the same message. This cannot be changed as part of the PUT call.
     *
     * @return string|null
     */
    public function getPrivateMessage(): ?string
    {
        return $this->privateMessage;
    }
    /**
     * Participant set's private message - all participants in the set will receive the same message. This cannot be changed as part of the PUT call.
     *
     * @param string|null $privateMessage
     *
     * @return self
     */
    public function setPrivateMessage(?string $privateMessage): self
    {
        $this->initialized['privateMessage'] = true;
        $this->privateMessage = $privateMessage;
        return $this;
    }
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set. Required, unless ParticipantSet has the ELECTRONIC_SEALER role. Email and/or phone delivery info field is expected.
     *
     * @return list<DelegatedParticipantInfo>|null
     */
    public function getMemberInfos(): ?array
    {
        return $this->memberInfos;
    }
    /**
     * Array of ParticipantInfo objects, containing participant-specific data (e.g. email). All participants in the array belong to the same set. Required, unless ParticipantSet has the ELECTRONIC_SEALER role. Email and/or phone delivery info field is expected.
     *
     * @param list<DelegatedParticipantInfo>|null $memberInfos
     *
     * @return self
     */
    public function setMemberInfos(?array $memberInfos): self
    {
        $this->initialized['memberInfos'] = true;
        $this->memberInfos = $memberInfos;
        return $this;
    }
}