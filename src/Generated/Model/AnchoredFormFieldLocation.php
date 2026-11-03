<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AnchoredFormFieldLocation
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
     * The x offset from the anchor text to the form field in default user space units
     *
     * @var float|null
     */
    protected $offsetX;
    /**
     * The y offset from the anchor text to the form field in default user space units
     *
     * @var float|null
     */
    protected $offsetY;
    /**
     * The generated form field width in default user space units
     *
     * @var float|null
     */
    protected $width;
    /**
     * The generated form field height in default user space units
     *
     * @var float|null
     */
    protected $height;
    /**
     * The x offset from the anchor text to the form field in default user space units
     *
     * @return float|null
     */
    public function getOffsetX(): ?float
    {
        return $this->offsetX;
    }
    /**
     * The x offset from the anchor text to the form field in default user space units
     *
     * @param float|null $offsetX
     *
     * @return self
     */
    public function setOffsetX(?float $offsetX): self
    {
        $this->initialized['offsetX'] = true;
        $this->offsetX = $offsetX;
        return $this;
    }
    /**
     * The y offset from the anchor text to the form field in default user space units
     *
     * @return float|null
     */
    public function getOffsetY(): ?float
    {
        return $this->offsetY;
    }
    /**
     * The y offset from the anchor text to the form field in default user space units
     *
     * @param float|null $offsetY
     *
     * @return self
     */
    public function setOffsetY(?float $offsetY): self
    {
        $this->initialized['offsetY'] = true;
        $this->offsetY = $offsetY;
        return $this;
    }
    /**
     * The generated form field width in default user space units
     *
     * @return float|null
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }
    /**
     * The generated form field width in default user space units
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
     * The generated form field height in default user space units
     *
     * @return float|null
     */
    public function getHeight(): ?float
    {
        return $this->height;
    }
    /**
     * The generated form field height in default user space units
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