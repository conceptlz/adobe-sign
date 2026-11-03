<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetMembersInfo
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
     * Information of CC participants of the web form.
     *
     * @var list<WidegetCCParticipantInfo>|null
     */
    protected $ccsInfo;
    /**
     * Information about the web form additional participant Sets
     *
     * @var list<WidgetDetailedWidgetParticipantSetInfo>|null
     */
    protected $additionalParticipantSets;
    /**
     * @var WidgetDetailedWidgetParticipantSetInfo|null
     */
    protected $widgetParticipantSet;
    /**
     * Information of the participants with whom the web form has been shared.
     *
     * @var list<WidgetShareParticipantInfo>|null
     */
    protected $sharesInfo;
    /**
     * @var WidgeteDocumentSenderInfo|null
     */
    protected $creatorInfo;
    /**
     * Information of CC participants of the web form.
     *
     * @return list<WidegetCCParticipantInfo>|null
     */
    public function getCcsInfo(): ?array
    {
        return $this->ccsInfo;
    }
    /**
     * Information of CC participants of the web form.
     *
     * @param list<WidegetCCParticipantInfo>|null $ccsInfo
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
     * Information about the web form additional participant Sets
     *
     * @return list<WidgetDetailedWidgetParticipantSetInfo>|null
     */
    public function getAdditionalParticipantSets(): ?array
    {
        return $this->additionalParticipantSets;
    }
    /**
     * Information about the web form additional participant Sets
     *
     * @param list<WidgetDetailedWidgetParticipantSetInfo>|null $additionalParticipantSets
     *
     * @return self
     */
    public function setAdditionalParticipantSets(?array $additionalParticipantSets): self
    {
        $this->initialized['additionalParticipantSets'] = true;
        $this->additionalParticipantSets = $additionalParticipantSets;
        return $this;
    }
    /**
     * @return WidgetDetailedWidgetParticipantSetInfo|null
     */
    public function getWidgetParticipantSet(): ?WidgetDetailedWidgetParticipantSetInfo
    {
        return $this->widgetParticipantSet;
    }
    /**
     * @param WidgetDetailedWidgetParticipantSetInfo|null $widgetParticipantSet
     *
     * @return self
     */
    public function setWidgetParticipantSet(?WidgetDetailedWidgetParticipantSetInfo $widgetParticipantSet): self
    {
        $this->initialized['widgetParticipantSet'] = true;
        $this->widgetParticipantSet = $widgetParticipantSet;
        return $this;
    }
    /**
     * Information of the participants with whom the web form has been shared.
     *
     * @return list<WidgetShareParticipantInfo>|null
     */
    public function getSharesInfo(): ?array
    {
        return $this->sharesInfo;
    }
    /**
     * Information of the participants with whom the web form has been shared.
     *
     * @param list<WidgetShareParticipantInfo>|null $sharesInfo
     *
     * @return self
     */
    public function setSharesInfo(?array $sharesInfo): self
    {
        $this->initialized['sharesInfo'] = true;
        $this->sharesInfo = $sharesInfo;
        return $this;
    }
    /**
     * @return WidgeteDocumentSenderInfo|null
     */
    public function getCreatorInfo(): ?WidgeteDocumentSenderInfo
    {
        return $this->creatorInfo;
    }
    /**
     * @param WidgeteDocumentSenderInfo|null $creatorInfo
     *
     * @return self
     */
    public function setCreatorInfo(?WidgeteDocumentSenderInfo $creatorInfo): self
    {
        $this->initialized['creatorInfo'] = true;
        $this->creatorInfo = $creatorInfo;
        return $this;
    }
}