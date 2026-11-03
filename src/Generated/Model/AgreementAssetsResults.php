<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementAssetsResults
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
     * An array of AgreementAssetsResult items.
     *
     * @var list<AgreementAssetsResult>|null
     */
    protected $agreementAssetsResultList;
    /**
     * Total number of search results for AGREEMENT_ASSETS scope.
     *
     * @var int|null
     */
    protected $totalHits;
    /**
     * @var SearchPageInfo|null
     */
    protected $searchPageInfo;
    /**
     * @var SearchStatusInfo|null
     */
    protected $status;
    /**
     * An array of AgreementAssetsResult items.
     *
     * @return list<AgreementAssetsResult>|null
     */
    public function getAgreementAssetsResultList(): ?array
    {
        return $this->agreementAssetsResultList;
    }
    /**
     * An array of AgreementAssetsResult items.
     *
     * @param list<AgreementAssetsResult>|null $agreementAssetsResultList
     *
     * @return self
     */
    public function setAgreementAssetsResultList(?array $agreementAssetsResultList): self
    {
        $this->initialized['agreementAssetsResultList'] = true;
        $this->agreementAssetsResultList = $agreementAssetsResultList;
        return $this;
    }
    /**
     * Total number of search results for AGREEMENT_ASSETS scope.
     *
     * @return int|null
     */
    public function getTotalHits(): ?int
    {
        return $this->totalHits;
    }
    /**
     * Total number of search results for AGREEMENT_ASSETS scope.
     *
     * @param int|null $totalHits
     *
     * @return self
     */
    public function setTotalHits(?int $totalHits): self
    {
        $this->initialized['totalHits'] = true;
        $this->totalHits = $totalHits;
        return $this;
    }
    /**
     * @return SearchPageInfo|null
     */
    public function getSearchPageInfo(): ?SearchPageInfo
    {
        return $this->searchPageInfo;
    }
    /**
     * @param SearchPageInfo|null $searchPageInfo
     *
     * @return self
     */
    public function setSearchPageInfo(?SearchPageInfo $searchPageInfo): self
    {
        $this->initialized['searchPageInfo'] = true;
        $this->searchPageInfo = $searchPageInfo;
        return $this;
    }
    /**
     * @return SearchStatusInfo|null
     */
    public function getStatus(): ?SearchStatusInfo
    {
        return $this->status;
    }
    /**
     * @param SearchStatusInfo|null $status
     *
     * @return self
     */
    public function setStatus(?SearchStatusInfo $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}