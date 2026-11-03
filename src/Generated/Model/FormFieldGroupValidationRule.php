<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FormFieldGroupValidationRule
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
     * Minimum number of fields to select for action in the group.
     *
     * @var int|null
     */
    protected $minSelection;
    /**
     * Maximum number of fields to select for action in the group.
     *
     * @var int|null
     */
    protected $maxSelection;
    /**
     * Minimum number of fields to select for action in the group.
     *
     * @return int|null
     */
    public function getMinSelection(): ?int
    {
        return $this->minSelection;
    }
    /**
     * Minimum number of fields to select for action in the group.
     *
     * @param int|null $minSelection
     *
     * @return self
     */
    public function setMinSelection(?int $minSelection): self
    {
        $this->initialized['minSelection'] = true;
        $this->minSelection = $minSelection;
        return $this;
    }
    /**
     * Maximum number of fields to select for action in the group.
     *
     * @return int|null
     */
    public function getMaxSelection(): ?int
    {
        return $this->maxSelection;
    }
    /**
     * Maximum number of fields to select for action in the group.
     *
     * @param int|null $maxSelection
     *
     * @return self
     */
    public function setMaxSelection(?int $maxSelection): self
    {
        $this->initialized['maxSelection'] = true;
        $this->maxSelection = $maxSelection;
        return $this;
    }
}