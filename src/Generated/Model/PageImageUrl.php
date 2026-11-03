<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class PageImageUrl
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
     * Page number within the document.
     *
     * @var int|null
     */
    protected $pageNumber;
    /**
     * An image url.
     *
     * @var string|null
     */
    protected $url;
    /**
     * Page number within the document.
     *
     * @return int|null
     */
    public function getPageNumber(): ?int
    {
        return $this->pageNumber;
    }
    /**
     * Page number within the document.
     *
     * @param int|null $pageNumber
     *
     * @return self
     */
    public function setPageNumber(?int $pageNumber): self
    {
        $this->initialized['pageNumber'] = true;
        $this->pageNumber = $pageNumber;
        return $this;
    }
    /**
     * An image url.
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * An image url.
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
}