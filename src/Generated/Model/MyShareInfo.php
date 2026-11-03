<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MyShareInfo
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
     * Information of the participants with whom the agreement has been shared.
     *
     * @var list<ShareParticipantInfo>|null
     */
    protected $shareParticipantInfo;
    /**
     * Information of the participants with whom the agreement has been shared directly by the originator.
     *
     * @var list<ShareParticipantInfo>|null
     */
    protected $mySharesInfo;
    /**
     * Information of the participants with whom the agreement has been shared.
     *
     * @return list<ShareParticipantInfo>|null
     */
    public function getShareParticipantInfo(): ?array
    {
        return $this->shareParticipantInfo;
    }
    /**
     * Information of the participants with whom the agreement has been shared.
     *
     * @param list<ShareParticipantInfo>|null $shareParticipantInfo
     *
     * @return self
     */
    public function setShareParticipantInfo(?array $shareParticipantInfo): self
    {
        $this->initialized['shareParticipantInfo'] = true;
        $this->shareParticipantInfo = $shareParticipantInfo;
        return $this;
    }
    /**
     * Information of the participants with whom the agreement has been shared directly by the originator.
     *
     * @return list<ShareParticipantInfo>|null
     */
    public function getMySharesInfo(): ?array
    {
        return $this->mySharesInfo;
    }
    /**
     * Information of the participants with whom the agreement has been shared directly by the originator.
     *
     * @param list<ShareParticipantInfo>|null $mySharesInfo
     *
     * @return self
     */
    public function setMySharesInfo(?array $mySharesInfo): self
    {
        $this->initialized['mySharesInfo'] = true;
        $this->mySharesInfo = $mySharesInfo;
        return $this;
    }
}