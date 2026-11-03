<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SearchResults
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
     * @var AgreementAssetsResults|null
     */
    protected $agreementAssetsResults;
    /**
     * Total number of search results across all scopes.
     *
     * @var int|null
     */
    protected $totalHits;
    /**
     * @return AgreementAssetsResults|null
     */
    public function getAgreementAssetsResults(): ?AgreementAssetsResults
    {
        return $this->agreementAssetsResults;
    }
    /**
     * @param AgreementAssetsResults|null $agreementAssetsResults
     *
     * @return self
     */
    public function setAgreementAssetsResults(?AgreementAssetsResults $agreementAssetsResults): self
    {
        $this->initialized['agreementAssetsResults'] = true;
        $this->agreementAssetsResults = $agreementAssetsResults;
        return $this;
    }
    /**
     * Total number of search results across all scopes.
     *
     * @return int|null
     */
    public function getTotalHits(): ?int
    {
        return $this->totalHits;
    }
    /**
     * Total number of search results across all scopes.
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
}