<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class BooleanSettingInfo
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
     * True if setting is inherited from its group or account value.
     *
     * @var bool|null
     */
    protected $inherited;
    /**
     * Value of the setting.
     *
     * @var bool|null
     */
    protected $value;
    /**
     * True if setting is inherited from its group or account value.
     *
     * @return bool|null
     */
    public function getInherited(): ?bool
    {
        return $this->inherited;
    }
    /**
     * True if setting is inherited from its group or account value.
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
     * Value of the setting.
     *
     * @return bool|null
     */
    public function getValue(): ?bool
    {
        return $this->value;
    }
    /**
     * Value of the setting.
     *
     * @param bool|null $value
     *
     * @return self
     */
    public function setValue(?bool $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}