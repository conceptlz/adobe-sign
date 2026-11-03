<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class TransientDocumentViews
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
     * List of transient document views
     *
     * @var list<TransientDocumentView>|null
     */
    protected $transientDocumentViewList;
    /**
     * List of transient document views
     *
     * @return list<TransientDocumentView>|null
     */
    public function getTransientDocumentViewList(): ?array
    {
        return $this->transientDocumentViewList;
    }
    /**
     * List of transient document views
     *
     * @param list<TransientDocumentView>|null $transientDocumentViewList
     *
     * @return self
     */
    public function setTransientDocumentViewList(?array $transientDocumentViewList): self
    {
        $this->initialized['transientDocumentViewList'] = true;
        $this->transientDocumentViewList = $transientDocumentViewList;
        return $this;
    }
}