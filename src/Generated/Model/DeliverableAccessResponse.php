<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DeliverableAccessResponse
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
     * List of accessInfo JSON object
     *
     * @var list<AccessInfoList>|null
     */
    protected $accessInfoList;
    /**
     * List of accessInfo JSON object
     *
     * @return list<AccessInfoList>|null
     */
    public function getAccessInfoList(): ?array
    {
        return $this->accessInfoList;
    }
    /**
     * List of accessInfo JSON object
     *
     * @param list<AccessInfoList>|null $accessInfoList
     *
     * @return self
     */
    public function setAccessInfoList(?array $accessInfoList): self
    {
        $this->initialized['accessInfoList'] = true;
        $this->accessInfoList = $accessInfoList;
        return $this;
    }
}