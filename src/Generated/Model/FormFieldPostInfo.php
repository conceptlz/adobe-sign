<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FormFieldPostInfo
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
     * The ID of the template from which to add new fields
     *
     * @var string|null
     */
    protected $templateId;
    /**
     * The ID of the template from which to add new fields
     *
     * @return string|null
     */
    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }
    /**
     * The ID of the template from which to add new fields
     *
     * @param string|null $templateId
     *
     * @return self
     */
    public function setTemplateId(?string $templateId): self
    {
        $this->initialized['templateId'] = true;
        $this->templateId = $templateId;
        return $this;
    }
}