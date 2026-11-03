<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignSecurityOption
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
     * The authentication method for the participants to have access to view and sign the document.
     *
     * @var string|null
     */
    protected $externalAuthenticationMethod;
    /**
     * @var ContentProtectionPreferences|null
     */
    protected $contentProtectionPreference;
    /**
     * The authentication method for the participants to have access to view and sign the document.
     *
     * @var string|null
     */
    protected $internalAuthenticationMethod;
    /**
     * The secondary password that will be used to protect signing the document for internal signers. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties. This password is applied only if password protection is specified for internal signers or all signers
     *
     * @var string|null
     */
    protected $externalPassword;
    /**
     * The secondary password that will be used to protect signing the document for external signers. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties. This password is applied only if password protection is specified for external signers or all signers
     *
     * @var string|null
     */
    protected $internalPassword;
    /**
     * The secondary password that will be used to secure the PDF document. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties
     *
     * @var string|null
     */
    protected $openPassword;
    /**
     * The authentication method for the participants to have access to view and sign the document.
     *
     * @return string|null
     */
    public function getExternalAuthenticationMethod(): ?string
    {
        return $this->externalAuthenticationMethod;
    }
    /**
     * The authentication method for the participants to have access to view and sign the document.
     *
     * @param string|null $externalAuthenticationMethod
     *
     * @return self
     */
    public function setExternalAuthenticationMethod(?string $externalAuthenticationMethod): self
    {
        $this->initialized['externalAuthenticationMethod'] = true;
        $this->externalAuthenticationMethod = $externalAuthenticationMethod;
        return $this;
    }
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
     * The authentication method for the participants to have access to view and sign the document.
     *
     * @return string|null
     */
    public function getInternalAuthenticationMethod(): ?string
    {
        return $this->internalAuthenticationMethod;
    }
    /**
     * The authentication method for the participants to have access to view and sign the document.
     *
     * @param string|null $internalAuthenticationMethod
     *
     * @return self
     */
    public function setInternalAuthenticationMethod(?string $internalAuthenticationMethod): self
    {
        $this->initialized['internalAuthenticationMethod'] = true;
        $this->internalAuthenticationMethod = $internalAuthenticationMethod;
        return $this;
    }
    /**
     * The secondary password that will be used to protect signing the document for internal signers. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties. This password is applied only if password protection is specified for internal signers or all signers
     *
     * @return string|null
     */
    public function getExternalPassword(): ?string
    {
        return $this->externalPassword;
    }
    /**
     * The secondary password that will be used to protect signing the document for internal signers. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties. This password is applied only if password protection is specified for internal signers or all signers
     *
     * @param string|null $externalPassword
     *
     * @return self
     */
    public function setExternalPassword(?string $externalPassword): self
    {
        $this->initialized['externalPassword'] = true;
        $this->externalPassword = $externalPassword;
        return $this;
    }
    /**
     * The secondary password that will be used to protect signing the document for external signers. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties. This password is applied only if password protection is specified for external signers or all signers
     *
     * @return string|null
     */
    public function getInternalPassword(): ?string
    {
        return $this->internalPassword;
    }
    /**
     * The secondary password that will be used to protect signing the document for external signers. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties. This password is applied only if password protection is specified for external signers or all signers
     *
     * @param string|null $internalPassword
     *
     * @return self
     */
    public function setInternalPassword(?string $internalPassword): self
    {
        $this->initialized['internalPassword'] = true;
        $this->internalPassword = $internalPassword;
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