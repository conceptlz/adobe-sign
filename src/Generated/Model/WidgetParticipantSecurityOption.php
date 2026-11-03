<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetParticipantSecurityOption
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
     * The password required for the participant to view and sign the document. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties. The password will not be returned in GET call. When replacing a participant that has PASSWORD authentication specified, you must supply a password for the new participant.
     *
     * @var string|null
     */
    protected $password;
    /**
     * The authentication method for the participants to have access to view and sign the document. When replacing a participant that has PASSWORD or PHONE authentication specified, you must supply a password or phone number for the new participant, and you cannot change the authentication method.
     * For Unknown Participants, apart from email, other authentication methods can also be selected, including EMAIL OTP.
     *
     * @var string|null
     */
    protected $authenticationMethod;
    /**
     * The authentication method of the notary participant to the notary
     *
     * @var string|null
     */
    protected $notaryAuthentication;
    /**
     * @var DigAuthInfo|null
     */
    protected $digAuthInfo;
    /**
     * @var NameInfo|null
     */
    protected $nameInfo;
    /**
     * @var PhoneInfo|null
     */
    protected $phoneInfo;
    /**
     * @var IdentityCheckInfo|null
     */
    protected $identityCheckInfo;
    /**
     * The password required for the participant to view and sign the document. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties. The password will not be returned in GET call. When replacing a participant that has PASSWORD authentication specified, you must supply a password for the new participant.
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }
    /**
     * The password required for the participant to view and sign the document. Note that Acrobat Sign will never show this password to anyone, so you will need to separately communicate it to any relevant parties. The password will not be returned in GET call. When replacing a participant that has PASSWORD authentication specified, you must supply a password for the new participant.
     *
     * @param string|null $password
     *
     * @return self
     */
    public function setPassword(?string $password): self
    {
        $this->initialized['password'] = true;
        $this->password = $password;
        return $this;
    }
    /**
     * The authentication method for the participants to have access to view and sign the document. When replacing a participant that has PASSWORD or PHONE authentication specified, you must supply a password or phone number for the new participant, and you cannot change the authentication method.
     * For Unknown Participants, apart from email, other authentication methods can also be selected, including EMAIL OTP.
     *
     * @return string|null
     */
    public function getAuthenticationMethod(): ?string
    {
        return $this->authenticationMethod;
    }
    /**
    * The authentication method for the participants to have access to view and sign the document. When replacing a participant that has PASSWORD or PHONE authentication specified, you must supply a password or phone number for the new participant, and you cannot change the authentication method. 
    For Unknown Participants, apart from email, other authentication methods can also be selected, including EMAIL OTP.
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
     * The authentication method of the notary participant to the notary
     *
     * @return string|null
     */
    public function getNotaryAuthentication(): ?string
    {
        return $this->notaryAuthentication;
    }
    /**
     * The authentication method of the notary participant to the notary
     *
     * @param string|null $notaryAuthentication
     *
     * @return self
     */
    public function setNotaryAuthentication(?string $notaryAuthentication): self
    {
        $this->initialized['notaryAuthentication'] = true;
        $this->notaryAuthentication = $notaryAuthentication;
        return $this;
    }
    /**
     * @return DigAuthInfo|null
     */
    public function getDigAuthInfo(): ?DigAuthInfo
    {
        return $this->digAuthInfo;
    }
    /**
     * @param DigAuthInfo|null $digAuthInfo
     *
     * @return self
     */
    public function setDigAuthInfo(?DigAuthInfo $digAuthInfo): self
    {
        $this->initialized['digAuthInfo'] = true;
        $this->digAuthInfo = $digAuthInfo;
        return $this;
    }
    /**
     * @return NameInfo|null
     */
    public function getNameInfo(): ?NameInfo
    {
        return $this->nameInfo;
    }
    /**
     * @param NameInfo|null $nameInfo
     *
     * @return self
     */
    public function setNameInfo(?NameInfo $nameInfo): self
    {
        $this->initialized['nameInfo'] = true;
        $this->nameInfo = $nameInfo;
        return $this;
    }
    /**
     * @return PhoneInfo|null
     */
    public function getPhoneInfo(): ?PhoneInfo
    {
        return $this->phoneInfo;
    }
    /**
     * @param PhoneInfo|null $phoneInfo
     *
     * @return self
     */
    public function setPhoneInfo(?PhoneInfo $phoneInfo): self
    {
        $this->initialized['phoneInfo'] = true;
        $this->phoneInfo = $phoneInfo;
        return $this;
    }
    /**
     * @return IdentityCheckInfo|null
     */
    public function getIdentityCheckInfo(): ?IdentityCheckInfo
    {
        return $this->identityCheckInfo;
    }
    /**
     * @param IdentityCheckInfo|null $identityCheckInfo
     *
     * @return self
     */
    public function setIdentityCheckInfo(?IdentityCheckInfo $identityCheckInfo): self
    {
        $this->initialized['identityCheckInfo'] = true;
        $this->identityCheckInfo = $identityCheckInfo;
        return $this;
    }
}