<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryDocumentMembersInfo
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
     * @var LibraryDocumentSenderInfo|null
     */
    protected $creatorInfo;
    /**
     * @return LibraryDocumentSenderInfo|null
     */
    public function getCreatorInfo(): ?LibraryDocumentSenderInfo
    {
        return $this->creatorInfo;
    }
    /**
     * @param LibraryDocumentSenderInfo|null $creatorInfo
     *
     * @return self
     */
    public function setCreatorInfo(?LibraryDocumentSenderInfo $creatorInfo): self
    {
        $this->initialized['creatorInfo'] = true;
        $this->creatorInfo = $creatorInfo;
        return $this;
    }
}