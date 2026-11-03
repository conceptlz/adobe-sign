<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MergeFieldInfoDescription
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
     * Name of the custom field in this workflow
     *
     * @var string|null
     */
    protected $fieldName;
    /**
     * Whether current field should be visible on agreement creation page. If visible attribute for this field is false then this field should not be shown on the agreement creation page using this workflow
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
     * The display text that can be shown for this custom field
     *
     * @var string|null
     */
    protected $displayName;
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
     * Name of the custom field in this workflow
     *
     * @return string|null
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }
    /**
     * Name of the custom field in this workflow
     *
     * @param string|null $fieldName
     *
     * @return self
     */
    public function setFieldName(?string $fieldName): self
    {
        $this->initialized['fieldName'] = true;
        $this->fieldName = $fieldName;
        return $this;
    }
    /**
     * Whether current field should be visible on agreement creation page. If visible attribute for this field is false then this field should not be shown on the agreement creation page using this workflow
     *
     * @return bool|null
     */
    public function getVisible(): ?bool
    {
        return $this->visible;
    }
    /**
     * Whether current field should be visible on agreement creation page. If visible attribute for this field is false then this field should not be shown on the agreement creation page using this workflow
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
     * The display text that can be shown for this custom field
     *
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
    /**
     * The display text that can be shown for this custom field
     *
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;
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