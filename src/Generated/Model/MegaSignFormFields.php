<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignFormFields
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
     * List of the form fields in an agreement
     *
     * @var list<MegaSignFormField>|null
     */
    protected $fields;
    /**
     * List of the form fields in an agreement
     *
     * @return list<MegaSignFormField>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }
    /**
     * List of the form fields in an agreement
     *
     * @param list<MegaSignFormField>|null $fields
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