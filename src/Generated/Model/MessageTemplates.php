<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MessageTemplates
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
     * An array of message template items
     *
     * @var list<MessageTemplate>|null
     */
    protected $messageTemplateList;
    /**
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * An array of message template items
     *
     * @return list<MessageTemplate>|null
     */
    public function getMessageTemplateList(): ?array
    {
        return $this->messageTemplateList;
    }
    /**
     * An array of message template items
     *
     * @param list<MessageTemplate>|null $messageTemplateList
     *
     * @return self
     */
    public function setMessageTemplateList(?array $messageTemplateList): self
    {
        $this->initialized['messageTemplateList'] = true;
        $this->messageTemplateList = $messageTemplateList;
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