<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FormFieldLocation
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
     * Number of the page where form field has to be placed, starting from 1.
     *
     * @var int|null
     */
    protected $pageNumber;
    /**
     * No. of default user space units from bottom of the page for form field placement
     *
     * @var float|null
     */
    protected $top;
    /**
     * No. of default user space units from left of the page for form field placement
     *
     * @var float|null
     */
    protected $left;
    /**
     * Width of the form field in default user space units
     *
     * @var float|null
     */
    protected $width;
    /**
     * Height of the form field in default user space units
     *
     * @var float|null
     */
    protected $height;
    /**
     * Number of the page where form field has to be placed, starting from 1.
     *
     * @return int|null
     */
    public function getPageNumber(): ?int
    {
        return $this->pageNumber;
    }
    /**
     * Number of the page where form field has to be placed, starting from 1.
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
     * No. of default user space units from bottom of the page for form field placement
     *
     * @return float|null
     */
    public function getTop(): ?float
    {
        return $this->top;
    }
    /**
     * No. of default user space units from bottom of the page for form field placement
     *
     * @param float|null $top
     *
     * @return self
     */
    public function setTop(?float $top): self
    {
        $this->initialized['top'] = true;
        $this->top = $top;
        return $this;
    }
    /**
     * No. of default user space units from left of the page for form field placement
     *
     * @return float|null
     */
    public function getLeft(): ?float
    {
        return $this->left;
    }
    /**
     * No. of default user space units from left of the page for form field placement
     *
     * @param float|null $left
     *
     * @return self
     */
    public function setLeft(?float $left): self
    {
        $this->initialized['left'] = true;
        $this->left = $left;
        return $this;
    }
    /**
     * Width of the form field in default user space units
     *
     * @return float|null
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }
    /**
     * Width of the form field in default user space units
     *
     * @param float|null $width
     *
     * @return self
     */
    public function setWidth(?float $width): self
    {
        $this->initialized['width'] = true;
        $this->width = $width;
        return $this;
    }
    /**
     * Height of the form field in default user space units
     *
     * @return float|null
     */
    public function getHeight(): ?float
    {
        return $this->height;
    }
    /**
     * Height of the form field in default user space units
     *
     * @param float|null $height
     *
     * @return self
     */
    public function setHeight(?float $height): self
    {
        $this->initialized['height'] = true;
        $this->height = $height;
        return $this;
    }
}