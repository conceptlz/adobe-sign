<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SettingUpdateDataInfo
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
     * True if the setting value is inherited.  In which case, the value property is ignored.
     *
     * @var bool|null
     */
    protected $inherited;
    /**
     * Name of the setting
     *
     * @var string|null
     */
    protected $name;
    /**
     * Value of the setting.
     *
     * @var string|null
     */
    protected $value;
    /**
     * True if the setting value is inherited.  In which case, the value property is ignored.
     *
     * @return bool|null
     */
    public function getInherited(): ?bool
    {
        return $this->inherited;
    }
    /**
     * True if the setting value is inherited.  In which case, the value property is ignored.
     *
     * @param bool|null $inherited
     *
     * @return self
     */
    public function setInherited(?bool $inherited): self
    {
        $this->initialized['inherited'] = true;
        $this->inherited = $inherited;
        return $this;
    }
    /**
     * Name of the setting
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the setting
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
     * Value of the setting.
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * Value of the setting.
     *
     * @param string|null $value
     *
     * @return self
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}