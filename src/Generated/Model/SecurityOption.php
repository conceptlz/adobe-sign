<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SecurityOption
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
     * @var ContentProtectionPreferences|null
     */
    protected $contentProtectionPreference;
    /**
     * The secondary password that will be used to secure the PDF document. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties
     *
     * @var string|null
     */
    protected $openPassword;
    /**
     * @return ContentProtectionPreferences|null
     */
    public function getContentProtectionPreference(): ?ContentProtectionPreferences
    {
        return $this->contentProtectionPreference;
    }
    /**
     * @param ContentProtectionPreferences|null $contentProtectionPreference
     *
     * @return self
     */
    public function setContentProtectionPreference(?ContentProtectionPreferences $contentProtectionPreference): self
    {
        $this->initialized['contentProtectionPreference'] = true;
        $this->contentProtectionPreference = $contentProtectionPreference;
        return $this;
    }
    /**
     * The secondary password that will be used to secure the PDF document. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties
     *
     * @return string|null
     */
    public function getOpenPassword(): ?string
    {
        return $this->openPassword;
    }
    /**
     * The secondary password that will be used to secure the PDF document. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties
     *
     * @param string|null $openPassword
     *
     * @return self
     */
    public function setOpenPassword(?string $openPassword): self
    {
        $this->initialized['openPassword'] = true;
        $this->openPassword = $openPassword;
        return $this;
    }
}