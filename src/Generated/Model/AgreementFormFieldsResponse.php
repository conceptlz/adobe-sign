<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementFormFieldsResponse
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
     * List of the form field groups in an agreement
     *
     * @var list<FormFieldGroup>|null
     */
    protected $formFieldGroups;
    /**
     * List of the form fields in an agreement
     *
     * @var list<FormField>|null
     */
    protected $fields;
    /**
     * List of the form field groups in an agreement
     *
     * @return list<FormFieldGroup>|null
     */
    public function getFormFieldGroups(): ?array
    {
        return $this->formFieldGroups;
    }
    /**
     * List of the form field groups in an agreement
     *
     * @param list<FormFieldGroup>|null $formFieldGroups
     *
     * @return self
     */
    public function setFormFieldGroups(?array $formFieldGroups): self
    {
        $this->initialized['formFieldGroups'] = true;
        $this->formFieldGroups = $formFieldGroups;
        return $this;
    }
    /**
     * List of the form fields in an agreement
     *
     * @return list<FormField>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }
    /**
     * List of the form fields in an agreement
     *
     * @param list<FormField>|null $fields
     *
     * @return self
     */
    public function setFields(?array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;
        return $this;
    }
}