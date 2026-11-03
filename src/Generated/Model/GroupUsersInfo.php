<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class GroupUsersInfo
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
     * The list of users in the account.
     *
     * @var list<GroupUserInfo>|null
     */
    protected $userInfoList;
    /**
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * The list of users in the account.
     *
     * @return list<GroupUserInfo>|null
     */
    public function getUserInfoList(): ?array
    {
        return $this->userInfoList;
    }
    /**
     * The list of users in the account.
     *
     * @param list<GroupUserInfo>|null $userInfoList
     *
     * @return self
     */
    public function setUserInfoList(?array $userInfoList): self
    {
        $this->initialized['userInfoList'] = true;
        $this->userInfoList = $userInfoList;
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