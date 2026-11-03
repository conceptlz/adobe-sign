<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FormFieldHyperlink
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
     * Type of link in an agreement.
     *
     * @var string|null
     */
    protected $linkType;
    /**
     * Location information for form fields
     *
     * @var FormFieldLocation|null
     */
    protected $documentLocation;
    /**
     * URL, in case of EXTERNAL type link
     *
     * @var string|null
     */
    protected $url;
    /**
     * Type of link in an agreement.
     *
     * @return string|null
     */
    public function getLinkType(): ?string
    {
        return $this->linkType;
    }
    /**
     * Type of link in an agreement.
     *
     * @param string|null $linkType
     *
     * @return self
     */
    public function setLinkType(?string $linkType): self
    {
        $this->initialized['linkType'] = true;
        $this->linkType = $linkType;
        return $this;
    }
    /**
     * Location information for form fields
     *
     * @return FormFieldLocation|null
     */
    public function getDocumentLocation(): ?FormFieldLocation
    {
        return $this->documentLocation;
    }
    /**
     * Location information for form fields
     *
     * @param FormFieldLocation|null $documentLocation
     *
     * @return self
     */
    public function setDocumentLocation(?FormFieldLocation $documentLocation): self
    {
        $this->initialized['documentLocation'] = true;
        $this->documentLocation = $documentLocation;
        return $this;
    }
    /**
     * URL, in case of EXTERNAL type link
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * URL, in case of EXTERNAL type link
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
}