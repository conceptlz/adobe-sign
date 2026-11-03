<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserViewResponse
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
     * List of user views
     *
     * @var list<UserView>|null
     */
    protected $userViewList;
    /**
     * List of user views
     *
     * @return list<UserView>|null
     */
    public function getUserViewList(): ?array
    {
        return $this->userViewList;
    }
    /**
     * List of user views
     *
     * @param list<UserView>|null $userViewList
     *
     * @return self
     */
    public function setUserViewList(?array $userViewList): self
    {
        $this->initialized['userViewList'] = true;
        $this->userViewList = $userViewList;
        return $this;
    }
}