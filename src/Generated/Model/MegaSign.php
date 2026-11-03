<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSign
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
     * True, if bulk send is hidden for the user
     *
     * @var bool|null
     */
    protected $hidden;
    /**
     * The display date for the bulk send parent agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $displayDate;
    /**
     * Unique identifier of the group
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * True, if the signature type of the bulk send parent agreement is ESIGN. False, if the signature type of the bulk send parent agreement is WRITTEN
     *
     * @var bool|null
     */
    protected $esign;
    /**
     * Name of the bulk send parent agreement
     *
     * @var string|null
     */
    protected $name;
    /**
     * The unique identifier of the bulk send parent agreement
     *
     * @var string|null
     */
    protected $id;
    /**
     * Current status of the bulk send parent agreement from the perspective of the user
     *
     * @var string|null
     */
    protected $status;
    /**
     * True, if bulk send is hidden for the user
     *
     * @return bool|null
     */
    public function getHidden(): ?bool
    {
        return $this->hidden;
    }
    /**
     * True, if bulk send is hidden for the user
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
     * The display date for the bulk send parent agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getDisplayDate(): ?string
    {
        return $this->displayDate;
    }
    /**
     * The display date for the bulk send parent agreement. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
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
     * True, if the signature type of the bulk send parent agreement is ESIGN. False, if the signature type of the bulk send parent agreement is WRITTEN
     *
     * @return bool|null
     */
    public function getEsign(): ?bool
    {
        return $this->esign;
    }
    /**
     * True, if the signature type of the bulk send parent agreement is ESIGN. False, if the signature type of the bulk send parent agreement is WRITTEN
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
     * Name of the bulk send parent agreement
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the bulk send parent agreement
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
     * The unique identifier of the bulk send parent agreement
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the bulk send parent agreement
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
     * Current status of the bulk send parent agreement from the perspective of the user
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Current status of the bulk send parent agreement from the perspective of the user
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