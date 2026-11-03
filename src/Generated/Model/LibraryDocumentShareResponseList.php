<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryDocumentShareResponseList
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
     * Library document share creation response.
     *
     * @var list<LibraryDocumentShareResponse>|null
     */
    protected $libraryDocumentShareResponseList;
    /**
     * Library document share creation response.
     *
     * @return list<LibraryDocumentShareResponse>|null
     */
    public function getLibraryDocumentShareResponseList(): ?array
    {
        return $this->libraryDocumentShareResponseList;
    }
    /**
     * Library document share creation response.
     *
     * @param list<LibraryDocumentShareResponse>|null $libraryDocumentShareResponseList
     *
     * @return self
     */
    public function setLibraryDocumentShareResponseList(?array $libraryDocumentShareResponseList): self
    {
        $this->initialized['libraryDocumentShareResponseList'] = true;
        $this->libraryDocumentShareResponseList = $libraryDocumentShareResponseList;
        return $this;
    }
}