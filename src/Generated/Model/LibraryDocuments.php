<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryDocuments
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
     * An array of document library items
     *
     * @var list<LibraryDocument>|null
     */
    protected $libraryDocumentList;
    /**
     * Pagination information for navigating through the response.
     *
     * @var PageInfo|null
     */
    protected $page;
    /**
     * An array of document library items
     *
     * @return list<LibraryDocument>|null
     */
    public function getLibraryDocumentList(): ?array
    {
        return $this->libraryDocumentList;
    }
    /**
     * An array of document library items
     *
     * @param list<LibraryDocument>|null $libraryDocumentList
     *
     * @return self
     */
    public function setLibraryDocumentList(?array $libraryDocumentList): self
    {
        $this->initialized['libraryDocumentList'] = true;
        $this->libraryDocumentList = $libraryDocumentList;
        return $this;
    }
    /**
     * Pagination information for navigating through the response.
     *
     * @return PageInfo|null
     */
    public function getPage(): ?PageInfo
    {
        return $this->page;
    }
    /**
     * Pagination information for navigating through the response.
     *
     * @param PageInfo|null $page
     *
     * @return self
     */
    public function setPage(?PageInfo $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;
        return $this;
    }
}