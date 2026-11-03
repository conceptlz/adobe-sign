<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class BasicDocumentsImageUrlsInfo
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
     * A list of original document image URLs info.
     *
     * @var list<DocumentImageUrlsInfo>|null
     */
    protected $documentsImageUrlsInfo;
    /**
     * A list of original document image URLs info.
     *
     * @return list<DocumentImageUrlsInfo>|null
     */
    public function getDocumentsImageUrlsInfo(): ?array
    {
        return $this->documentsImageUrlsInfo;
    }
    /**
     * A list of original document image URLs info.
     *
     * @param list<DocumentImageUrlsInfo>|null $documentsImageUrlsInfo
     *
     * @return self
     */
    public function setDocumentsImageUrlsInfo(?array $documentsImageUrlsInfo): self
    {
        $this->initialized['documentsImageUrlsInfo'] = true;
        $this->documentsImageUrlsInfo = $documentsImageUrlsInfo;
        return $this;
    }
}