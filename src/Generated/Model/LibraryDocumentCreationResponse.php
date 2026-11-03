<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryDocumentCreationResponse
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
     * The unique identifier that is used to refer to the library template
     *
     * @var string|null
     */
    protected $id;
    /**
     * The unique identifier that is used to refer to the library template
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier that is used to refer to the library template
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