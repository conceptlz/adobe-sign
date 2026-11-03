<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSigns
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
     * An array of Send in Bulk parent agreements
     *
     * @var list<MegaSign>|null
     */
    protected $megaSignList;
    /**
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * An array of Send in Bulk parent agreements
     *
     * @return list<MegaSign>|null
     */
    public function getMegaSignList(): ?array
    {
        return $this->megaSignList;
    }
    /**
     * An array of Send in Bulk parent agreements
     *
     * @param list<MegaSign>|null $megaSignList
     *
     * @return self
     */
    public function setMegaSignList(?array $megaSignList): self
    {
        $this->initialized['megaSignList'] = true;
        $this->megaSignList = $megaSignList;
        return $this;
    }
    /**
     * Pagination information for navigating through the response.
     *
     * @return PageInfo|null
     */
    public function getPage(): ?PageInfo
    {
        return $this->page;
    }
    /**
     * Pagination information for navigating through the response.
     *
     * @param PageInfo|null $page
     *
     * @return self
     */
    public function setPage(?PageInfo $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;
        return $this;
    }
}