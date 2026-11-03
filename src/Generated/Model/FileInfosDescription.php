<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FileInfosDescription
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
     * Name of the fileInfo element
     *
     * @var string|null
     */
    protected $name;
    /**
     * A list of workflow library documents out of which one workflow library document can be selected with this fileInfo object
     *
     * @var list<WorkflowLibraryDocument>|null
     */
    protected $workflowLibraryDocumentSelectorList;
    /**
     * Display label of this field for external users
     *
     * @var string|null
     */
    protected $label;
    /**
     * Whether this field is required or optional
     *
     * @var bool|null
     */
    protected $required;
    /**
     * Name of the fileInfo element
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the fileInfo element
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
    /**
     * A list of workflow library documents out of which one workflow library document can be selected with this fileInfo object
     *
     * @return list<WorkflowLibraryDocument>|null
     */
    public function getWorkflowLibraryDocumentSelectorList(): ?array
    {
        return $this->workflowLibraryDocumentSelectorList;
    }
    /**
     * A list of workflow library documents out of which one workflow library document can be selected with this fileInfo object
     *
     * @param list<WorkflowLibraryDocument>|null $workflowLibraryDocumentSelectorList
     *
     * @return self
     */
    public function setWorkflowLibraryDocumentSelectorList(?array $workflowLibraryDocumentSelectorList): self
    {
        $this->initialized['workflowLibraryDocumentSelectorList'] = true;
        $this->workflowLibraryDocumentSelectorList = $workflowLibraryDocumentSelectorList;
        return $this;
    }
    /**
     * Display label of this field for external users
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * Display label of this field for external users
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
    /**
     * Whether this field is required or optional
     *
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }
    /**
     * Whether this field is required or optional
     *
     * @param bool|null $required
     *
     * @return self
     */
    public function setRequired(?bool $required): self
    {
        $this->initialized['required'] = true;
        $this->required = $required;
        return $this;
    }
}