<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementDocuments
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
     * A list of supporting documents
     *
     * @var list<SupportingDocument>|null
     */
    protected $supportingDocuments;
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
    /**
     * A list of supporting documents
     *
     * @return list<SupportingDocument>|null
     */
    public function getSupportingDocuments(): ?array
    {
        return $this->supportingDocuments;
    }
    /**
     * A list of supporting documents
     *
     * @param list<SupportingDocument>|null $supportingDocuments
     *
     * @return self
     */
    public function setSupportingDocuments(?array $supportingDocuments): self
    {
        $this->initialized['supportingDocuments'] = true;
        $this->supportingDocuments = $supportingDocuments;
        return $this;
    }
}