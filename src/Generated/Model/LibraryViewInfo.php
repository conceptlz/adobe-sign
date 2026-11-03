<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class LibraryViewInfo
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
     * @var LibraryDocumentCommonViewConfiguration|null
     */
    protected $commonViewConfiguration;
    /**
     * Name of the requested libraryDocument view
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var SendViewConfiguration|null
     */
    protected $sendViewConfiguration;
    /**
     * @return LibraryDocumentCommonViewConfiguration|null
     */
    public function getCommonViewConfiguration(): ?LibraryDocumentCommonViewConfiguration
    {
        return $this->commonViewConfiguration;
    }
    /**
     * @param LibraryDocumentCommonViewConfiguration|null $commonViewConfiguration
     *
     * @return self
     */
    public function setCommonViewConfiguration(?LibraryDocumentCommonViewConfiguration $commonViewConfiguration): self
    {
        $this->initialized['commonViewConfiguration'] = true;
        $this->commonViewConfiguration = $commonViewConfiguration;
        return $this;
    }
    /**
     * Name of the requested libraryDocument view
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the requested libraryDocument view
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
     * @return SendViewConfiguration|null
     */
    public function getSendViewConfiguration(): ?SendViewConfiguration
    {
        return $this->sendViewConfiguration;
    }
    /**
     * @param SendViewConfiguration|null $sendViewConfiguration
     *
     * @return self
     */
    public function setSendViewConfiguration(?SendViewConfiguration $sendViewConfiguration): self
    {
        $this->initialized['sendViewConfiguration'] = true;
        $this->sendViewConfiguration = $sendViewConfiguration;
        return $this;
    }
}