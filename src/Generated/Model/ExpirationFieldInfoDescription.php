<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ExpirationFieldInfoDescription
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
     * Maximum number of days for agreement expiration
     *
     * @var int|null
     */
    protected $maxDays;
    /**
     * Whether current field is visible or not. If visible attribute for this field is false then this field should not be visible in the agreement creation UI using this workflow to user
     *
     * @var bool|null
     */
    protected $visible;
    /**
     * default value of the field if input for this field is not provided and this field is required
     *
     * @var string|null
     */
    protected $defaultValue;
    /**
     * Whether current field can be edited. If editable attribute for this field is false then this field should not be provided in the agreement creation request and default value of this field will be used in agreement creation
     *
     * @var bool|null
     */
    protected $editable;
    /**
     * Whether this field is required or optional
     *
     * @var bool|null
     */
    protected $required;
    /**
     * Maximum number of days for agreement expiration
     *
     * @return int|null
     */
    public function getMaxDays(): ?int
    {
        return $this->maxDays;
    }
    /**
     * Maximum number of days for agreement expiration
     *
     * @param int|null $maxDays
     *
     * @return self
     */
    public function setMaxDays(?int $maxDays): self
    {
        $this->initialized['maxDays'] = true;
        $this->maxDays = $maxDays;
        return $this;
    }
    /**
     * Whether current field is visible or not. If visible attribute for this field is false then this field should not be visible in the agreement creation UI using this workflow to user
     *
     * @return bool|null
     */
    public function getVisible(): ?bool
    {
        return $this->visible;
    }
    /**
     * Whether current field is visible or not. If visible attribute for this field is false then this field should not be visible in the agreement creation UI using this workflow to user
     *
     * @param bool|null $visible
     *
     * @return self
     */
    public function setVisible(?bool $visible): self
    {
        $this->initialized['visible'] = true;
        $this->visible = $visible;
        return $this;
    }
    /**
     * default value of the field if input for this field is not provided and this field is required
     *
     * @return string|null
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }
    /**
     * default value of the field if input for this field is not provided and this field is required
     *
     * @param string|null $defaultValue
     *
     * @return self
     */
    public function setDefaultValue(?string $defaultValue): self
    {
        $this->initialized['defaultValue'] = true;
        $this->defaultValue = $defaultValue;
        return $this;
    }
    /**
     * Whether current field can be edited. If editable attribute for this field is false then this field should not be provided in the agreement creation request and default value of this field will be used in agreement creation
     *
     * @return bool|null
     */
    public function getEditable(): ?bool
    {
        return $this->editable;
    }
    /**
     * Whether current field can be edited. If editable attribute for this field is false then this field should not be provided in the agreement creation request and default value of this field will be used in agreement creation
     *
     * @param bool|null $editable
     *
     * @return self
     */
    public function setEditable(?bool $editable): self
    {
        $this->initialized['editable'] = true;
        $this->editable = $editable;
        return $this;
    }
    /**
     * Whether this field is required or optional
     *
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }
    /**
     * Whether this field is required or optional
     *
     * @param bool|null $required
     *
     * @return self
     */
    public function setRequired(?bool $required): self
    {
        $this->initialized['required'] = true;
        $this->required = $required;
        return $this;
    }
}