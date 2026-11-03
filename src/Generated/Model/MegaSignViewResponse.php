<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignViewResponse
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
     * List of bulk send views
     *
     * @var list<MegaSignView>|null
     */
    protected $megaSignViewList;
    /**
     * List of bulk send views
     *
     * @return list<MegaSignView>|null
     */
    public function getMegaSignViewList(): ?array
    {
        return $this->megaSignViewList;
    }
    /**
     * List of bulk send views
     *
     * @param list<MegaSignView>|null $megaSignViewList
     *
     * @return self
     */
    public function setMegaSignViewList(?array $megaSignViewList): self
    {
        $this->initialized['megaSignViewList'] = true;
        $this->megaSignViewList = $megaSignViewList;
        return $this;
    }
}