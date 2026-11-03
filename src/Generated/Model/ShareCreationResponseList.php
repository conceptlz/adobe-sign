<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ShareCreationResponseList
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
     * List of ShareCreationResponse
     *
     * @var list<ShareCreationResponse>|null
     */
    protected $shareCreationResponseList;
    /**
     * List of ShareCreationResponse
     *
     * @return list<ShareCreationResponse>|null
     */
    public function getShareCreationResponseList(): ?array
    {
        return $this->shareCreationResponseList;
    }
    /**
     * List of ShareCreationResponse
     *
     * @param list<ShareCreationResponse>|null $shareCreationResponseList
     *
     * @return self
     */
    public function setShareCreationResponseList(?array $shareCreationResponseList): self
    {
        $this->initialized['shareCreationResponseList'] = true;
        $this->shareCreationResponseList = $shareCreationResponseList;
        return $this;
    }
}