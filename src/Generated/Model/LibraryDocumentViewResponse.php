<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryDocumentViewResponse
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
     * List of library document views
     *
     * @var list<LibraryView>|null
     */
    protected $libraryViewList;
    /**
     * List of library document views
     *
     * @return list<LibraryView>|null
     */
    public function getLibraryViewList(): ?array
    {
        return $this->libraryViewList;
    }
    /**
     * List of library document views
     *
     * @param list<LibraryView>|null $libraryViewList
     *
     * @return self
     */
    public function setLibraryViewList(?array $libraryViewList): self
    {
        $this->initialized['libraryViewList'] = true;
        $this->libraryViewList = $libraryViewList;
        return $this;
    }
}