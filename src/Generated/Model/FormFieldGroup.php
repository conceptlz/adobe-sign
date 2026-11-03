<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FormFieldGroup
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
     * Validation rule applicable for the group. At least one of minSelection or maxSelection should be specified.
     *
     * @var FormFieldGroupValidationRule|null
     */
    protected $validationRule;
    /**
     * List of form field names which are to be grouped.
     *
     * @var list<string>|null
     */
    protected $fieldNames;
    /**
     * Name for the form field group.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Validation rule applicable for the group. At least one of minSelection or maxSelection should be specified.
     *
     * @return FormFieldGroupValidationRule|null
     */
    public function getValidationRule(): ?FormFieldGroupValidationRule
    {
        return $this->validationRule;
    }
    /**
     * Validation rule applicable for the group. At least one of minSelection or maxSelection should be specified.
     *
     * @param FormFieldGroupValidationRule|null $validationRule
     *
     * @return self
     */
    public function setValidationRule(?FormFieldGroupValidationRule $validationRule): self
    {
        $this->initialized['validationRule'] = true;
        $this->validationRule = $validationRule;
        return $this;
    }
    /**
     * List of form field names which are to be grouped.
     *
     * @return list<string>|null
     */
    public function getFieldNames(): ?array
    {
        return $this->fieldNames;
    }
    /**
     * List of form field names which are to be grouped.
     *
     * @param list<string>|null $fieldNames
     *
     * @return self
     */
    public function setFieldNames(?array $fieldNames): self
    {
        $this->initialized['fieldNames'] = true;
        $this->fieldNames = $fieldNames;
        return $this;
    }
    /**
     * Name for the form field group.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name for the form field group.
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
}