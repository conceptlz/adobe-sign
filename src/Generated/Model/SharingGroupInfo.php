<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SharingGroupInfo
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
     * Full name of the sharee. This will be ignored if provided in POST or PUT calls
     *
     * @var string|null
     */
    protected $shareeName;
    /**
     * Email of existing Acrobat Sign user in the same account as the API caller.
     *
     * @var string|null
     */
    protected $shareeEmail;
    /**
     * The unique identifier of the sharee. This will be ignored if provided in POST or PUT calls
     *
     * @var string|null
     */
    protected $shareeId;
    /**
     * Full name of the sharee. This will be ignored if provided in POST or PUT calls
     *
     * @return string|null
     */
    public function getShareeName(): ?string
    {
        return $this->shareeName;
    }
    /**
     * Full name of the sharee. This will be ignored if provided in POST or PUT calls
     *
     * @param string|null $shareeName
     *
     * @return self
     */
    public function setShareeName(?string $shareeName): self
    {
        $this->initialized['shareeName'] = true;
        $this->shareeName = $shareeName;
        return $this;
    }
    /**
     * Email of existing Acrobat Sign user in the same account as the API caller.
     *
     * @return string|null
     */
    public function getShareeEmail(): ?string
    {
        return $this->shareeEmail;
    }
    /**
     * Email of existing Acrobat Sign user in the same account as the API caller.
     *
     * @param string|null $shareeEmail
     *
     * @return self
     */
    public function setShareeEmail(?string $shareeEmail): self
    {
        $this->initialized['shareeEmail'] = true;
        $this->shareeEmail = $shareeEmail;
        return $this;
    }
    /**
     * The unique identifier of the sharee. This will be ignored if provided in POST or PUT calls
     *
     * @return string|null
     */
    public function getShareeId(): ?string
    {
        return $this->shareeId;
    }
    /**
     * The unique identifier of the sharee. This will be ignored if provided in POST or PUT calls
     *
     * @param string|null $shareeId
     *
     * @return self
     */
    public function setShareeId(?string $shareeId): self
    {
        $this->initialized['shareeId'] = true;
        $this->shareeId = $shareeId;
        return $this;
    }
}