<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DeleteAgreementShareInfoList
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
     * The list of share deletions
     *
     * @var list<DeleteAgreementSharesInfo>|null
     */
    protected $deleteAgreementSharesInfo;
    /**
     * The list of share deletions
     *
     * @return list<DeleteAgreementSharesInfo>|null
     */
    public function getDeleteAgreementSharesInfo(): ?array
    {
        return $this->deleteAgreementSharesInfo;
    }
    /**
     * The list of share deletions
     *
     * @param list<DeleteAgreementSharesInfo>|null $deleteAgreementSharesInfo
     *
     * @return self
     */
    public function setDeleteAgreementSharesInfo(?array $deleteAgreementSharesInfo): self
    {
        $this->initialized['deleteAgreementSharesInfo'] = true;
        $this->deleteAgreementSharesInfo = $deleteAgreementSharesInfo;
        return $this;
    }
}