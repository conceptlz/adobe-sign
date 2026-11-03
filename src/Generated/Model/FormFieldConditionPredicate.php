<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FormFieldConditionPredicate
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
     * Name of the field whose value is the basis of predicate
     *
     * @var string|null
     */
    protected $fieldName;
    /**
     * Value to compare against the value of the predicate's form field, using the specified operator
     *
     * @var string|null
     */
    protected $value;
    /**
     * Operator to be applied on the value of the predicate field.
     *
     * @var string|null
     */
    protected $operator;
    /**
     * Index of the location of the form field used in the predicate
     *
     * @var int|null
     */
    protected $fieldLocationIndex;
    /**
     * Name of the field whose value is the basis of predicate
     *
     * @return string|null
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }
    /**
     * Name of the field whose value is the basis of predicate
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
     * Value to compare against the value of the predicate's form field, using the specified operator
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
    /**
     * Value to compare against the value of the predicate's form field, using the specified operator
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
    /**
     * Operator to be applied on the value of the predicate field.
     *
     * @return string|null
     */
    public function getOperator(): ?string
    {
        return $this->operator;
    }
    /**
     * Operator to be applied on the value of the predicate field.
     *
     * @param string|null $operator
     *
     * @return self
     */
    public function setOperator(?string $operator): self
    {
        $this->initialized['operator'] = true;
        $this->operator = $operator;
        return $this;
    }
    /**
     * Index of the location of the form field used in the predicate
     *
     * @return int|null
     */
    public function getFieldLocationIndex(): ?int
    {
        return $this->fieldLocationIndex;
    }
    /**
     * Index of the location of the form field used in the predicate
     *
     * @param int|null $fieldLocationIndex
     *
     * @return self
     */
    public function setFieldLocationIndex(?int $fieldLocationIndex): self
    {
        $this->initialized['fieldLocationIndex'] = true;
        $this->fieldLocationIndex = $fieldLocationIndex;
        return $this;
    }
}