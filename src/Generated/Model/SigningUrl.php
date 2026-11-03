<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SigningUrl
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
     * The authenticated secure url for the regular e-sign page for this signer
     *
     * @var string|null
     */
    protected $esignUrl;
    /**
     * The email address of the signer associated with this signing url
     *
     * @var string|null
     */
    protected $email;
    /**
     * The authenticated secure url for the regular e-sign page for this signer
     *
     * @return string|null
     */
    public function getEsignUrl(): ?string
    {
        return $this->esignUrl;
    }
    /**
     * The authenticated secure url for the regular e-sign page for this signer
     *
     * @param string|null $esignUrl
     *
     * @return self
     */
    public function setEsignUrl(?string $esignUrl): self
    {
        $this->initialized['esignUrl'] = true;
        $this->esignUrl = $esignUrl;
        return $this;
    }
    /**
     * The email address of the signer associated with this signing url
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The email address of the signer associated with this signing url
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