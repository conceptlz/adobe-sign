<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SupportingDocument
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
     * Display name of the document
     *
     * @var string|null
     */
    protected $displayLabel;
    /**
     * The unique identifier of the participant that uploaded the supporting document
     *
     * @var string|null
     */
    protected $participantId;
    /**
     * Number of pages in the document
     *
     * @var int|null
     */
    protected $numPages;
    /**
     * The name of the supporting document field
     *
     * @var string|null
     */
    protected $fieldName;
    /**
     * Id representing the document
     *
     * @var string|null
     */
    protected $id;
    /**
     * Mime-type of the document
     *
     * @var string|null
     */
    protected $mimeType;
    /**
     * Display name of the document
     *
     * @return string|null
     */
    public function getDisplayLabel(): ?string
    {
        return $this->displayLabel;
    }
    /**
     * Display name of the document
     *
     * @param string|null $displayLabel
     *
     * @return self
     */
    public function setDisplayLabel(?string $displayLabel): self
    {
        $this->initialized['displayLabel'] = true;
        $this->displayLabel = $displayLabel;
        return $this;
    }
    /**
     * The unique identifier of the participant that uploaded the supporting document
     *
     * @return string|null
     */
    public function getParticipantId(): ?string
    {
        return $this->participantId;
    }
    /**
     * The unique identifier of the participant that uploaded the supporting document
     *
     * @param string|null $participantId
     *
     * @return self
     */
    public function setParticipantId(?string $participantId): self
    {
        $this->initialized['participantId'] = true;
        $this->participantId = $participantId;
        return $this;
    }
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
     * The name of the supporting document field
     *
     * @return string|null
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }
    /**
     * The name of the supporting document field
     *
     * @param string|null $fieldName
     *
     * @return self
     */
    public function setFieldName(?string $fieldName): self
    {
        $this->initialized['fieldName'] = true;
        $this->fieldName = $fieldName;
        return $this;
    }
    /**
     * Id representing the document
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Id representing the document
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
     * Mime-type of the document
     *
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }
    /**
     * Mime-type of the document
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