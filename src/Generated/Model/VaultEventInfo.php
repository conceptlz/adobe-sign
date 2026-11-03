<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class VaultEventInfo
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
     * The description provided by the vault provider for the vault event
     *
     * @var string|null
     */
    protected $vaultEventComment;
    /**
     * The identifier assigned by the vault provider for the vault event
     *
     * @var string|null
     */
    protected $vaultEventId;
    /**
     * The description provided by the vault provider for the vault event
     *
     * @return string|null
     */
    public function getVaultEventComment(): ?string
    {
        return $this->vaultEventComment;
    }
    /**
     * The description provided by the vault provider for the vault event
     *
     * @param string|null $vaultEventComment
     *
     * @return self
     */
    public function setVaultEventComment(?string $vaultEventComment): self
    {
        $this->initialized['vaultEventComment'] = true;
        $this->vaultEventComment = $vaultEventComment;
        return $this;
    }
    /**
     * The identifier assigned by the vault provider for the vault event
     *
     * @return string|null
     */
    public function getVaultEventId(): ?string
    {
        return $this->vaultEventId;
    }
    /**
     * The identifier assigned by the vault provider for the vault event
     *
     * @param string|null $vaultEventId
     *
     * @return self
     */
    public function setVaultEventId(?string $vaultEventId): self
    {
        $this->initialized['vaultEventId'] = true;
        $this->vaultEventId = $vaultEventId;
        return $this;
    }
}