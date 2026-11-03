<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ComposeViewConfiguration
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
}