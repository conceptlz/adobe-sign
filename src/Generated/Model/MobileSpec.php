<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MobileSpec
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
     * @var list<string>|null
     */
    protected $libraryDocumentIds;
    /**
     * @return list<string>|null
     */
    public function getLibraryDocumentIds(): ?array
    {
        return $this->libraryDocumentIds;
    }
    /**
     * @param list<string>|null $libraryDocumentIds
     *
     * @return self
     */
    public function setLibraryDocumentIds(?array $libraryDocumentIds): self
    {
        $this->initialized['libraryDocumentIds'] = true;
        $this->libraryDocumentIds = $libraryDocumentIds;
        return $this;
    }
}