<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class GroupsInfo
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
     * The list of groups in the account.
     *
     * @var list<GroupInfo>|null
     */
    protected $groupInfoList;
    /**
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * The list of groups in the account.
     *
     * @return list<GroupInfo>|null
     */
    public function getGroupInfoList(): ?array
    {
        return $this->groupInfoList;
    }
    /**
     * The list of groups in the account.
     *
     * @param list<GroupInfo>|null $groupInfoList
     *
     * @return self
     */
    public function setGroupInfoList(?array $groupInfoList): self
    {
        $this->initialized['groupInfoList'] = true;
        $this->groupInfoList = $groupInfoList;
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