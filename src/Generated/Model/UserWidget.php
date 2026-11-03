<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserWidget
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
     * True if agreement is hidden for the user
     *
     * @var bool|null
     */
    protected $hidden;
    /**
     * Unique identifier of the group
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * The date on which the web form was last modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $modifiedDate;
    /**
     * The name of the web form.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The unique identifier of a web form
     *
     * @var string|null
     */
    protected $id;
    /**
     * The embedded javascript code of the web form
     *
     * @var string|null
     */
    protected $javascript;
    /**
     * The hosted url of the web form
     *
     * @var string|null
     */
    protected $url;
    /**
     * The web form status (AUTHORING, ACTIVE, DRAFT, DISABLED)
     *
     * @var string|null
     */
    protected $status;
    /**
     * True if agreement is hidden for the user
     *
     * @return bool|null
     */
    public function getHidden(): ?bool
    {
        return $this->hidden;
    }
    /**
     * True if agreement is hidden for the user
     *
     * @param bool|null $hidden
     *
     * @return self
     */
    public function setHidden(?bool $hidden): self
    {
        $this->initialized['hidden'] = true;
        $this->hidden = $hidden;
        return $this;
    }
    /**
     * Unique identifier of the group
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * Unique identifier of the group
     *
     * @param string|null $groupId
     *
     * @return self
     */
    public function setGroupId(?string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;
        return $this;
    }
    /**
     * The date on which the web form was last modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getModifiedDate(): ?string
    {
        return $this->modifiedDate;
    }
    /**
     * The date on which the web form was last modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $modifiedDate
     *
     * @return self
     */
    public function setModifiedDate(?string $modifiedDate): self
    {
        $this->initialized['modifiedDate'] = true;
        $this->modifiedDate = $modifiedDate;
        return $this;
    }
    /**
     * The name of the web form.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The name of the web form.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The unique identifier of a web form
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of a web form
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The embedded javascript code of the web form
     *
     * @return string|null
     */
    public function getJavascript(): ?string
    {
        return $this->javascript;
    }
    /**
     * The embedded javascript code of the web form
     *
     * @param string|null $javascript
     *
     * @return self
     */
    public function setJavascript(?string $javascript): self
    {
        $this->initialized['javascript'] = true;
        $this->javascript = $javascript;
        return $this;
    }
    /**
     * The hosted url of the web form
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The hosted url of the web form
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * The web form status (AUTHORING, ACTIVE, DRAFT, DISABLED)
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The web form status (AUTHORING, ACTIVE, DRAFT, DISABLED)
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}