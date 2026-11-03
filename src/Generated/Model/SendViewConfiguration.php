<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SendViewConfiguration
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
     * @var FileUploadOptions|null
     */
    protected $fileUploadOptions;
    /**
     * Should the compose page be provided with authoring mode selected?
     *
     * @var bool|null
     */
    protected $isPreviewSelected;
    /**
     * The agreement name for the library document on the compose page
     *
     * @var string|null
     */
    protected $agrName;
    /**
     * @return FileUploadOptions|null
     */
    public function getFileUploadOptions(): ?FileUploadOptions
    {
        return $this->fileUploadOptions;
    }
    /**
     * @param FileUploadOptions|null $fileUploadOptions
     *
     * @return self
     */
    public function setFileUploadOptions(?FileUploadOptions $fileUploadOptions): self
    {
        $this->initialized['fileUploadOptions'] = true;
        $this->fileUploadOptions = $fileUploadOptions;
        return $this;
    }
    /**
     * Should the compose page be provided with authoring mode selected?
     *
     * @return bool|null
     */
    public function getIsPreviewSelected(): ?bool
    {
        return $this->isPreviewSelected;
    }
    /**
     * Should the compose page be provided with authoring mode selected?
     *
     * @param bool|null $isPreviewSelected
     *
     * @return self
     */
    public function setIsPreviewSelected(?bool $isPreviewSelected): self
    {
        $this->initialized['isPreviewSelected'] = true;
        $this->isPreviewSelected = $isPreviewSelected;
        return $this;
    }
    /**
     * The agreement name for the library document on the compose page
     *
     * @return string|null
     */
    public function getAgrName(): ?string
    {
        return $this->agrName;
    }
    /**
     * The agreement name for the library document on the compose page
     *
     * @param string|null $agrName
     *
     * @return self
     */
    public function setAgrName(?string $agrName): self
    {
        $this->initialized['agrName'] = true;
        $this->agrName = $agrName;
        return $this;
    }
}