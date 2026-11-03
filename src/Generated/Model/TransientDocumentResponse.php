<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class TransientDocumentResponse
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
     * The unique identifier of the uploaded document that can be used in an agreement or a bulk send or web form creation call
     *
     * @var string|null
     */
    protected $transientDocumentId;
    /**
     * The unique identifier of the uploaded document that can be used in an agreement or a bulk send or web form creation call
     *
     * @return string|null
     */
    public function getTransientDocumentId(): ?string
    {
        return $this->transientDocumentId;
    }
    /**
     * The unique identifier of the uploaded document that can be used in an agreement or a bulk send or web form creation call
     *
     * @param string|null $transientDocumentId
     *
     * @return self
     */
    public function setTransientDocumentId(?string $transientDocumentId): self
    {
        $this->initialized['transientDocumentId'] = true;
        $this->transientDocumentId = $transientDocumentId;
        return $this;
    }
}