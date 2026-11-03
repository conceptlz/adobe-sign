<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryDocumentFormFieldPutInfo
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
     * The list of groups of related form fields. Only supports checkbox groups.
     *
     * @var list<FormFieldGroup>|null
     */
    protected $formFieldGroups;
    /**
     * The list of fields to update or replace.
     *
     * @var list<FormField>|null
     */
    protected $fields;
    /**
     * The list of groups of related form fields. Only supports checkbox groups.
     *
     * @return list<FormFieldGroup>|null
     */
    public function getFormFieldGroups(): ?array
    {
        return $this->formFieldGroups;
    }
    /**
     * The list of groups of related form fields. Only supports checkbox groups.
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
     * The list of fields to update or replace.
     *
     * @return list<FormField>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }
    /**
     * The list of fields to update or replace.
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