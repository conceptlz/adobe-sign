<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DigitalSignatureInfo
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
     * Cloud Provider IP for digital signing
     *
     * @var string|null
     */
    protected $cloudProviderIp;
    /**
     * Certificate Issuer for digital signing
     *
     * @var string|null
     */
    protected $certificateIssuer;
    /**
     * Cloud Provider Name for digital signing
     *
     * @var string|null
     */
    protected $cloudProviderName;
    /**
     * Name captured during digital signing
     *
     * @var string|null
     */
    protected $name;
    /**
     * Company name captured during digital signing
     *
     * @var string|null
     */
    protected $company;
    /**
     * Cloud Provider URL for digital signing
     *
     * @var string|null
     */
    protected $cloudProviderUrl;
    /**
     * Email captured during digital signing
     *
     * @var string|null
     */
    protected $email;
    /**
     * Cloud Provider IP for digital signing
     *
     * @return string|null
     */
    public function getCloudProviderIp(): ?string
    {
        return $this->cloudProviderIp;
    }
    /**
     * Cloud Provider IP for digital signing
     *
     * @param string|null $cloudProviderIp
     *
     * @return self
     */
    public function setCloudProviderIp(?string $cloudProviderIp): self
    {
        $this->initialized['cloudProviderIp'] = true;
        $this->cloudProviderIp = $cloudProviderIp;
        return $this;
    }
    /**
     * Certificate Issuer for digital signing
     *
     * @return string|null
     */
    public function getCertificateIssuer(): ?string
    {
        return $this->certificateIssuer;
    }
    /**
     * Certificate Issuer for digital signing
     *
     * @param string|null $certificateIssuer
     *
     * @return self
     */
    public function setCertificateIssuer(?string $certificateIssuer): self
    {
        $this->initialized['certificateIssuer'] = true;
        $this->certificateIssuer = $certificateIssuer;
        return $this;
    }
    /**
     * Cloud Provider Name for digital signing
     *
     * @return string|null
     */
    public function getCloudProviderName(): ?string
    {
        return $this->cloudProviderName;
    }
    /**
     * Cloud Provider Name for digital signing
     *
     * @param string|null $cloudProviderName
     *
     * @return self
     */
    public function setCloudProviderName(?string $cloudProviderName): self
    {
        $this->initialized['cloudProviderName'] = true;
        $this->cloudProviderName = $cloudProviderName;
        return $this;
    }
    /**
     * Name captured during digital signing
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name captured during digital signing
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
     * Company name captured during digital signing
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * Company name captured during digital signing
     *
     * @param string|null $company
     *
     * @return self
     */
    public function setCompany(?string $company): self
    {
        $this->initialized['company'] = true;
        $this->company = $company;
        return $this;
    }
    /**
     * Cloud Provider URL for digital signing
     *
     * @return string|null
     */
    public function getCloudProviderUrl(): ?string
    {
        return $this->cloudProviderUrl;
    }
    /**
     * Cloud Provider URL for digital signing
     *
     * @param string|null $cloudProviderUrl
     *
     * @return self
     */
    public function setCloudProviderUrl(?string $cloudProviderUrl): self
    {
        $this->initialized['cloudProviderUrl'] = true;
        $this->cloudProviderUrl = $cloudProviderUrl;
        return $this;
    }
    /**
     * Email captured during digital signing
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email captured during digital signing
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