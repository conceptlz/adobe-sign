<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class VaultingInfo
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
     * For accounts set up for document vaulting and the option to enable per agreement, this determines whether the document is to be vaulted
     *
     * @var bool|null
     */
    protected $enabled;
    /**
     * For accounts set up for document vaulting and the option to enable per agreement, this determines whether the document is to be vaulted
     *
     * @return bool|null
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }
    /**
     * For accounts set up for document vaulting and the option to enable per agreement, this determines whether the document is to be vaulted
     *
     * @param bool|null $enabled
     *
     * @return self
     */
    public function setEnabled(?bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;
        return $this;
    }
}