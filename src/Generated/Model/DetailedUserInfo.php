<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DetailedUserInfo
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
     * The last name of the user
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * The date of password expiration
     *
     * @var string|null
     */
    protected $passwordExpiration;
    /**
     * The initials of the user
     *
     * @var string|null
     */
    protected $initials;
    /**
     * Type of account to which the user belongs (null if no account). If provided in POST or PUT it will be ignored.
     *
     * @var string|null
     */
    protected $accountType;
    /**
     * The UI locale of the user
     *
     * @var string|null
     */
    protected $locale;
    /**
     * The job title of the user
     *
     * @var string|null
     */
    protected $title;
    /**
     * The account id of the user. This will be ignored as part of PUT calls.
     *
     * @var string|null
     */
    protected $accountId;
    /**
     * The first name of the user
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * The area code of the user's phone number
     *
     * @var int|null
     */
    protected $areaCode;
    /**
     * True if the user is account admin. This will be ignored as part of PUT calls.
     *
     * @var bool|null
     */
    protected $isAccountAdmin;
    /**
     * The date the user was created. If provided in POST or PUT it will be ignored
     *
     * @var string|null
     */
    protected $createdDate;
    /**
     * The phone number of the user
     *
     * @var string|null
     */
    protected $phone;
    /**
     * Primary group in which the new user should be added. Default is the default group for the account the user is being added to. This will be ignored as part of PUT calls
     *
     * @var string|null
     */
    protected $primaryGroupId;
    /**
     * The name of company of the user
     *
     * @var string|null
     */
    protected $company;
    /**
     * A unique identifier of the user resource for REST APIs as issued by Acrobat Sign.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The date of the user's last password change. Null if the user has never changed their password, or if the user has no password expiration set
     *
     * @var string|null
     */
    protected $lastPasswordChange;
    /**
     * The email address of the user
     *
     * @var string|null
     */
    protected $email;
    /**
     * Status of the user. If provided in POST it will be ignored.
     *
     * @var string|null
     */
    protected $status;
    /**
     * The last name of the user
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }
    /**
     * The last name of the user
     *
     * @param string|null $lastName
     *
     * @return self
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;
        return $this;
    }
    /**
     * The date of password expiration
     *
     * @return string|null
     */
    public function getPasswordExpiration(): ?string
    {
        return $this->passwordExpiration;
    }
    /**
     * The date of password expiration
     *
     * @param string|null $passwordExpiration
     *
     * @return self
     */
    public function setPasswordExpiration(?string $passwordExpiration): self
    {
        $this->initialized['passwordExpiration'] = true;
        $this->passwordExpiration = $passwordExpiration;
        return $this;
    }
    /**
     * The initials of the user
     *
     * @return string|null
     */
    public function getInitials(): ?string
    {
        return $this->initials;
    }
    /**
     * The initials of the user
     *
     * @param string|null $initials
     *
     * @return self
     */
    public function setInitials(?string $initials): self
    {
        $this->initialized['initials'] = true;
        $this->initials = $initials;
        return $this;
    }
    /**
     * Type of account to which the user belongs (null if no account). If provided in POST or PUT it will be ignored.
     *
     * @return string|null
     */
    public function getAccountType(): ?string
    {
        return $this->accountType;
    }
    /**
     * Type of account to which the user belongs (null if no account). If provided in POST or PUT it will be ignored.
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
     * The UI locale of the user
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
    /**
     * The UI locale of the user
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
    /**
     * The job title of the user
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * The job title of the user
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * The account id of the user. This will be ignored as part of PUT calls.
     *
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }
    /**
     * The account id of the user. This will be ignored as part of PUT calls.
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
     * The first name of the user
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }
    /**
     * The first name of the user
     *
     * @param string|null $firstName
     *
     * @return self
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;
        return $this;
    }
    /**
     * The area code of the user's phone number
     *
     * @return int|null
     */
    public function getAreaCode(): ?int
    {
        return $this->areaCode;
    }
    /**
     * The area code of the user's phone number
     *
     * @param int|null $areaCode
     *
     * @return self
     */
    public function setAreaCode(?int $areaCode): self
    {
        $this->initialized['areaCode'] = true;
        $this->areaCode = $areaCode;
        return $this;
    }
    /**
     * True if the user is account admin. This will be ignored as part of PUT calls.
     *
     * @return bool|null
     */
    public function getIsAccountAdmin(): ?bool
    {
        return $this->isAccountAdmin;
    }
    /**
     * True if the user is account admin. This will be ignored as part of PUT calls.
     *
     * @param bool|null $isAccountAdmin
     *
     * @return self
     */
    public function setIsAccountAdmin(?bool $isAccountAdmin): self
    {
        $this->initialized['isAccountAdmin'] = true;
        $this->isAccountAdmin = $isAccountAdmin;
        return $this;
    }
    /**
     * The date the user was created. If provided in POST or PUT it will be ignored
     *
     * @return string|null
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * The date the user was created. If provided in POST or PUT it will be ignored
     *
     * @param string|null $createdDate
     *
     * @return self
     */
    public function setCreatedDate(?string $createdDate): self
    {
        $this->initialized['createdDate'] = true;
        $this->createdDate = $createdDate;
        return $this;
    }
    /**
     * The phone number of the user
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }
    /**
     * The phone number of the user
     *
     * @param string|null $phone
     *
     * @return self
     */
    public function setPhone(?string $phone): self
    {
        $this->initialized['phone'] = true;
        $this->phone = $phone;
        return $this;
    }
    /**
     * Primary group in which the new user should be added. Default is the default group for the account the user is being added to. This will be ignored as part of PUT calls
     *
     * @return string|null
     */
    public function getPrimaryGroupId(): ?string
    {
        return $this->primaryGroupId;
    }
    /**
     * Primary group in which the new user should be added. Default is the default group for the account the user is being added to. This will be ignored as part of PUT calls
     *
     * @param string|null $primaryGroupId
     *
     * @return self
     */
    public function setPrimaryGroupId(?string $primaryGroupId): self
    {
        $this->initialized['primaryGroupId'] = true;
        $this->primaryGroupId = $primaryGroupId;
        return $this;
    }
    /**
     * The name of company of the user
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * The name of company of the user
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
     * A unique identifier of the user resource for REST APIs as issued by Acrobat Sign.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * A unique identifier of the user resource for REST APIs as issued by Acrobat Sign.
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The date of the user's last password change. Null if the user has never changed their password, or if the user has no password expiration set
     *
     * @return string|null
     */
    public function getLastPasswordChange(): ?string
    {
        return $this->lastPasswordChange;
    }
    /**
     * The date of the user's last password change. Null if the user has never changed their password, or if the user has no password expiration set
     *
     * @param string|null $lastPasswordChange
     *
     * @return self
     */
    public function setLastPasswordChange(?string $lastPasswordChange): self
    {
        $this->initialized['lastPasswordChange'] = true;
        $this->lastPasswordChange = $lastPasswordChange;
        return $this;
    }
    /**
     * The email address of the user
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The email address of the user
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
    /**
     * Status of the user. If provided in POST it will be ignored.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Status of the user. If provided in POST it will be ignored.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}