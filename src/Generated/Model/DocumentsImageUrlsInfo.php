<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DocumentsImageUrlsInfo
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
     * A list of supporting document image URLs info.
     *
     * @var list<DocumentImageUrlsInfo>|null
     */
    protected $supportingDocumentsImageUrlsInfo;
    /**
     * A list of original document image URLs info.
     *
     * @var list<DocumentImageUrlsInfo>|null
     */
    protected $originalDocumentsImageUrlsInfo;
    /**
     * A list of supporting document image URLs info.
     *
     * @return list<DocumentImageUrlsInfo>|null
     */
    public function getSupportingDocumentsImageUrlsInfo(): ?array
    {
        return $this->supportingDocumentsImageUrlsInfo;
    }
    /**
     * A list of supporting document image URLs info.
     *
     * @param list<DocumentImageUrlsInfo>|null $supportingDocumentsImageUrlsInfo
     *
     * @return self
     */
    public function setSupportingDocumentsImageUrlsInfo(?array $supportingDocumentsImageUrlsInfo): self
    {
        $this->initialized['supportingDocumentsImageUrlsInfo'] = true;
        $this->supportingDocumentsImageUrlsInfo = $supportingDocumentsImageUrlsInfo;
        return $this;
    }
    /**
     * A list of original document image URLs info.
     *
     * @return list<DocumentImageUrlsInfo>|null
     */
    public function getOriginalDocumentsImageUrlsInfo(): ?array
    {
        return $this->originalDocumentsImageUrlsInfo;
    }
    /**
     * A list of original document image URLs info.
     *
     * @param list<DocumentImageUrlsInfo>|null $originalDocumentsImageUrlsInfo
     *
     * @return self
     */
    public function setOriginalDocumentsImageUrlsInfo(?array $originalDocumentsImageUrlsInfo): self
    {
        $this->initialized['originalDocumentsImageUrlsInfo'] = true;
        $this->originalDocumentsImageUrlsInfo = $originalDocumentsImageUrlsInfo;
        return $this;
    }
}