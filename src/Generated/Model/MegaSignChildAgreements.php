<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignChildAgreements
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
     * A array of bulk send child agreements
     *
     * @var list<MegaSignChildAgreement>|null
     */
    protected $megaSignChildAgreementList;
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
     * A array of bulk send child agreements
     *
     * @return list<MegaSignChildAgreement>|null
     */
    public function getMegaSignChildAgreementList(): ?array
    {
        return $this->megaSignChildAgreementList;
    }
    /**
     * A array of bulk send child agreements
     *
     * @param list<MegaSignChildAgreement>|null $megaSignChildAgreementList
     *
     * @return self
     */
    public function setMegaSignChildAgreementList(?array $megaSignChildAgreementList): self
    {
        $this->initialized['megaSignChildAgreementList'] = true;
        $this->megaSignChildAgreementList = $megaSignChildAgreementList;
        return $this;
    }
}