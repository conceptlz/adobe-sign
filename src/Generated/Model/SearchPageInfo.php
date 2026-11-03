<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SearchPageInfo
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
     * 0-based row number of the last returned result + 1. Set to 0 (or not set) if there are no more search results. Set to NULL if all search results were returned and there are no more search results for the next page.
     *
     * @var int|null
     */
    protected $nextIndex;
    /**
     * 0-based row number of the last returned result + 1. Set to 0 (or not set) if there are no more search results. Set to NULL if all search results were returned and there are no more search results for the next page.
     *
     * @return int|null
     */
    public function getNextIndex(): ?int
    {
        return $this->nextIndex;
    }
    /**
     * 0-based row number of the last returned result + 1. Set to 0 (or not set) if there are no more search results. Set to NULL if all search results were returned and there are no more search results for the next page.
     *
     * @param int|null $nextIndex
     *
     * @return self
     */
    public function setNextIndex(?int $nextIndex): self
    {
        $this->initialized['nextIndex'] = true;
        $this->nextIndex = $nextIndex;
        return $this;
    }
}