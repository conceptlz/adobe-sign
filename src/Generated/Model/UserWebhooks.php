<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserWebhooks
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
     * @var list<UserWebhook>|null
     */
    protected $userWebhookList;
    /**
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * An array of web form items
     *
     * @return list<UserWebhook>|null
     */
    public function getUserWebhookList(): ?array
    {
        return $this->userWebhookList;
    }
    /**
     * An array of web form items
     *
     * @param list<UserWebhook>|null $userWebhookList
     *
     * @return self
     */
    public function setUserWebhookList(?array $userWebhookList): self
    {
        $this->initialized['userWebhookList'] = true;
        $this->userWebhookList = $userWebhookList;
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