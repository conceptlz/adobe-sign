<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignMembersInfo
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
     * @var list<DetailedParticipantSetInfo>|null
     */
    protected $participantSets;
    /**
     * Information of CC participants of the bulk send.
     *
     * @var list<MegaSignCCParticipantInfo>|null
     */
    protected $ccsInfo;
    /**
     * @var MegaSignDocumentSenderInfo|null
     */
    protected $senderInfo;
    /**
     * Information of the participants with whom the bulk send has been shared.
     *
     * @var list<MegaSignShareParticipantInfo>|null
     */
    protected $sharesInfo;
    /**
     * Information about the participant Sets.
     *
     * @return list<DetailedParticipantSetInfo>|null
     */
    public function getParticipantSets(): ?array
    {
        return $this->participantSets;
    }
    /**
     * Information about the participant Sets.
     *
     * @param list<DetailedParticipantSetInfo>|null $participantSets
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
     * Information of CC participants of the bulk send.
     *
     * @return list<MegaSignCCParticipantInfo>|null
     */
    public function getCcsInfo(): ?array
    {
        return $this->ccsInfo;
    }
    /**
     * Information of CC participants of the bulk send.
     *
     * @param list<MegaSignCCParticipantInfo>|null $ccsInfo
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
     * @return MegaSignDocumentSenderInfo|null
     */
    public function getSenderInfo(): ?MegaSignDocumentSenderInfo
    {
        return $this->senderInfo;
    }
    /**
     * @param MegaSignDocumentSenderInfo|null $senderInfo
     *
     * @return self
     */
    public function setSenderInfo(?MegaSignDocumentSenderInfo $senderInfo): self
    {
        $this->initialized['senderInfo'] = true;
        $this->senderInfo = $senderInfo;
        return $this;
    }
    /**
     * Information of the participants with whom the bulk send has been shared.
     *
     * @return list<MegaSignShareParticipantInfo>|null
     */
    public function getSharesInfo(): ?array
    {
        return $this->sharesInfo;
    }
    /**
     * Information of the participants with whom the bulk send has been shared.
     *
     * @param list<MegaSignShareParticipantInfo>|null $sharesInfo
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