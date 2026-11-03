<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WorkflowLibraryDocument
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
     * A list of one or more library template types
     *
     * @var list<string>|null
     */
    protected $templateTypes;
    /**
     * Specifies who should have access to this library document. GLOBAL sharing is a restricted operation.
     *
     * @var string|null
     */
    protected $sharingMode;
    /**
     * The date on which the library document was last modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $modifiedDate;
    /**
     * An id of the workflow library document that can be provided as an input file in the custom workflow agreement creation request
     *
     * @var string|null
     */
    protected $workflowLibDoc;
    /**
     * A display text for this form for workflow users
     *
     * @var string|null
     */
    protected $label;
    /**
     * A list of one or more library template types
     *
     * @return list<string>|null
     */
    public function getTemplateTypes(): ?array
    {
        return $this->templateTypes;
    }
    /**
     * A list of one or more library template types
     *
     * @param list<string>|null $templateTypes
     *
     * @return self
     */
    public function setTemplateTypes(?array $templateTypes): self
    {
        $this->initialized['templateTypes'] = true;
        $this->templateTypes = $templateTypes;
        return $this;
    }
    /**
     * Specifies who should have access to this library document. GLOBAL sharing is a restricted operation.
     *
     * @return string|null
     */
    public function getSharingMode(): ?string
    {
        return $this->sharingMode;
    }
    /**
     * Specifies who should have access to this library document. GLOBAL sharing is a restricted operation.
     *
     * @param string|null $sharingMode
     *
     * @return self
     */
    public function setSharingMode(?string $sharingMode): self
    {
        $this->initialized['sharingMode'] = true;
        $this->sharingMode = $sharingMode;
        return $this;
    }
    /**
     * The date on which the library document was last modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getModifiedDate(): ?string
    {
        return $this->modifiedDate;
    }
    /**
     * The date on which the library document was last modified. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $modifiedDate
     *
     * @return self
     */
    public function setModifiedDate(?string $modifiedDate): self
    {
        $this->initialized['modifiedDate'] = true;
        $this->modifiedDate = $modifiedDate;
        return $this;
    }
    /**
     * An id of the workflow library document that can be provided as an input file in the custom workflow agreement creation request
     *
     * @return string|null
     */
    public function getWorkflowLibDoc(): ?string
    {
        return $this->workflowLibDoc;
    }
    /**
     * An id of the workflow library document that can be provided as an input file in the custom workflow agreement creation request
     *
     * @param string|null $workflowLibDoc
     *
     * @return self
     */
    public function setWorkflowLibDoc(?string $workflowLibDoc): self
    {
        $this->initialized['workflowLibDoc'] = true;
        $this->workflowLibDoc = $workflowLibDoc;
        return $this;
    }
    /**
     * A display text for this form for workflow users
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * A display text for this form for workflow users
     *
     * @param string|null $label
     *
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
        return $this;
    }
}