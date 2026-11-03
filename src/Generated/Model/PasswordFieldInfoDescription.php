<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class PasswordFieldInfoDescription
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
     * Whether password info field is visible on agreement creation page
     *
     * @var bool|null
     */
    protected $visible;
    /**
     * Default value of the password info field
     *
     * @var string|null
     */
    protected $defaultValue;
    /**
     *  Whether workflow password info field is editable
     *
     * @var bool|null
     */
    protected $editable;
    /**
     * Name of password field
     *
     * @var string|null
     */
    protected $name;
    /**
     * Label of password field
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
     * Whether password info field is visible on agreement creation page
     *
     * @return bool|null
     */
    public function getVisible(): ?bool
    {
        return $this->visible;
    }
    /**
     * Whether password info field is visible on agreement creation page
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
     * Default value of the password info field
     *
     * @return string|null
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }
    /**
     * Default value of the password info field
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
     *  Whether workflow password info field is editable
     *
     * @return bool|null
     */
    public function getEditable(): ?bool
    {
        return $this->editable;
    }
    /**
     *  Whether workflow password info field is editable
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
     * Name of password field
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of password field
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
     * Label of password field
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * Label of password field
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