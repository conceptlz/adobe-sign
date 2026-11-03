<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignChildAgreement
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
     * The display date for the agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $displayDate;
    /**
     * True if this is an e-sign document
     *
     * @var bool|null
     */
    protected $esign;
    /**
     * Name of the Agreement
     *
     * @var string|null
     */
    protected $name;
    /**
     * The unique identifier of the agreement.If provided in POST, it will simply be ignored
     *
     * @var string|null
     */
    protected $id;
    /**
     * The kind of agreement
     *
     * @var string|null
     */
    protected $type;
    /**
     * The parent id of a bulk send child *OR* the originating id of a web form agreement instance
     *
     * @var string|null
     */
    protected $parentId;
    /**
     * This is a server generated attribute which provides the detailed status of an agreement with respect to the apiCaller
     *
     * @var string|null
     */
    protected $status;
    /**
     * The display date for the agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getDisplayDate(): ?string
    {
        return $this->displayDate;
    }
    /**
     * The display date for the agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $displayDate
     *
     * @return self
     */
    public function setDisplayDate(?string $displayDate): self
    {
        $this->initialized['displayDate'] = true;
        $this->displayDate = $displayDate;
        return $this;
    }
    /**
     * True if this is an e-sign document
     *
     * @return bool|null
     */
    public function getEsign(): ?bool
    {
        return $this->esign;
    }
    /**
     * True if this is an e-sign document
     *
     * @param bool|null $esign
     *
     * @return self
     */
    public function setEsign(?bool $esign): self
    {
        $this->initialized['esign'] = true;
        $this->esign = $esign;
        return $this;
    }
    /**
     * Name of the Agreement
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the Agreement
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
     * The unique identifier of the agreement.If provided in POST, it will simply be ignored
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the agreement.If provided in POST, it will simply be ignored
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
     * The kind of agreement
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * The kind of agreement
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * The parent id of a bulk send child *OR* the originating id of a web form agreement instance
     *
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }
    /**
     * The parent id of a bulk send child *OR* the originating id of a web form agreement instance
     *
     * @param string|null $parentId
     *
     * @return self
     */
    public function setParentId(?string $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;
        return $this;
    }
    /**
     * This is a server generated attribute which provides the detailed status of an agreement with respect to the apiCaller
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * This is a server generated attribute which provides the detailed status of an agreement with respect to the apiCaller
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