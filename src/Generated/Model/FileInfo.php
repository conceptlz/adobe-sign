<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FileInfo
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
     * Indicates that this document needs to be notarized
     *
     * @var bool|null
     */
    protected $notarize;
    /**
     * ID for a transient document that will be added to the agreement
     *
     * @var string|null
     */
    protected $transientDocumentId;
    /**
     * ID for an existing Library document that will be added to the agreement
     *
     * @var string|null
     */
    protected $libraryDocumentId;
    /**
     * @var URLFileInfo|null
     */
    protected $urlFileInfo;
    /**
     * Indicates that this document needs to be notarized
     *
     * @return bool|null
     */
    public function getNotarize(): ?bool
    {
        return $this->notarize;
    }
    /**
     * Indicates that this document needs to be notarized
     *
     * @param bool|null $notarize
     *
     * @return self
     */
    public function setNotarize(?bool $notarize): self
    {
        $this->initialized['notarize'] = true;
        $this->notarize = $notarize;
        return $this;
    }
    /**
     * ID for a transient document that will be added to the agreement
     *
     * @return string|null
     */
    public function getTransientDocumentId(): ?string
    {
        return $this->transientDocumentId;
    }
    /**
     * ID for a transient document that will be added to the agreement
     *
     * @param string|null $transientDocumentId
     *
     * @return self
     */
    public function setTransientDocumentId(?string $transientDocumentId): self
    {
        $this->initialized['transientDocumentId'] = true;
        $this->transientDocumentId = $transientDocumentId;
        return $this;
    }
    /**
     * ID for an existing Library document that will be added to the agreement
     *
     * @return string|null
     */
    public function getLibraryDocumentId(): ?string
    {
        return $this->libraryDocumentId;
    }
    /**
     * ID for an existing Library document that will be added to the agreement
     *
     * @param string|null $libraryDocumentId
     *
     * @return self
     */
    public function setLibraryDocumentId(?string $libraryDocumentId): self
    {
        $this->initialized['libraryDocumentId'] = true;
        $this->libraryDocumentId = $libraryDocumentId;
        return $this;
    }
    /**
     * @return URLFileInfo|null
     */
    public function getUrlFileInfo(): ?URLFileInfo
    {
        return $this->urlFileInfo;
    }
    /**
     * @param URLFileInfo|null $urlFileInfo
     *
     * @return self
     */
    public function setUrlFileInfo(?URLFileInfo $urlFileInfo): self
    {
        $this->initialized['urlFileInfo'] = true;
        $this->urlFileInfo = $urlFileInfo;
        return $this;
    }
}