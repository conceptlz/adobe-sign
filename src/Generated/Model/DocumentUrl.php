<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DocumentUrl
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
     * true if the document content cannot be edited because the source file was encrypted, certified, carries usage rights, or is digitally signed. When true, skipDocumentSealing is ignored and the sealed document is returned.
     *
     * @var bool|null
     */
    protected $lockedForEditing;
    /**
     * Secure URL of the document
     *
     * @var string|null
     */
    protected $url;
    /**
     * true if the document content cannot be edited because the source file was encrypted, certified, carries usage rights, or is digitally signed. When true, skipDocumentSealing is ignored and the sealed document is returned.
     *
     * @return bool|null
     */
    public function getLockedForEditing(): ?bool
    {
        return $this->lockedForEditing;
    }
    /**
     * true if the document content cannot be edited because the source file was encrypted, certified, carries usage rights, or is digitally signed. When true, skipDocumentSealing is ignored and the sealed document is returned.
     *
     * @param bool|null $lockedForEditing
     *
     * @return self
     */
    public function setLockedForEditing(?bool $lockedForEditing): self
    {
        $this->initialized['lockedForEditing'] = true;
        $this->lockedForEditing = $lockedForEditing;
        return $this;
    }
    /**
     * Secure URL of the document
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Secure URL of the document
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