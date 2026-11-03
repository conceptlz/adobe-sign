<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserGroupsInfo
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
     * The list of groups for given user.
     *
     * @var list<UserGroupInfo>|null
     */
    protected $groupInfoList;
    /**
     * The list of groups for given user.
     *
     * @return list<UserGroupInfo>|null
     */
    public function getGroupInfoList(): ?array
    {
        return $this->groupInfoList;
    }
    /**
     * The list of groups for given user.
     *
     * @param list<UserGroupInfo>|null $groupInfoList
     *
     * @return self
     */
    public function setGroupInfoList(?array $groupInfoList): self
    {
        $this->initialized['groupInfoList'] = true;
        $this->groupInfoList = $groupInfoList;
        return $this;
    }
}