<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserWidgets
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
     * An array of web form items
     *
     * @var list<UserWidget>|null
     */
    protected $userWidgetList;
    /**
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * An array of web form items
     *
     * @return list<UserWidget>|null
     */
    public function getUserWidgetList(): ?array
    {
        return $this->userWidgetList;
    }
    /**
     * An array of web form items
     *
     * @param list<UserWidget>|null $userWidgetList
     *
     * @return self
     */
    public function setUserWidgetList(?array $userWidgetList): self
    {
        $this->initialized['userWidgetList'] = true;
        $this->userWidgetList = $userWidgetList;
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