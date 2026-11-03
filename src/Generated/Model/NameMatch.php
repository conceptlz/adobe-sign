<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class NameMatch
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
     * Criteria for the name matching identity check.
     *
     * @var string|null
     */
    protected $nameMatchCriteria;
    /**
     * Criteria for the name matching identity check.
     *
     * @return string|null
     */
    public function getNameMatchCriteria(): ?string
    {
        return $this->nameMatchCriteria;
    }
    /**
     * Criteria for the name matching identity check.
     *
     * @param string|null $nameMatchCriteria
     *
     * @return self
     */
    public function setNameMatchCriteria(?string $nameMatchCriteria): self
    {
        $this->initialized['nameMatchCriteria'] = true;
        $this->nameMatchCriteria = $nameMatchCriteria;
        return $this;
    }
}