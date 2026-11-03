<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryDocumentShareeList
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
     * List of sharees to which library document is shared
     *
     * @var list<SharingInfo>|null
     */
    protected $sharees;
    /**
     * List of sharees to which library document is shared
     *
     * @return list<SharingInfo>|null
     */
    public function getSharees(): ?array
    {
        return $this->sharees;
    }
    /**
     * List of sharees to which library document is shared
     *
     * @param list<SharingInfo>|null $sharees
     *
     * @return self
     */
    public function setSharees(?array $sharees): self
    {
        $this->initialized['sharees'] = true;
        $this->sharees = $sharees;
        return $this;
    }
}