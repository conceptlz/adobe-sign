<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class CombinedDocumentPagesInfo
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
     * List of basic information of all pages of the combined document of an Agreement.
     *
     * @var list<DocumentPageInfo>|null
     */
    protected $documentPagesInfo;
    /**
     * List of basic information of all pages of the combined document of an Agreement.
     *
     * @return list<DocumentPageInfo>|null
     */
    public function getDocumentPagesInfo(): ?array
    {
        return $this->documentPagesInfo;
    }
    /**
     * List of basic information of all pages of the combined document of an Agreement.
     *
     * @param list<DocumentPageInfo>|null $documentPagesInfo
     *
     * @return self
     */
    public function setDocumentPagesInfo(?array $documentPagesInfo): self
    {
        $this->initialized['documentPagesInfo'] = true;
        $this->documentPagesInfo = $documentPagesInfo;
        return $this;
    }
}