<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DisplayAgreementParticipantSetInfo
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
     * @var list<AgreementDisplayParticipantInfo>|null
     */
    protected $displayUserSetMemberInfos;
    /**
     * The name of the display user set. Returned only, if the API caller is the sender of agreement.
     *
     * @var string|null
     */
    protected $displayUserSetName;
    /**
     * Displays the info about user set
     *
     * @return list<AgreementDisplayParticipantInfo>|null
     */
    public function getDisplayUserSetMemberInfos(): ?array
    {
        return $this->displayUserSetMemberInfos;
    }
    /**
     * Displays the info about user set
     *
     * @param list<AgreementDisplayParticipantInfo>|null $displayUserSetMemberInfos
     *
     * @return self
     */
    public function setDisplayUserSetMemberInfos(?array $displayUserSetMemberInfos): self
    {
        $this->initialized['displayUserSetMemberInfos'] = true;
        $this->displayUserSetMemberInfos = $displayUserSetMemberInfos;
        return $this;
    }
    /**
     * The name of the display user set. Returned only, if the API caller is the sender of agreement.
     *
     * @return string|null
     */
    public function getDisplayUserSetName(): ?string
    {
        return $this->displayUserSetName;
    }
    /**
     * The name of the display user set. Returned only, if the API caller is the sender of agreement. 
     *
     * @param string|null $displayUserSetName
     *
     * @return self
     */
    public function setDisplayUserSetName(?string $displayUserSetName): self
    {
        $this->initialized['displayUserSetName'] = true;
        $this->displayUserSetName = $displayUserSetName;
        return $this;
    }
}