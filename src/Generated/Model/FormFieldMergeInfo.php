<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FormFieldMergeInfo
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
     * A mapping of field names to default values
     *
     * @var list<MergefieldInfo>|null
     */
    protected $fieldMergeInfos;
    /**
     * A mapping of field names to default values
     *
     * @return list<MergefieldInfo>|null
     */
    public function getFieldMergeInfos(): ?array
    {
        return $this->fieldMergeInfos;
    }
    /**
     * A mapping of field names to default values
     *
     * @param list<MergefieldInfo>|null $fieldMergeInfos
     *
     * @return self
     */
    public function setFieldMergeInfos(?array $fieldMergeInfos): self
    {
        $this->initialized['fieldMergeInfos'] = true;
        $this->fieldMergeInfos = $fieldMergeInfos;
        return $this;
    }
}