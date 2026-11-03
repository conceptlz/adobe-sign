<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class Document
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
     * Number of pages in the document
     *
     * @var int|null
     */
    protected $numPages;
    /**
     * The date the document was created
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * Final document size in bytes
     *
     * @var int|null
     */
    protected $fileSize;
    /**
     * Name of the original document uploaded. This is returned in GET but not accepted back in PUT
     *
     * @var string|null
     */
    protected $name;
    /**
     * ID of the document. In case of PUT call, this is the only field that is accepted in Document structure. Name and mimeType are ignored in case of PUT call
     *
     * @var string|null
     */
    protected $id;
    /**
     * Label of the document
     *
     * @var string|null
     */
    protected $label;
    /**
     * mimeType of the original file. This is returned in GET but not accepted back in PUT
     *
     * @var string|null
     */
    protected $mimeType;
    /**
     * Number of pages in the document
     *
     * @return int|null
     */
    public function getNumPages(): ?int
    {
        return $this->numPages;
    }
    /**
     * Number of pages in the document
     *
     * @param int|null $numPages
     *
     * @return self
     */
    public function setNumPages(?int $numPages): self
    {
        $this->initialized['numPages'] = true;
        $this->numPages = $numPages;
        return $this;
    }
    /**
     * The date the document was created
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * The date the document was created
     *
     * @param string|null $createdDate
     *
     * @return self
     */
    public function setCreatedDate(?string $createdDate): self
    {
        $this->initialized['createdDate'] = true;
        $this->createdDate = $createdDate;
        return $this;
    }
    /**
     * Final document size in bytes
     *
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }
    /**
     * Final document size in bytes
     *
     * @param int|null $fileSize
     *
     * @return self
     */
    public function setFileSize(?int $fileSize): self
    {
        $this->initialized['fileSize'] = true;
        $this->fileSize = $fileSize;
        return $this;
    }
    /**
     * Name of the original document uploaded. This is returned in GET but not accepted back in PUT
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the original document uploaded. This is returned in GET but not accepted back in PUT
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * ID of the document. In case of PUT call, this is the only field that is accepted in Document structure. Name and mimeType are ignored in case of PUT call
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * ID of the document. In case of PUT call, this is the only field that is accepted in Document structure. Name and mimeType are ignored in case of PUT call
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * Label of the document
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * Label of the document
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
     * mimeType of the original file. This is returned in GET but not accepted back in PUT
     *
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }
    /**
     * mimeType of the original file. This is returned in GET but not accepted back in PUT
     *
     * @param string|null $mimeType
     *
     * @return self
     */
    public function setMimeType(?string $mimeType): self
    {
        $this->initialized['mimeType'] = true;
        $this->mimeType = $mimeType;
        return $this;
    }
}