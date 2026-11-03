<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AccountEventsList
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
     * List of account events
     *
     * @var list<AccountEvent>|null
     */
    protected $accountEvents;
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
     * List of account events
     *
     * @return list<AccountEvent>|null
     */
    public function getAccountEvents(): ?array
    {
        return $this->accountEvents;
    }
    /**
     * List of account events
     *
     * @param list<AccountEvent>|null $accountEvents
     *
     * @return self
     */
    public function setAccountEvents(?array $accountEvents): self
    {
        $this->initialized['accountEvents'] = true;
        $this->accountEvents = $accountEvents;
        return $this;
    }
}