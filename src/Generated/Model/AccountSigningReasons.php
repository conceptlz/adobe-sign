<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AccountSigningReasons
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
     * List of account signing reasons
     *
     * @var list<AccountSigningReason>|null
     */
    protected $signingReasonList;
    /**
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * List of account signing reasons
     *
     * @return list<AccountSigningReason>|null
     */
    public function getSigningReasonList(): ?array
    {
        return $this->signingReasonList;
    }
    /**
     * List of account signing reasons
     *
     * @param list<AccountSigningReason>|null $signingReasonList
     *
     * @return self
     */
    public function setSigningReasonList(?array $signingReasonList): self
    {
        $this->initialized['signingReasonList'] = true;
        $this->signingReasonList = $signingReasonList;
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