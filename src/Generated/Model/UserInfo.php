<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserInfo
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
     * The last name of the user
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * True if user is account admin
     *
     * @var bool|null
     */
    protected $isAccountAdmin;
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
     * The email address of the user
     *
     * @var string|null
     */
    protected $email;
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
     * True if user is account admin
     *
     * @return bool|null
     */
    public function getIsAccountAdmin(): ?bool
    {
        return $this->isAccountAdmin;
    }
    /**
     * True if user is account admin
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
}