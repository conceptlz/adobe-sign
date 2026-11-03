<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignFormFieldPutInfo
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
     * The list of fields to update or replace.
     *
     * @var list<MegaSignFormField>|null
     */
    protected $fields;
    /**
     * The list of fields to update or replace.
     *
     * @return list<MegaSignFormField>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }
    /**
     * The list of fields to update or replace.
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