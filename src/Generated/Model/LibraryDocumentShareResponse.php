<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryDocumentShareResponse
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
     * The unique identifier of the sharee. This Id can be either Group ID or User ID
     *
     * @var string|null
     */
    protected $id;
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
}