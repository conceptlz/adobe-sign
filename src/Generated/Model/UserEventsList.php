<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserEventsList
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
     * List of user events
     *
     * @var list<UserEvent>|null
     */
    protected $userEvents;
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
     * List of user events
     *
     * @return list<UserEvent>|null
     */
    public function getUserEvents(): ?array
    {
        return $this->userEvents;
    }
    /**
     * List of user events
     *
     * @param list<UserEvent>|null $userEvents
     *
     * @return self
     */
    public function setUserEvents(?array $userEvents): self
    {
        $this->initialized['userEvents'] = true;
        $this->userEvents = $userEvents;
        return $this;
    }
}