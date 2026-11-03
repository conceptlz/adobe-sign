<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DocumentImageUrlsInfo
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
     * A list of documents image URLs.
     *
     * @var list<DocumentImageUrls>|null
     */
    protected $documentImageUrlsList;
    /**
     * Id of the document
     *
     * @var string|null
     */
    protected $documentId;
    /**
     * A list of documents image URLs.
     *
     * @return list<DocumentImageUrls>|null
     */
    public function getDocumentImageUrlsList(): ?array
    {
        return $this->documentImageUrlsList;
    }
    /**
     * A list of documents image URLs.
     *
     * @param list<DocumentImageUrls>|null $documentImageUrlsList
     *
     * @return self
     */
    public function setDocumentImageUrlsList(?array $documentImageUrlsList): self
    {
        $this->initialized['documentImageUrlsList'] = true;
        $this->documentImageUrlsList = $documentImageUrlsList;
        return $this;
    }
    /**
     * Id of the document
     *
     * @return string|null
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }
    /**
     * Id of the document
     *
     * @param string|null $documentId
     *
     * @return self
     */
    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;
        return $this;
    }
}