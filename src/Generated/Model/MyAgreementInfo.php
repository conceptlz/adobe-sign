<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MyAgreementInfo
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
     * A list of account sharer in relation to the api caller and this resource.
     *
     * @var list<AccountSharerInfo>|null
     */
    protected $accountSharers;
    /**
     * A list of account sharer in relation to the api caller and this resource.
     *
     * @return list<AccountSharerInfo>|null
     */
    public function getAccountSharers(): ?array
    {
        return $this->accountSharers;
    }
    /**
     * A list of account sharer in relation to the api caller and this resource.
     *
     * @param list<AccountSharerInfo>|null $accountSharers
     *
     * @return self
     */
    public function setAccountSharers(?array $accountSharers): self
    {
        $this->initialized['accountSharers'] = true;
        $this->accountSharers = $accountSharers;
        return $this;
    }
}