<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ElectronicSealsResponsePage
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
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * List of electronic seals
     *
     * @var list<ElectronicSealInfo>|null
     */
    protected $electronicSealInfoList;
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
    /**
     * List of electronic seals
     *
     * @return list<ElectronicSealInfo>|null
     */
    public function getElectronicSealInfoList(): ?array
    {
        return $this->electronicSealInfoList;
    }
    /**
     * List of electronic seals
     *
     * @param list<ElectronicSealInfo>|null $electronicSealInfoList
     *
     * @return self
     */
    public function setElectronicSealInfoList(?array $electronicSealInfoList): self
    {
        $this->initialized['electronicSealInfoList'] = true;
        $this->electronicSealInfoList = $electronicSealInfoList;
        return $this;
    }
}