<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DateRangeFilter
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
     * @var DateRange|null
     */
    protected $range;
    /**
     * @return DateRange|null
     */
    public function getRange(): ?DateRange
    {
        return $this->range;
    }
    /**
     * @param DateRange|null $range
     *
     * @return self
     */
    public function setRange(?DateRange $range): self
    {
        $this->initialized['range'] = true;
        $this->range = $range;
        return $this;
    }
}