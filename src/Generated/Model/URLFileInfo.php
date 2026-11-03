<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class URLFileInfo
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
     * The original system file name of the document being sent
     *
     * @var string|null
     */
    protected $name;
    /**
     * The mime type of the referenced file, used to determine if the file can be accepted and the necessary conversion steps can be performed
     *
     * @var string|null
     */
    protected $mimeType;
    /**
     * A publicly accessible URL for retrieving the raw file content
     *
     * @var string|null
     */
    protected $url;
    /**
     * The original system file name of the document being sent
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The original system file name of the document being sent
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
     * The mime type of the referenced file, used to determine if the file can be accepted and the necessary conversion steps can be performed
     *
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }
    /**
     * The mime type of the referenced file, used to determine if the file can be accepted and the necessary conversion steps can be performed
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
    /**
     * A publicly accessible URL for retrieving the raw file content
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * A publicly accessible URL for retrieving the raw file content
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
}