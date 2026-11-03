<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AccountCreationInfo
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
     * Number of seats
     *
     * @var int|null
     */
    protected $numSeats;
    /**
     * Account trial duration
     *
     * @var int|null
     */
    protected $trialDuration;
    /**
     * Account country code
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Type of account
     *
     * @var string|null
     */
    protected $accountType;
    /**
     * External id for the account
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * Company name
     *
     * @var string|null
     */
    protected $company;
    /**
     * AdminUserInfo
     *
     * @var AdminUserInfo|null
     */
    protected $adminUserInfo;
    /**
     * Account locale
     *
     * @var string|null
     */
    protected $locale;
    /**
     * Number of seats
     *
     * @return int|null
     */
    public function getNumSeats(): ?int
    {
        return $this->numSeats;
    }
    /**
     * Number of seats
     *
     * @param int|null $numSeats
     *
     * @return self
     */
    public function setNumSeats(?int $numSeats): self
    {
        $this->initialized['numSeats'] = true;
        $this->numSeats = $numSeats;
        return $this;
    }
    /**
     * Account trial duration
     *
     * @return int|null
     */
    public function getTrialDuration(): ?int
    {
        return $this->trialDuration;
    }
    /**
     * Account trial duration
     *
     * @param int|null $trialDuration
     *
     * @return self
     */
    public function setTrialDuration(?int $trialDuration): self
    {
        $this->initialized['trialDuration'] = true;
        $this->trialDuration = $trialDuration;
        return $this;
    }
    /**
     * Account country code
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * Account country code
     *
     * @param string|null $countryCode
     *
     * @return self
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;
        return $this;
    }
    /**
     * Type of account
     *
     * @return string|null
     */
    public function getAccountType(): ?string
    {
        return $this->accountType;
    }
    /**
     * Type of account
     *
     * @param string|null $accountType
     *
     * @return self
     */
    public function setAccountType(?string $accountType): self
    {
        $this->initialized['accountType'] = true;
        $this->accountType = $accountType;
        return $this;
    }
    /**
     * External id for the account
     *
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }
    /**
     * External id for the account
     *
     * @param string|null $externalId
     *
     * @return self
     */
    public function setExternalId(?string $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;
        return $this;
    }
    /**
     * Company name
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * Company name
     *
     * @param string|null $company
     *
     * @return self
     */
    public function setCompany(?string $company): self
    {
        $this->initialized['company'] = true;
        $this->company = $company;
        return $this;
    }
    /**
     * AdminUserInfo
     *
     * @return AdminUserInfo|null
     */
    public function getAdminUserInfo(): ?AdminUserInfo
    {
        return $this->adminUserInfo;
    }
    /**
     * AdminUserInfo
     *
     * @param AdminUserInfo|null $adminUserInfo
     *
     * @return self
     */
    public function setAdminUserInfo(?AdminUserInfo $adminUserInfo): self
    {
        $this->initialized['adminUserInfo'] = true;
        $this->adminUserInfo = $adminUserInfo;
        return $this;
    }
    /**
     * Account locale
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
    /**
     * Account locale
     *
     * @param string|null $locale
     *
     * @return self
     */
    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;
        return $this;
    }
}