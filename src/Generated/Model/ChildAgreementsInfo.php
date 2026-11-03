<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ChildAgreementsInfo
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
     * @var MegaSignChildAgreementsFileInfo|null
     */
    protected $fileInfo;
    /**
     * @return MegaSignChildAgreementsFileInfo|null
     */
    public function getFileInfo(): ?MegaSignChildAgreementsFileInfo
    {
        return $this->fileInfo;
    }
    /**
     * @param MegaSignChildAgreementsFileInfo|null $fileInfo
     *
     * @return self
     */
    public function setFileInfo(?MegaSignChildAgreementsFileInfo $fileInfo): self
    {
        $this->initialized['fileInfo'] = true;
        $this->fileInfo = $fileInfo;
        return $this;
    }
}