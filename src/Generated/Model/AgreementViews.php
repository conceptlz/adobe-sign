<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementViews
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
     * List of agreement views
     *
     * @var list<AgreementView>|null
     */
    protected $agreementViewList;
    /**
     * List of agreement views
     *
     * @return list<AgreementView>|null
     */
    public function getAgreementViewList(): ?array
    {
        return $this->agreementViewList;
    }
    /**
     * List of agreement views
     *
     * @param list<AgreementView>|null $agreementViewList
     *
     * @return self
     */
    public function setAgreementViewList(?array $agreementViewList): self
    {
        $this->initialized['agreementViewList'] = true;
        $this->agreementViewList = $agreementViewList;
        return $this;
    }
}