<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class VisibilityInfo
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
     * Specifies the visibility. The possible values are HIDE or SHOW
     *
     * @var string|null
     */
    protected $visibility;
    /**
     * Specifies the visibility. The possible values are HIDE or SHOW
     *
     * @return string|null
     */
    public function getVisibility(): ?string
    {
        return $this->visibility;
    }
    /**
     * Specifies the visibility. The possible values are HIDE or SHOW
     *
     * @param string|null $visibility
     *
     * @return self
     */
    public function setVisibility(?string $visibility): self
    {
        $this->initialized['visibility'] = true;
        $this->visibility = $visibility;
        return $this;
    }
}