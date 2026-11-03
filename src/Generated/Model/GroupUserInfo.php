<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class GroupUserInfo
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
     * True if user is group admin
     *
     * @var bool|null
     */
    protected $isGroupAdmin;
    /**
     * The name of company of the user
     *
     * @var string|null
     */
    protected $company;
    /**
     * A unique identifier of the user resource for REST APIs. This identifier can not be used in SOAP APIs
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
     * True if user is group admin
     *
     * @return bool|null
     */
    public function getIsGroupAdmin(): ?bool
    {
        return $this->isGroupAdmin;
    }
    /**
     * True if user is group admin
     *
     * @param bool|null $isGroupAdmin
     *
     * @return self
     */
    public function setIsGroupAdmin(?bool $isGroupAdmin): self
    {
        $this->initialized['isGroupAdmin'] = true;
        $this->isGroupAdmin = $isGroupAdmin;
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
     * A unique identifier of the user resource for REST APIs. This identifier can not be used in SOAP APIs
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * A unique identifier of the user resource for REST APIs. This identifier can not be used in SOAP APIs
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