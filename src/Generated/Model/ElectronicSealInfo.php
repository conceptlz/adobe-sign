<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ElectronicSealInfo
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
     * Unique identifier of the group the electronic seal is associated with
     *
     * @var string|null
     */
    protected $groupId;
    /**
     * the display name of the electronic seal
     *
     * @var string|null
     */
    protected $name;
    /**
     * unique identifier for the electronic seal
     *
     * @var string|null
     */
    protected $id;
    /**
     * Status of the electronic seal
     *
     * @var string|null
     */
    protected $status;
    /**
     * Unique identifier of the group the electronic seal is associated with
     *
     * @return string|null
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * Unique identifier of the group the electronic seal is associated with
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
     * the display name of the electronic seal
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * the display name of the electronic seal
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
     * unique identifier for the electronic seal
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * unique identifier for the electronic seal
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
     * Status of the electronic seal
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Status of the electronic seal
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