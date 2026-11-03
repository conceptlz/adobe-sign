<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class RecipientsListInfoDescription
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
     * The current roles of the participant. A participant can have one or more roles
     *
     * @var list<string>|null
     */
    protected $role;
    /**
     * Whether current field is visible. If visible attribute for this field is false then this field should not be shown in the agreement creation UI using this workflow to user
     *
     * @var bool|null
     */
    protected $visible;
    /**
     * whether fax is allowed or not
     *
     * @var bool|null
     */
    protected $allowfax;
    /**
     * A default  email or fax number
     *
     * @var string|null
     */
    protected $defaultValue;
    /**
     * Whether current field can be edited. If editable attribute for this field is false then this field should not be provided in the agreement creation request and default value of this field will be used in agreement creation
     *
     * @var bool|null
     */
    protected $editable;
    /**
     * Indicates CCs corresponding to recipient
     *
     * @var list<string>|null
     */
    protected $recipientCcs;
    /**
     * maximum number of entries allowed in the current recipient list
     *
     * @var int|null
     */
    protected $maxListCount;
    /**
     * The isPrivate flag indicates whether a participant receives the agreement privately or not
     *
     * @var bool|null
     */
    protected $isPrivate;
    /**
     * A display text for the workflow user that can be used for the current recipients list
     *
     * @var string|null
     */
    protected $label;
    /**
     * Identifier of the reusable recipient group
     *
     * @var string|null
     */
    protected $recipientGroupId;
    /**
     * whether sender is allowed as a recipient
     *
     * @var bool|null
     */
    protected $allowSender;
    /**
     * minimum number of entries allowed in the current recipient list
     *
     * @var int|null
     */
    protected $minListCount;
    /**
     * authentication method for the current recipient list to have access to view and sign the document
     *
     * @var string|null
     */
    protected $authenticationMethod;
    /**
     * Name of the current RecipientInfo list
     *
     * @var string|null
     */
    protected $name;
    /**
     * Private message intended for the recipient. In case of a recipient group, all members of the recipient group will receive the same message
     *
     * @var string|null
     */
    protected $privateMessage;
    /**
     * The current roles of the participant. A participant can have one or more roles
     *
     * @return list<string>|null
     */
    public function getRole(): ?array
    {
        return $this->role;
    }
    /**
     * The current roles of the participant. A participant can have one or more roles
     *
     * @param list<string>|null $role
     *
     * @return self
     */
    public function setRole(?array $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;
        return $this;
    }
    /**
     * Whether current field is visible. If visible attribute for this field is false then this field should not be shown in the agreement creation UI using this workflow to user
     *
     * @return bool|null
     */
    public function getVisible(): ?bool
    {
        return $this->visible;
    }
    /**
     * Whether current field is visible. If visible attribute for this field is false then this field should not be shown in the agreement creation UI using this workflow to user
     *
     * @param bool|null $visible
     *
     * @return self
     */
    public function setVisible(?bool $visible): self
    {
        $this->initialized['visible'] = true;
        $this->visible = $visible;
        return $this;
    }
    /**
     * whether fax is allowed or not
     *
     * @return bool|null
     */
    public function getAllowfax(): ?bool
    {
        return $this->allowfax;
    }
    /**
     * whether fax is allowed or not
     *
     * @param bool|null $allowfax
     *
     * @return self
     */
    public function setAllowfax(?bool $allowfax): self
    {
        $this->initialized['allowfax'] = true;
        $this->allowfax = $allowfax;
        return $this;
    }
    /**
     * A default  email or fax number
     *
     * @return string|null
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }
    /**
     * A default  email or fax number
     *
     * @param string|null $defaultValue
     *
     * @return self
     */
    public function setDefaultValue(?string $defaultValue): self
    {
        $this->initialized['defaultValue'] = true;
        $this->defaultValue = $defaultValue;
        return $this;
    }
    /**
     * Whether current field can be edited. If editable attribute for this field is false then this field should not be provided in the agreement creation request and default value of this field will be used in agreement creation
     *
     * @return bool|null
     */
    public function getEditable(): ?bool
    {
        return $this->editable;
    }
    /**
     * Whether current field can be edited. If editable attribute for this field is false then this field should not be provided in the agreement creation request and default value of this field will be used in agreement creation
     *
     * @param bool|null $editable
     *
     * @return self
     */
    public function setEditable(?bool $editable): self
    {
        $this->initialized['editable'] = true;
        $this->editable = $editable;
        return $this;
    }
    /**
     * Indicates CCs corresponding to recipient
     *
     * @return list<string>|null
     */
    public function getRecipientCcs(): ?array
    {
        return $this->recipientCcs;
    }
    /**
     * Indicates CCs corresponding to recipient
     *
     * @param list<string>|null $recipientCcs
     *
     * @return self
     */
    public function setRecipientCcs(?array $recipientCcs): self
    {
        $this->initialized['recipientCcs'] = true;
        $this->recipientCcs = $recipientCcs;
        return $this;
    }
    /**
     * maximum number of entries allowed in the current recipient list
     *
     * @return int|null
     */
    public function getMaxListCount(): ?int
    {
        return $this->maxListCount;
    }
    /**
     * maximum number of entries allowed in the current recipient list
     *
     * @param int|null $maxListCount
     *
     * @return self
     */
    public function setMaxListCount(?int $maxListCount): self
    {
        $this->initialized['maxListCount'] = true;
        $this->maxListCount = $maxListCount;
        return $this;
    }
    /**
     * The isPrivate flag indicates whether a participant receives the agreement privately or not
     *
     * @return bool|null
     */
    public function getIsPrivate(): ?bool
    {
        return $this->isPrivate;
    }
    /**
     * The isPrivate flag indicates whether a participant receives the agreement privately or not
     *
     * @param bool|null $isPrivate
     *
     * @return self
     */
    public function setIsPrivate(?bool $isPrivate): self
    {
        $this->initialized['isPrivate'] = true;
        $this->isPrivate = $isPrivate;
        return $this;
    }
    /**
     * A display text for the workflow user that can be used for the current recipients list
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * A display text for the workflow user that can be used for the current recipients list
     *
     * @param string|null $label
     *
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
        return $this;
    }
    /**
     * Identifier of the reusable recipient group
     *
     * @return string|null
     */
    public function getRecipientGroupId(): ?string
    {
        return $this->recipientGroupId;
    }
    /**
     * Identifier of the reusable recipient group
     *
     * @param string|null $recipientGroupId
     *
     * @return self
     */
    public function setRecipientGroupId(?string $recipientGroupId): self
    {
        $this->initialized['recipientGroupId'] = true;
        $this->recipientGroupId = $recipientGroupId;
        return $this;
    }
    /**
     * whether sender is allowed as a recipient
     *
     * @return bool|null
     */
    public function getAllowSender(): ?bool
    {
        return $this->allowSender;
    }
    /**
     * whether sender is allowed as a recipient
     *
     * @param bool|null $allowSender
     *
     * @return self
     */
    public function setAllowSender(?bool $allowSender): self
    {
        $this->initialized['allowSender'] = true;
        $this->allowSender = $allowSender;
        return $this;
    }
    /**
     * minimum number of entries allowed in the current recipient list
     *
     * @return int|null
     */
    public function getMinListCount(): ?int
    {
        return $this->minListCount;
    }
    /**
     * minimum number of entries allowed in the current recipient list
     *
     * @param int|null $minListCount
     *
     * @return self
     */
    public function setMinListCount(?int $minListCount): self
    {
        $this->initialized['minListCount'] = true;
        $this->minListCount = $minListCount;
        return $this;
    }
    /**
     * authentication method for the current recipient list to have access to view and sign the document
     *
     * @return string|null
     */
    public function getAuthenticationMethod(): ?string
    {
        return $this->authenticationMethod;
    }
    /**
     * authentication method for the current recipient list to have access to view and sign the document
     *
     * @param string|null $authenticationMethod
     *
     * @return self
     */
    public function setAuthenticationMethod(?string $authenticationMethod): self
    {
        $this->initialized['authenticationMethod'] = true;
        $this->authenticationMethod = $authenticationMethod;
        return $this;
    }
    /**
     * Name of the current RecipientInfo list
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the current RecipientInfo list
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
     * Private message intended for the recipient. In case of a recipient group, all members of the recipient group will receive the same message
     *
     * @return string|null
     */
    public function getPrivateMessage(): ?string
    {
        return $this->privateMessage;
    }
    /**
     * Private message intended for the recipient. In case of a recipient group, all members of the recipient group will receive the same message
     *
     * @param string|null $privateMessage
     *
     * @return self
     */
    public function setPrivateMessage(?string $privateMessage): self
    {
        $this->initialized['privateMessage'] = true;
        $this->privateMessage = $privateMessage;
        return $this;
    }
}