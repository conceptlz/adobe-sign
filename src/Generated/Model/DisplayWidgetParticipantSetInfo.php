<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DisplayWidgetParticipantSetInfo
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
     * Displays the info about user set
     *
     * @var list<DisplayParticipantInfo>|null
     */
    protected $displayUserSetMemberInfos;
    /**
     * Displays the info about user set
     *
     * @return list<DisplayParticipantInfo>|null
     */
    public function getDisplayUserSetMemberInfos(): ?array
    {
        return $this->displayUserSetMemberInfos;
    }
    /**
     * Displays the info about user set
     *
     * @param list<DisplayParticipantInfo>|null $displayUserSetMemberInfos
     *
     * @return self
     */
    public function setDisplayUserSetMemberInfos(?array $displayUserSetMemberInfos): self
    {
        $this->initialized['displayUserSetMemberInfos'] = true;
        $this->displayUserSetMemberInfos = $displayUserSetMemberInfos;
        return $this;
    }
}