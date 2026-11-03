<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FileUploadOptions
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
     * Whether the file upload section can be edited by adding or removing files. Default value is taken as true. Changing the default value will alter the compose page view configuration for this agreement, but is not an access control mechanism
     *
     * @var bool|null
     */
    protected $canEditFiles;
    /**
     * Whether local file upload button should appear or not. Default value is taken as true
     *
     * @var bool|null
     */
    protected $localFile;
    /**
     * Whether link to attach documents from web sources like Dropbox should appear or not. Default value is taken as true
     *
     * @var bool|null
     */
    protected $webConnectors;
    /**
     * Whether library documents link should appear or not. Default value is taken as true
     *
     * @var bool|null
     */
    protected $libraryDocument;
    /**
     * Whether the file upload section can be edited by adding or removing files. Default value is taken as true. Changing the default value will alter the compose page view configuration for this agreement, but is not an access control mechanism
     *
     * @return bool|null
     */
    public function getCanEditFiles(): ?bool
    {
        return $this->canEditFiles;
    }
    /**
     * Whether the file upload section can be edited by adding or removing files. Default value is taken as true. Changing the default value will alter the compose page view configuration for this agreement, but is not an access control mechanism
     *
     * @param bool|null $canEditFiles
     *
     * @return self
     */
    public function setCanEditFiles(?bool $canEditFiles): self
    {
        $this->initialized['canEditFiles'] = true;
        $this->canEditFiles = $canEditFiles;
        return $this;
    }
    /**
     * Whether local file upload button should appear or not. Default value is taken as true
     *
     * @return bool|null
     */
    public function getLocalFile(): ?bool
    {
        return $this->localFile;
    }
    /**
     * Whether local file upload button should appear or not. Default value is taken as true
     *
     * @param bool|null $localFile
     *
     * @return self
     */
    public function setLocalFile(?bool $localFile): self
    {
        $this->initialized['localFile'] = true;
        $this->localFile = $localFile;
        return $this;
    }
    /**
     * Whether link to attach documents from web sources like Dropbox should appear or not. Default value is taken as true
     *
     * @return bool|null
     */
    public function getWebConnectors(): ?bool
    {
        return $this->webConnectors;
    }
    /**
     * Whether link to attach documents from web sources like Dropbox should appear or not. Default value is taken as true
     *
     * @param bool|null $webConnectors
     *
     * @return self
     */
    public function setWebConnectors(?bool $webConnectors): self
    {
        $this->initialized['webConnectors'] = true;
        $this->webConnectors = $webConnectors;
        return $this;
    }
    /**
     * Whether library documents link should appear or not. Default value is taken as true
     *
     * @return bool|null
     */
    public function getLibraryDocument(): ?bool
    {
        return $this->libraryDocument;
    }
    /**
     * Whether library documents link should appear or not. Default value is taken as true
     *
     * @param bool|null $libraryDocument
     *
     * @return self
     */
    public function setLibraryDocument(?bool $libraryDocument): self
    {
        $this->initialized['libraryDocument'] = true;
        $this->libraryDocument = $libraryDocument;
        return $this;
    }
}