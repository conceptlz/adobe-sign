<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignChildAgreementsFileInfo
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
     * Transient id of the input file which contains participantSetsInfos. Currently only csv format is suppported. More details about CSV format <a href='https://www.adobe.com/go/documentcloud_megasigncsv'>here</a>
     *
     * @var string|null
     */
    protected $transientDocumentId;
    /**
     * Input type through which participantSetsInfos will be provided. Whichever input type is provided, the values should be provided in its corresponding value object. Currently we are supporting CSV file format for providing Send in Bulk child recipients.
     *
     * @var string|null
     */
    protected $fileType;
    /**
     * id of the file containg information about the existing childAgreementsInfo associated with the bulk send. Will be ignored in POST and PUT calls and in the case of GET call, this is the only thing that will be returned. The content of the file can be fetched through GET /megaSigns/{megaSignId}/childAgreementsInfo/{childAgreementsInfoFileId} endpoint.
     *
     * @var string|null
     */
    protected $childAgreementsInfoFileId;
    /**
     * Transient id of the input file which contains participantSetsInfos. Currently only csv format is suppported. More details about CSV format <a href='https://www.adobe.com/go/documentcloud_megasigncsv'>here</a>
     *
     * @return string|null
     */
    public function getTransientDocumentId(): ?string
    {
        return $this->transientDocumentId;
    }
    /**
     * Transient id of the input file which contains participantSetsInfos. Currently only csv format is suppported. More details about CSV format <a href='https://www.adobe.com/go/documentcloud_megasigncsv'>here</a>  
     *
     * @param string|null $transientDocumentId
     *
     * @return self
     */
    public function setTransientDocumentId(?string $transientDocumentId): self
    {
        $this->initialized['transientDocumentId'] = true;
        $this->transientDocumentId = $transientDocumentId;
        return $this;
    }
    /**
     * Input type through which participantSetsInfos will be provided. Whichever input type is provided, the values should be provided in its corresponding value object. Currently we are supporting CSV file format for providing Send in Bulk child recipients.
     *
     * @return string|null
     */
    public function getFileType(): ?string
    {
        return $this->fileType;
    }
    /**
     * Input type through which participantSetsInfos will be provided. Whichever input type is provided, the values should be provided in its corresponding value object. Currently we are supporting CSV file format for providing Send in Bulk child recipients.
     *
     * @param string|null $fileType
     *
     * @return self
     */
    public function setFileType(?string $fileType): self
    {
        $this->initialized['fileType'] = true;
        $this->fileType = $fileType;
        return $this;
    }
    /**
     * id of the file containg information about the existing childAgreementsInfo associated with the bulk send. Will be ignored in POST and PUT calls and in the case of GET call, this is the only thing that will be returned. The content of the file can be fetched through GET /megaSigns/{megaSignId}/childAgreementsInfo/{childAgreementsInfoFileId} endpoint.
     *
     * @return string|null
     */
    public function getChildAgreementsInfoFileId(): ?string
    {
        return $this->childAgreementsInfoFileId;
    }
    /**
     * id of the file containg information about the existing childAgreementsInfo associated with the bulk send. Will be ignored in POST and PUT calls and in the case of GET call, this is the only thing that will be returned. The content of the file can be fetched through GET /megaSigns/{megaSignId}/childAgreementsInfo/{childAgreementsInfoFileId} endpoint.
     *
     * @param string|null $childAgreementsInfoFileId
     *
     * @return self
     */
    public function setChildAgreementsInfoFileId(?string $childAgreementsInfoFileId): self
    {
        $this->initialized['childAgreementsInfoFileId'] = true;
        $this->childAgreementsInfoFileId = $childAgreementsInfoFileId;
        return $this;
    }
}