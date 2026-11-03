<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetParticipantSetInfo
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
     * Role assumed by all participants in the set (signer, approver, etc.) Web Form First Participant will only have roles - Signer, Approver, Acceptor and Form Filler
     *
     * @var string|null
     */
    protected $role;
    /**
     * Array of ParticipantInfo objects, containing participant - specific data (email, e.g.). All participants in the array belong to the same set. Currently we are supporting only one member in the set. Since the email of the web form signer is unknown at the time of web form creation, the email should be left empty and its optional security options should be provided.
     *
     * @var list<WidgetParticipantInfo>|null
     */
    protected $memberInfos;
    /**
     * Role assumed by all participants in the set (signer, approver, etc.) Web Form First Participant will only have roles - Signer, Approver, Acceptor and Form Filler
     *
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }
    /**
     * Role assumed by all participants in the set (signer, approver, etc.) Web Form First Participant will only have roles - Signer, Approver, Acceptor and Form Filler
     *
     * @param string|null $role
     *
     * @return self
     */
    public function setRole(?string $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;
        return $this;
    }
    /**
     * Array of ParticipantInfo objects, containing participant - specific data (email, e.g.). All participants in the array belong to the same set. Currently we are supporting only one member in the set. Since the email of the web form signer is unknown at the time of web form creation, the email should be left empty and its optional security options should be provided.
     *
     * @return list<WidgetParticipantInfo>|null
     */
    public function getMemberInfos(): ?array
    {
        return $this->memberInfos;
    }
    /**
     * Array of ParticipantInfo objects, containing participant - specific data (email, e.g.). All participants in the array belong to the same set. Currently we are supporting only one member in the set. Since the email of the web form signer is unknown at the time of web form creation, the email should be left empty and its optional security options should be provided. 
     *
     * @param list<WidgetParticipantInfo>|null $memberInfos
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