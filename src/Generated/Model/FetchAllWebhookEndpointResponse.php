<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FetchAllWebhookEndpointResponse
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
     * An array of WebhookEndpointResponse objects.
     *
     * @var list<WebhookEndpointResponse>|null
     */
    protected $webhookEndpointList;
    /**
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * An array of WebhookEndpointResponse objects.
     *
     * @return list<WebhookEndpointResponse>|null
     */
    public function getWebhookEndpointList(): ?array
    {
        return $this->webhookEndpointList;
    }
    /**
     * An array of WebhookEndpointResponse objects.
     *
     * @param list<WebhookEndpointResponse>|null $webhookEndpointList
     *
     * @return self
     */
    public function setWebhookEndpointList(?array $webhookEndpointList): self
    {
        $this->initialized['webhookEndpointList'] = true;
        $this->webhookEndpointList = $webhookEndpointList;
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