<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MergefieldInfo
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
     * The name of the field
     *
     * @var string|null
     */
    protected $fieldName;
    /**
     * The default value of the field
     *
     * @var string|null
     */
    protected $defaultValue;
    /**
     * The name of the field
     *
     * @return string|null
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }
    /**
     * The name of the field
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
     * The default value of the field
     *
     * @return string|null
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }
    /**
     * The default value of the field
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
}