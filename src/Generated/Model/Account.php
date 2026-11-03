<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class Account
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
     * Date when the account was created. This is a server generated attributed and can not be provided in POST/PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $created;
    /**
     * The provisioned type of the account. This is a server generated attributed and can not be provided in POST/PUT calls.
     *
     * @var string|null
     */
    protected $accountType;
    /**
     * The name which the account is known. This is a server generated attributed and can not be provided in POST/PUT calls.
     *
     * @var string|null
     */
    protected $name;
    /**
     * External id for the account
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * The last date that the account information was updated. This is a server generated attributed and can not be provided in POST/PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $modified;
    /**
     * The company associated with the account. This is a server generated attributed and can not be provided in POST/PUT calls.
     *
     * @var string|null
     */
    protected $company;
    /**
     * Identifier of the account. This is a server generated attributed and can not be provided in POST/PUT calls.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Date when the account was created. This is a server generated attributed and can not be provided in POST/PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }
    /**
     * Date when the account was created. This is a server generated attributed and can not be provided in POST/PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $created
     *
     * @return self
     */
    public function setCreated(?string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;
        return $this;
    }
    /**
     * The provisioned type of the account. This is a server generated attributed and can not be provided in POST/PUT calls.
     *
     * @return string|null
     */
    public function getAccountType(): ?string
    {
        return $this->accountType;
    }
    /**
     * The provisioned type of the account. This is a server generated attributed and can not be provided in POST/PUT calls.
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
     * The name which the account is known. This is a server generated attributed and can not be provided in POST/PUT calls.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The name which the account is known. This is a server generated attributed and can not be provided in POST/PUT calls. 
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
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
     * The last date that the account information was updated. This is a server generated attributed and can not be provided in POST/PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getModified(): ?string
    {
        return $this->modified;
    }
    /**
     * The last date that the account information was updated. This is a server generated attributed and can not be provided in POST/PUT calls. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $modified
     *
     * @return self
     */
    public function setModified(?string $modified): self
    {
        $this->initialized['modified'] = true;
        $this->modified = $modified;
        return $this;
    }
    /**
     * The company associated with the account. This is a server generated attributed and can not be provided in POST/PUT calls.
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * The company associated with the account. This is a server generated attributed and can not be provided in POST/PUT calls. 
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
     * Identifier of the account. This is a server generated attributed and can not be provided in POST/PUT calls.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Identifier of the account. This is a server generated attributed and can not be provided in POST/PUT calls. 
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
}