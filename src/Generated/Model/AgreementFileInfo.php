<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementFileInfo
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
     * @var Document|null
     */
    protected $document;
    /**
     * ID for an existing Library document that will be added to the agreement
     *
     * @var string|null
     */
    protected $libraryDocumentId;
    /**
     * The unique label value of a file info element. In case of custom workflow this will map a file to corresponding file element in workflow definition. This must be specified in case of custom workflow agreement creation request. The label can also be used in a FormFieldGenerator to specify the document to apply the generator to
     *
     * @var string|null
     */
    protected $label;
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
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }
    /**
     * @param Document|null $document
     *
     * @return self
     */
    public function setDocument(?Document $document): self
    {
        $this->initialized['document'] = true;
        $this->document = $document;
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
     * The unique label value of a file info element. In case of custom workflow this will map a file to corresponding file element in workflow definition. This must be specified in case of custom workflow agreement creation request. The label can also be used in a FormFieldGenerator to specify the document to apply the generator to
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * The unique label value of a file info element. In case of custom workflow this will map a file to corresponding file element in workflow definition. This must be specified in case of custom workflow agreement creation request. The label can also be used in a FormFieldGenerator to specify the document to apply the generator to
     *
     * @param string|null $label
     *
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
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