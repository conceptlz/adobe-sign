<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AccountCreateResponse
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
     * Account id of the created account
     *
     * @var string|null
     */
    protected $accountId;
    /**
     * AdminDetails
     *
     * @var AdminDetails|null
     */
    protected $adminDetails;
    /**
     * Account id of the created account
     *
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }
    /**
     * Account id of the created account
     *
     * @param string|null $accountId
     *
     * @return self
     */
    public function setAccountId(?string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;
        return $this;
    }
    /**
     * AdminDetails
     *
     * @return AdminDetails|null
     */
    public function getAdminDetails(): ?AdminDetails
    {
        return $this->adminDetails;
    }
    /**
     * AdminDetails
     *
     * @param AdminDetails|null $adminDetails
     *
     * @return self
     */
    public function setAdminDetails(?AdminDetails $adminDetails): self
    {
        $this->initialized['adminDetails'] = true;
        $this->adminDetails = $adminDetails;
        return $this;
    }
}