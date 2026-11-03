<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class PhoneDeliveryInfo
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
     * The country ISO Alpha-2 code required for the participant to which the agreement URL is sent via SMS
     *
     * @var string|null
     */
    protected $countryIsoCode;
    /**
     * The phone number required for the participant to which the agreement URL is sent via SMS. The phone number is required when phoneDeliveryInfo attribute is defined
     *
     * @var string|null
     */
    protected $phone;
    /**
     * The numeric country calling code (ISD code) required for the participant to which the agreement URL is sent via SMS
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * The notification method via which the agreement will get delivered using the phone number. The possible values are SMS and WHATSAPP. If none specified, defaults to SMS notification method
     *
     * @var string|null
     */
    protected $notificationMethod;
    /**
     * The country ISO Alpha-2 code required for the participant to which the agreement URL is sent via SMS
     *
     * @return string|null
     */
    public function getCountryIsoCode(): ?string
    {
        return $this->countryIsoCode;
    }
    /**
     * The country ISO Alpha-2 code required for the participant to which the agreement URL is sent via SMS
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
     * The phone number required for the participant to which the agreement URL is sent via SMS. The phone number is required when phoneDeliveryInfo attribute is defined
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }
    /**
     * The phone number required for the participant to which the agreement URL is sent via SMS. The phone number is required when phoneDeliveryInfo attribute is defined
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
     * The numeric country calling code (ISD code) required for the participant to which the agreement URL is sent via SMS
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * The numeric country calling code (ISD code) required for the participant to which the agreement URL is sent via SMS
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
    /**
     * The notification method via which the agreement will get delivered using the phone number. The possible values are SMS and WHATSAPP. If none specified, defaults to SMS notification method
     *
     * @return string|null
     */
    public function getNotificationMethod(): ?string
    {
        return $this->notificationMethod;
    }
    /**
     * The notification method via which the agreement will get delivered using the phone number. The possible values are SMS and WHATSAPP. If none specified, defaults to SMS notification method
     *
     * @param string|null $notificationMethod
     *
     * @return self
     */
    public function setNotificationMethod(?string $notificationMethod): self
    {
        $this->initialized['notificationMethod'] = true;
        $this->notificationMethod = $notificationMethod;
        return $this;
    }
}