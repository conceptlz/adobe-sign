<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WebhookAgreementEvents
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
     * Determines whether agreement detailed info will be returned in the response payload
     *
     * @var bool|null
     */
    protected $includeDetailedInfo;
    /**
     * Determines whether participants info will be returned in the response payload
     *
     * @var bool|null
     */
    protected $includeParticipantsInfo;
    /**
     * Determines whether documents will be returned in webhook response payload. If set to true, signed document will be returned in base 64 encoded format in JSON when signing is complete
     *
     * @var bool|null
     */
    protected $includeSignedDocuments;
    /**
     * Determines whether document info will be returned in the response payload
     *
     * @var bool|null
     */
    protected $includeDocumentsInfo;
    /**
     * Determines whether agreement detailed info will be returned in the response payload
     *
     * @return bool|null
     */
    public function getIncludeDetailedInfo(): ?bool
    {
        return $this->includeDetailedInfo;
    }
    /**
     * Determines whether agreement detailed info will be returned in the response payload
     *
     * @param bool|null $includeDetailedInfo
     *
     * @return self
     */
    public function setIncludeDetailedInfo(?bool $includeDetailedInfo): self
    {
        $this->initialized['includeDetailedInfo'] = true;
        $this->includeDetailedInfo = $includeDetailedInfo;
        return $this;
    }
    /**
     * Determines whether participants info will be returned in the response payload
     *
     * @return bool|null
     */
    public function getIncludeParticipantsInfo(): ?bool
    {
        return $this->includeParticipantsInfo;
    }
    /**
     * Determines whether participants info will be returned in the response payload
     *
     * @param bool|null $includeParticipantsInfo
     *
     * @return self
     */
    public function setIncludeParticipantsInfo(?bool $includeParticipantsInfo): self
    {
        $this->initialized['includeParticipantsInfo'] = true;
        $this->includeParticipantsInfo = $includeParticipantsInfo;
        return $this;
    }
    /**
     * Determines whether documents will be returned in webhook response payload. If set to true, signed document will be returned in base 64 encoded format in JSON when signing is complete
     *
     * @return bool|null
     */
    public function getIncludeSignedDocuments(): ?bool
    {
        return $this->includeSignedDocuments;
    }
    /**
     * Determines whether documents will be returned in webhook response payload. If set to true, signed document will be returned in base 64 encoded format in JSON when signing is complete
     *
     * @param bool|null $includeSignedDocuments
     *
     * @return self
     */
    public function setIncludeSignedDocuments(?bool $includeSignedDocuments): self
    {
        $this->initialized['includeSignedDocuments'] = true;
        $this->includeSignedDocuments = $includeSignedDocuments;
        return $this;
    }
    /**
     * Determines whether document info will be returned in the response payload
     *
     * @return bool|null
     */
    public function getIncludeDocumentsInfo(): ?bool
    {
        return $this->includeDocumentsInfo;
    }
    /**
     * Determines whether document info will be returned in the response payload
     *
     * @param bool|null $includeDocumentsInfo
     *
     * @return self
     */
    public function setIncludeDocumentsInfo(?bool $includeDocumentsInfo): self
    {
        $this->initialized['includeDocumentsInfo'] = true;
        $this->includeDocumentsInfo = $includeDocumentsInfo;
        return $this;
    }
}