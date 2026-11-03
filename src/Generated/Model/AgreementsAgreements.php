<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementsAgreements
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
     * An array of UserAgreement items
     *
     * @var list<AgreementAgreement>|null
     */
    protected $userAgreementList;
    /**
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * An array of UserAgreement items
     *
     * @return list<AgreementAgreement>|null
     */
    public function getUserAgreementList(): ?array
    {
        return $this->userAgreementList;
    }
    /**
     * An array of UserAgreement items
     *
     * @param list<AgreementAgreement>|null $userAgreementList
     *
     * @return self
     */
    public function setUserAgreementList(?array $userAgreementList): self
    {
        $this->initialized['userAgreementList'] = true;
        $this->userAgreementList = $userAgreementList;
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