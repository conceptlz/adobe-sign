<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class GroupEventsList
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
     * List of group events
     *
     * @var list<GroupEvent>|null
     */
    protected $groupEvents;
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
     * List of group events
     *
     * @return list<GroupEvent>|null
     */
    public function getGroupEvents(): ?array
    {
        return $this->groupEvents;
    }
    /**
     * List of group events
     *
     * @param list<GroupEvent>|null $groupEvents
     *
     * @return self
     */
    public function setGroupEvents(?array $groupEvents): self
    {
        $this->initialized['groupEvents'] = true;
        $this->groupEvents = $groupEvents;
        return $this;
    }
}