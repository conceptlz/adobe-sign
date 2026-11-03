<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DocumentImageUrls
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
     * A list of image url (one per page).
     *
     * @var list<PageImageUrl>|null
     */
    protected $imageURLs;
    /**
     * true if images for the associated image size is available, else false.
     *
     * @var bool|null
     */
    protected $imagesAvailable;
    /**
     * ImageSize corresponding to the imageUrl returned
     *
     * @var string|null
     */
    protected $imageSize;
    /**
     * A list of image url (one per page).
     *
     * @return list<PageImageUrl>|null
     */
    public function getImageURLs(): ?array
    {
        return $this->imageURLs;
    }
    /**
     * A list of image url (one per page).
     *
     * @param list<PageImageUrl>|null $imageURLs
     *
     * @return self
     */
    public function setImageURLs(?array $imageURLs): self
    {
        $this->initialized['imageURLs'] = true;
        $this->imageURLs = $imageURLs;
        return $this;
    }
    /**
     * true if images for the associated image size is available, else false.
     *
     * @return bool|null
     */
    public function getImagesAvailable(): ?bool
    {
        return $this->imagesAvailable;
    }
    /**
     * true if images for the associated image size is available, else false.
     *
     * @param bool|null $imagesAvailable
     *
     * @return self
     */
    public function setImagesAvailable(?bool $imagesAvailable): self
    {
        $this->initialized['imagesAvailable'] = true;
        $this->imagesAvailable = $imagesAvailable;
        return $this;
    }
    /**
     * ImageSize corresponding to the imageUrl returned
     *
     * @return string|null
     */
    public function getImageSize(): ?string
    {
        return $this->imageSize;
    }
    /**
     * ImageSize corresponding to the imageUrl returned 
     *
     * @param string|null $imageSize
     *
     * @return self
     */
    public function setImageSize(?string $imageSize): self
    {
        $this->initialized['imageSize'] = true;
        $this->imageSize = $imageSize;
        return $this;
    }
}