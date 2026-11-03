<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class PhoneInfo
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
     * The country ISO Alpha-2 code required for the participant to view and sign the document if authentication method is PHONE
     *
     * @var string|null
     */
    protected $countryIsoCode;
    /**
     * The phone number required for the participant to view and sign the document if authentication method is PHONE. When replacing a participant that has PHONE authentication specified, you must supply a phone number for the new participant.
     *
     * @var string|null
     */
    protected $phone;
    /**
     * The numeric country calling code (ISD code) required for the participant to view and sign the document if authentication type is PHONE
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * The country ISO Alpha-2 code required for the participant to view and sign the document if authentication method is PHONE
     *
     * @return string|null
     */
    public function getCountryIsoCode(): ?string
    {
        return $this->countryIsoCode;
    }
    /**
     * The country ISO Alpha-2 code required for the participant to view and sign the document if authentication method is PHONE
     *
     * @param string|null $countryIsoCode
     *
     * @return self
     */
    public function setCountryIsoCode(?string $countryIsoCode): self
    {
        $this->initialized['countryIsoCode'] = true;
        $this->countryIsoCode = $countryIsoCode;
        return $this;
    }
    /**
     * The phone number required for the participant to view and sign the document if authentication method is PHONE. When replacing a participant that has PHONE authentication specified, you must supply a phone number for the new participant.
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }
    /**
     * The phone number required for the participant to view and sign the document if authentication method is PHONE. When replacing a participant that has PHONE authentication specified, you must supply a phone number for the new participant.
     *
     * @param string|null $phone
     *
     * @return self
     */
    public function setPhone(?string $phone): self
    {
        $this->initialized['phone'] = true;
        $this->phone = $phone;
        return $this;
    }
    /**
     * The numeric country calling code (ISD code) required for the participant to view and sign the document if authentication type is PHONE
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * The numeric country calling code (ISD code) required for the participant to view and sign the document if authentication type is PHONE
     *
     * @param string|null $countryCode
     *
     * @return self
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;
        return $this;
    }
}