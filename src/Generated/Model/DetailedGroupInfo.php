<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DetailedGroupInfo
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
     * Is the default group for the account
     *
     * @var bool|null
     */
    protected $isDefaultGroup;
    /**
     * Date of creation of the group. This will be ignored as part of POST or PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $created;
    /**
     * Name of the group
     *
     * @var string|null
     */
    protected $name;
    /**
     * The unique identifier of the Group. This will be returned as part of GET call but is not mandatory to be passed as part of PUT/POST call for groups/{groupId}
     *
     * @var string|null
     */
    protected $id;
    /**
     * Is the default group for the account
     *
     * @return bool|null
     */
    public function getIsDefaultGroup(): ?bool
    {
        return $this->isDefaultGroup;
    }
    /**
     * Is the default group for the account
     *
     * @param bool|null $isDefaultGroup
     *
     * @return self
     */
    public function setIsDefaultGroup(?bool $isDefaultGroup): self
    {
        $this->initialized['isDefaultGroup'] = true;
        $this->isDefaultGroup = $isDefaultGroup;
        return $this;
    }
    /**
     * Date of creation of the group. This will be ignored as part of POST or PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }
    /**
     * Date of creation of the group. This will be ignored as part of POST or PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $created
     *
     * @return self
     */
    public function setCreated(?string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;
        return $this;
    }
    /**
     * Name of the group
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the group
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
     * The unique identifier of the Group. This will be returned as part of GET call but is not mandatory to be passed as part of PUT/POST call for groups/{groupId}
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the Group. This will be returned as part of GET call but is not mandatory to be passed as part of PUT/POST call for groups/{groupId}
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
}