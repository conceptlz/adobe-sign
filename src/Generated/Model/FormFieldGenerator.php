<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FormFieldGenerator
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
     * The prefix name of each generated form field
     *
     * @var string|null
     */
    protected $formFieldNamePrefix;
    /**
     * The name of the participant set to assign the generated form field with
     *
     * @var string|null
     */
    protected $participantSetName;
    /**
     * The descriptive attributes of a form field.
     *
     * @var FormFieldDescription|null
     */
    protected $formFieldDescription;
    /**
     * Information required for generating form fields relative to text content within the agreement documents
     *
     * @var AnchorTextInfo|null
     */
    protected $anchorTextInfo;
    /**
     * The type of form field generator, default ANCHOR_TEXT
     *
     * @var string|null
     */
    protected $generatorType;
    /**
     * By default duplicate generated form fields will be linked as references unless linked is false in which case unique form fields will be created
     *
     * @var bool|null
     */
    protected $linked;
    /**
     * The prefix name of each generated form field
     *
     * @return string|null
     */
    public function getFormFieldNamePrefix(): ?string
    {
        return $this->formFieldNamePrefix;
    }
    /**
     * The prefix name of each generated form field
     *
     * @param string|null $formFieldNamePrefix
     *
     * @return self
     */
    public function setFormFieldNamePrefix(?string $formFieldNamePrefix): self
    {
        $this->initialized['formFieldNamePrefix'] = true;
        $this->formFieldNamePrefix = $formFieldNamePrefix;
        return $this;
    }
    /**
     * The name of the participant set to assign the generated form field with
     *
     * @return string|null
     */
    public function getParticipantSetName(): ?string
    {
        return $this->participantSetName;
    }
    /**
     * The name of the participant set to assign the generated form field with
     *
     * @param string|null $participantSetName
     *
     * @return self
     */
    public function setParticipantSetName(?string $participantSetName): self
    {
        $this->initialized['participantSetName'] = true;
        $this->participantSetName = $participantSetName;
        return $this;
    }
    /**
     * The descriptive attributes of a form field.
     *
     * @return FormFieldDescription|null
     */
    public function getFormFieldDescription(): ?FormFieldDescription
    {
        return $this->formFieldDescription;
    }
    /**
     * The descriptive attributes of a form field.
     *
     * @param FormFieldDescription|null $formFieldDescription
     *
     * @return self
     */
    public function setFormFieldDescription(?FormFieldDescription $formFieldDescription): self
    {
        $this->initialized['formFieldDescription'] = true;
        $this->formFieldDescription = $formFieldDescription;
        return $this;
    }
    /**
     * Information required for generating form fields relative to text content within the agreement documents
     *
     * @return AnchorTextInfo|null
     */
    public function getAnchorTextInfo(): ?AnchorTextInfo
    {
        return $this->anchorTextInfo;
    }
    /**
     * Information required for generating form fields relative to text content within the agreement documents
     *
     * @param AnchorTextInfo|null $anchorTextInfo
     *
     * @return self
     */
    public function setAnchorTextInfo(?AnchorTextInfo $anchorTextInfo): self
    {
        $this->initialized['anchorTextInfo'] = true;
        $this->anchorTextInfo = $anchorTextInfo;
        return $this;
    }
    /**
     * The type of form field generator, default ANCHOR_TEXT
     *
     * @return string|null
     */
    public function getGeneratorType(): ?string
    {
        return $this->generatorType;
    }
    /**
     * The type of form field generator, default ANCHOR_TEXT
     *
     * @param string|null $generatorType
     *
     * @return self
     */
    public function setGeneratorType(?string $generatorType): self
    {
        $this->initialized['generatorType'] = true;
        $this->generatorType = $generatorType;
        return $this;
    }
    /**
     * By default duplicate generated form fields will be linked as references unless linked is false in which case unique form fields will be created
     *
     * @return bool|null
     */
    public function getLinked(): ?bool
    {
        return $this->linked;
    }
    /**
     * By default duplicate generated form fields will be linked as references unless linked is false in which case unique form fields will be created
     *
     * @param bool|null $linked
     *
     * @return self
     */
    public function setLinked(?bool $linked): self
    {
        $this->initialized['linked'] = true;
        $this->linked = $linked;
        return $this;
    }
}