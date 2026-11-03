<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DocumentPageInfo
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
     * Rotation angle of the page in clockwise direction in degree
     *
     * @var float|null
     */
    protected $rotation;
    /**
     * Width of the page
     *
     * @var float|null
     */
    protected $width;
    /**
     * Index of the page in combined document starting from 1
     *
     * @var int|null
     */
    protected $index;
    /**
     * Height of the page
     *
     * @var float|null
     */
    protected $height;
    /**
     * Rotation angle of the page in clockwise direction in degree
     *
     * @return float|null
     */
    public function getRotation(): ?float
    {
        return $this->rotation;
    }
    /**
     * Rotation angle of the page in clockwise direction in degree
     *
     * @param float|null $rotation
     *
     * @return self
     */
    public function setRotation(?float $rotation): self
    {
        $this->initialized['rotation'] = true;
        $this->rotation = $rotation;
        return $this;
    }
    /**
     * Width of the page
     *
     * @return float|null
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }
    /**
     * Width of the page
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
     * Index of the page in combined document starting from 1
     *
     * @return int|null
     */
    public function getIndex(): ?int
    {
        return $this->index;
    }
    /**
     * Index of the page in combined document starting from 1
     *
     * @param int|null $index
     *
     * @return self
     */
    public function setIndex(?int $index): self
    {
        $this->initialized['index'] = true;
        $this->index = $index;
        return $this;
    }
    /**
     * Height of the page
     *
     * @return float|null
     */
    public function getHeight(): ?float
    {
        return $this->height;
    }
    /**
     * Height of the page
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