<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SharingInfo
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
     * Full name of the sharee. This will be ignored if provided in POST or PUT calls
     *
     * @var string|null
     */
    protected $name;
    /**
     * The unique identifier of the sharee. This Id can be either Group ID or User ID
     *
     * @var string|null
     */
    protected $id;
    /**
     * Sharee type. Only supports GROUP share.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Full name of the sharee. This will be ignored if provided in POST or PUT calls
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Full name of the sharee. This will be ignored if provided in POST or PUT calls
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
     * The unique identifier of the sharee. This Id can be either Group ID or User ID
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the sharee. This Id can be either Group ID or User ID
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
     * Sharee type. Only supports GROUP share.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Sharee type. Only supports GROUP share.
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
}