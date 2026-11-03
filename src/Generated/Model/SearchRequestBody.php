<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SearchRequestBody
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
     * This field provides text search capability against terms in the field values of agreements that are visible to the user making the request. To find more about how text searching works please refer here: <a href="https://helpx.adobe.com/sign/using/adobesign-search-users-agreements.html#HowSearchWorks" target="_blank">How Adobe Sign Search Works</a> (opens in separate window/tab).
     *
     * @var string|null
     */
    protected $query;
    /**
     * ['AGREEMENT_ASSETS']: a resource scope. 'AGREEMENT_ASSETS' is the only value that is supported right now which includes the following resources: agreements, megaSigns, libraryDocuments and widgets.
     *
     * @var list<string>|null
     */
    protected $scope;
    /**
     * @var AgreementAssetsCriteria|null
     */
    protected $agreementAssetsCriteria;
    /**
     * This field provides text search capability against terms in the field values of agreements that are visible to the user making the request. To find more about how text searching works please refer here: <a href="https://helpx.adobe.com/sign/using/adobesign-search-users-agreements.html#HowSearchWorks" target="_blank">How Adobe Sign Search Works</a> (opens in separate window/tab).
     *
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }
    /**
     * This field provides text search capability against terms in the field values of agreements that are visible to the user making the request. To find more about how text searching works please refer here: <a href="https://helpx.adobe.com/sign/using/adobesign-search-users-agreements.html#HowSearchWorks" target="_blank">How Adobe Sign Search Works</a> (opens in separate window/tab).
     *
     * @param string|null $query
     *
     * @return self
     */
    public function setQuery(?string $query): self
    {
        $this->initialized['query'] = true;
        $this->query = $query;
        return $this;
    }
    /**
     * ['AGREEMENT_ASSETS']: a resource scope. 'AGREEMENT_ASSETS' is the only value that is supported right now which includes the following resources: agreements, megaSigns, libraryDocuments and widgets.
     *
     * @return list<string>|null
     */
    public function getScope(): ?array
    {
        return $this->scope;
    }
    /**
     * ['AGREEMENT_ASSETS']: a resource scope. 'AGREEMENT_ASSETS' is the only value that is supported right now which includes the following resources: agreements, megaSigns, libraryDocuments and widgets.
     *
     * @param list<string>|null $scope
     *
     * @return self
     */
    public function setScope(?array $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * @return AgreementAssetsCriteria|null
     */
    public function getAgreementAssetsCriteria(): ?AgreementAssetsCriteria
    {
        return $this->agreementAssetsCriteria;
    }
    /**
     * @param AgreementAssetsCriteria|null $agreementAssetsCriteria
     *
     * @return self
     */
    public function setAgreementAssetsCriteria(?AgreementAssetsCriteria $agreementAssetsCriteria): self
    {
        $this->initialized['agreementAssetsCriteria'] = true;
        $this->agreementAssetsCriteria = $agreementAssetsCriteria;
        return $this;
    }
}