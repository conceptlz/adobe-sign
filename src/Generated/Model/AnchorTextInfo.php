<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AnchorTextInfo
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
     * Text to search for to generate form fields relative to
     *
     * @var string|null
     */
    protected $anchorText;
    /**
     * Location information for placing generated form fields relative to the location of text content found within the agreement documents
     *
     * @var AnchoredFormFieldLocation|null
     */
    protected $anchoredFormFieldLocation;
    /**
     * An array of page numbers of the combined document to search for anchored text to generate form fields on. If the fileInfoLabel is specified, the page numbers are relative to that specific input document
     *
     * @var list<int>|null
     */
    protected $pages;
    /**
     * The FileInfo label of a specific FileInfo to search. By default, all documents will be searched
     *
     * @var string|null
     */
    protected $fileInfoLabel;
    /**
     * Text to search for to generate form fields relative to
     *
     * @return string|null
     */
    public function getAnchorText(): ?string
    {
        return $this->anchorText;
    }
    /**
     * Text to search for to generate form fields relative to
     *
     * @param string|null $anchorText
     *
     * @return self
     */
    public function setAnchorText(?string $anchorText): self
    {
        $this->initialized['anchorText'] = true;
        $this->anchorText = $anchorText;
        return $this;
    }
    /**
     * Location information for placing generated form fields relative to the location of text content found within the agreement documents
     *
     * @return AnchoredFormFieldLocation|null
     */
    public function getAnchoredFormFieldLocation(): ?AnchoredFormFieldLocation
    {
        return $this->anchoredFormFieldLocation;
    }
    /**
     * Location information for placing generated form fields relative to the location of text content found within the agreement documents
     *
     * @param AnchoredFormFieldLocation|null $anchoredFormFieldLocation
     *
     * @return self
     */
    public function setAnchoredFormFieldLocation(?AnchoredFormFieldLocation $anchoredFormFieldLocation): self
    {
        $this->initialized['anchoredFormFieldLocation'] = true;
        $this->anchoredFormFieldLocation = $anchoredFormFieldLocation;
        return $this;
    }
    /**
     * An array of page numbers of the combined document to search for anchored text to generate form fields on. If the fileInfoLabel is specified, the page numbers are relative to that specific input document
     *
     * @return list<int>|null
     */
    public function getPages(): ?array
    {
        return $this->pages;
    }
    /**
     * An array of page numbers of the combined document to search for anchored text to generate form fields on. If the fileInfoLabel is specified, the page numbers are relative to that specific input document
     *
     * @param list<int>|null $pages
     *
     * @return self
     */
    public function setPages(?array $pages): self
    {
        $this->initialized['pages'] = true;
        $this->pages = $pages;
        return $this;
    }
    /**
     * The FileInfo label of a specific FileInfo to search. By default, all documents will be searched
     *
     * @return string|null
     */
    public function getFileInfoLabel(): ?string
    {
        return $this->fileInfoLabel;
    }
    /**
     * The FileInfo label of a specific FileInfo to search. By default, all documents will be searched
     *
     * @param string|null $fileInfoLabel
     *
     * @return self
     */
    public function setFileInfoLabel(?string $fileInfoLabel): self
    {
        $this->initialized['fileInfoLabel'] = true;
        $this->fileInfoLabel = $fileInfoLabel;
        return $this;
    }
}