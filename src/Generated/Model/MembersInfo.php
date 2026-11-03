<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MembersInfo
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
     * Information about the participant Sets.
     *
     * @var list<AgreementDetailedParticipantSetInfo>|null
     */
    protected $participantSets;
    /**
     * Information of CC participants of the agreement.
     *
     * @var list<CCParticipantInfo>|null
     */
    protected $ccsInfo;
    /**
     * Information of next participant sets.
     *
     * @var list<AgreementDetailedParticipantSetInfo>|null
     */
    protected $nextParticipantSets;
    /**
     * @var SenderInfo|null
     */
    protected $senderInfo;
    /**
     * Information of the participants with whom the agreement has been shared.
     *
     * @var list<ShareParticipantInfo>|null
     */
    protected $sharesInfo;
    /**
     * Information about the participant Sets.
     *
     * @return list<AgreementDetailedParticipantSetInfo>|null
     */
    public function getParticipantSets(): ?array
    {
        return $this->participantSets;
    }
    /**
     * Information about the participant Sets.
     *
     * @param list<AgreementDetailedParticipantSetInfo>|null $participantSets
     *
     * @return self
     */
    public function setParticipantSets(?array $participantSets): self
    {
        $this->initialized['participantSets'] = true;
        $this->participantSets = $participantSets;
        return $this;
    }
    /**
     * Information of CC participants of the agreement.
     *
     * @return list<CCParticipantInfo>|null
     */
    public function getCcsInfo(): ?array
    {
        return $this->ccsInfo;
    }
    /**
     * Information of CC participants of the agreement.
     *
     * @param list<CCParticipantInfo>|null $ccsInfo
     *
     * @return self
     */
    public function setCcsInfo(?array $ccsInfo): self
    {
        $this->initialized['ccsInfo'] = true;
        $this->ccsInfo = $ccsInfo;
        return $this;
    }
    /**
     * Information of next participant sets.
     *
     * @return list<AgreementDetailedParticipantSetInfo>|null
     */
    public function getNextParticipantSets(): ?array
    {
        return $this->nextParticipantSets;
    }
    /**
     * Information of next participant sets.
     *
     * @param list<AgreementDetailedParticipantSetInfo>|null $nextParticipantSets
     *
     * @return self
     */
    public function setNextParticipantSets(?array $nextParticipantSets): self
    {
        $this->initialized['nextParticipantSets'] = true;
        $this->nextParticipantSets = $nextParticipantSets;
        return $this;
    }
    /**
     * @return SenderInfo|null
     */
    public function getSenderInfo(): ?SenderInfo
    {
        return $this->senderInfo;
    }
    /**
     * @param SenderInfo|null $senderInfo
     *
     * @return self
     */
    public function setSenderInfo(?SenderInfo $senderInfo): self
    {
        $this->initialized['senderInfo'] = true;
        $this->senderInfo = $senderInfo;
        return $this;
    }
    /**
     * Information of the participants with whom the agreement has been shared.
     *
     * @return list<ShareParticipantInfo>|null
     */
    public function getSharesInfo(): ?array
    {
        return $this->sharesInfo;
    }
    /**
     * Information of the participants with whom the agreement has been shared.
     *
     * @param list<ShareParticipantInfo>|null $sharesInfo
     *
     * @return self
     */
    public function setSharesInfo(?array $sharesInfo): self
    {
        $this->initialized['sharesInfo'] = true;
        $this->sharesInfo = $sharesInfo;
        return $this;
    }
}