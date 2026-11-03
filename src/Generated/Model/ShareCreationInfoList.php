<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ShareCreationInfoList
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
     * List of ShareCreationInfo
     *
     * @var list<ShareCreationInfo>|null
     */
    protected $shareCreationInfo;
    /**
     * List of ShareCreationInfo
     *
     * @return list<ShareCreationInfo>|null
     */
    public function getShareCreationInfo(): ?array
    {
        return $this->shareCreationInfo;
    }
    /**
     * List of ShareCreationInfo
     *
     * @param list<ShareCreationInfo>|null $shareCreationInfo
     *
     * @return self
     */
    public function setShareCreationInfo(?array $shareCreationInfo): self
    {
        $this->initialized['shareCreationInfo'] = true;
        $this->shareCreationInfo = $shareCreationInfo;
        return $this;
    }
}