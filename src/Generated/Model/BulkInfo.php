<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class BulkInfo
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
     * The source for the bulk participants.<br>- FILE: to reference file with participant defined in the ChildAgreementsInfo object.
     *
     * @var string|null
     */
    protected $source;
    /**
     * The source for the bulk participants.<br>- FILE: to reference file with participant defined in the ChildAgreementsInfo object.
     *
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
     * The source for the bulk participants.<br>- FILE: to reference file with participant defined in the ChildAgreementsInfo object.
     *
     * @param string|null $source
     *
     * @return self
     */
    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
}