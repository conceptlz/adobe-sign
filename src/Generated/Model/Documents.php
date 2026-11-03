<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class Documents
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
     * A list of documents
     *
     * @var list<Document>|null
     */
    protected $documents;
    /**
     * A list of documents
     *
     * @return list<Document>|null
     */
    public function getDocuments(): ?array
    {
        return $this->documents;
    }
    /**
     * A list of documents
     *
     * @param list<Document>|null $documents
     *
     * @return self
     */
    public function setDocuments(?array $documents): self
    {
        $this->initialized['documents'] = true;
        $this->documents = $documents;
        return $this;
    }
}