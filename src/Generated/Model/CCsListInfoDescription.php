<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class CCsListInfoDescription
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
     * minimum number of entries allowed in the current CC list
     *
     * @var int|null
     */
    protected $minListCount;
    /**
     * Whether current field is visible or not. If visible attribute for this field is false then this field should not be shown in the agreement creation page using this workflow
     *
     * @var bool|null
     */
    protected $visible;
    /**
     * Whether current field can be edited. If editable attribute for this field is false then this field should not be provided in the agreement creation request and default value of this field will be used in agreement creation
     *
     * @var bool|null
     */
    protected $editable;
    /**
     * Name of the current CC list
     *
     * @var string|null
     */
    protected $name;
    /**
     * An array of default emails that will be used if no input is provided for this list element.
     *
     * @var list<string>|null
     */
    protected $defaultValues;
    /**
     * maximum number of entries allowed in the current CC list
     *
     * @var int|null
     */
    protected $maxListCount;
    /**
     * A display text for the workflow user that can be used for the current CC list
     *
     * @var string|null
     */
    protected $label;
    /**
     * Whether this field is required or optional
     *
     * @var bool|null
     */
    protected $required;
    /**
     * minimum number of entries allowed in the current CC list
     *
     * @return int|null
     */
    public function getMinListCount(): ?int
    {
        return $this->minListCount;
    }
    /**
     * minimum number of entries allowed in the current CC list
     *
     * @param int|null $minListCount
     *
     * @return self
     */
    public function setMinListCount(?int $minListCount): self
    {
        $this->initialized['minListCount'] = true;
        $this->minListCount = $minListCount;
        return $this;
    }
    /**
     * Whether current field is visible or not. If visible attribute for this field is false then this field should not be shown in the agreement creation page using this workflow
     *
     * @return bool|null
     */
    public function getVisible(): ?bool
    {
        return $this->visible;
    }
    /**
     * Whether current field is visible or not. If visible attribute for this field is false then this field should not be shown in the agreement creation page using this workflow
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
     * Name of the current CC list
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the current CC list
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * An array of default emails that will be used if no input is provided for this list element.
     *
     * @return list<string>|null
     */
    public function getDefaultValues(): ?array
    {
        return $this->defaultValues;
    }
    /**
     * An array of default emails that will be used if no input is provided for this list element.
     *
     * @param list<string>|null $defaultValues
     *
     * @return self
     */
    public function setDefaultValues(?array $defaultValues): self
    {
        $this->initialized['defaultValues'] = true;
        $this->defaultValues = $defaultValues;
        return $this;
    }
    /**
     * maximum number of entries allowed in the current CC list
     *
     * @return int|null
     */
    public function getMaxListCount(): ?int
    {
        return $this->maxListCount;
    }
    /**
     * maximum number of entries allowed in the current CC list
     *
     * @param int|null $maxListCount
     *
     * @return self
     */
    public function setMaxListCount(?int $maxListCount): self
    {
        $this->initialized['maxListCount'] = true;
        $this->maxListCount = $maxListCount;
        return $this;
    }
    /**
     * A display text for the workflow user that can be used for the current CC list
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * A display text for the workflow user that can be used for the current CC list
     *
     * @param string|null $label
     *
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
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