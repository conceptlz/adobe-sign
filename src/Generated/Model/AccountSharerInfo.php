<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AccountSharerInfo
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
     * A list of permissions given for this account sharing.
     *
     * @var list<string>|null
     */
    protected $permissions;
    /**
     * Full name of this account sharer.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * A unique identifier of the user resource for REST APIs as issued by Acrobat Sign.
     *
     * @var string|null
     */
    protected $userId;
    /**
     * The email address of the user
     *
     * @var string|null
     */
    protected $email;
    /**
     * A list of permissions given for this account sharing.
     *
     * @return list<string>|null
     */
    public function getPermissions(): ?array
    {
        return $this->permissions;
    }
    /**
     * A list of permissions given for this account sharing.
     *
     * @param list<string>|null $permissions
     *
     * @return self
     */
    public function setPermissions(?array $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;
        return $this;
    }
    /**
     * Full name of this account sharer.
     *
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }
    /**
     * Full name of this account sharer.
     *
     * @param string|null $fullName
     *
     * @return self
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;
        return $this;
    }
    /**
     * A unique identifier of the user resource for REST APIs as issued by Acrobat Sign.
     *
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }
    /**
     * A unique identifier of the user resource for REST APIs as issued by Acrobat Sign.
     *
     * @param string|null $userId
     *
     * @return self
     */
    public function setUserId(?string $userId): self
    {
        $this->initialized['userId'] = true;
        $this->userId = $userId;
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