<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class PersonalizedSigningViewConfiguration
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
     * Comment describing how the API caller established the signer's identity - will appear in the audit trail
     *
     * @var string|null
     */
    protected $comment;
    /**
     * Expiration date for the personalization of this web form. After this date, the identity of the signer will not be assumed by Acrobat Sign. Format should be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2022-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $expiration;
    /**
     * The email address of the person who will be receiving this web form
     *
     * @var string|null
     */
    protected $email;
    /**
     * Should the intended signer be allowed to sign this web form more than once
     *
     * @var bool|null
     */
    protected $reusable;
    /**
     * Comment describing how the API caller established the signer's identity - will appear in the audit trail
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }
    /**
     * Comment describing how the API caller established the signer's identity - will appear in the audit trail
     *
     * @param string|null $comment
     *
     * @return self
     */
    public function setComment(?string $comment): self
    {
        $this->initialized['comment'] = true;
        $this->comment = $comment;
        return $this;
    }
    /**
     * Expiration date for the personalization of this web form. After this date, the identity of the signer will not be assumed by Acrobat Sign. Format should be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2022-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getExpiration(): ?string
    {
        return $this->expiration;
    }
    /**
     * Expiration date for the personalization of this web form. After this date, the identity of the signer will not be assumed by Acrobat Sign. Format should be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2022-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $expiration
     *
     * @return self
     */
    public function setExpiration(?string $expiration): self
    {
        $this->initialized['expiration'] = true;
        $this->expiration = $expiration;
        return $this;
    }
    /**
     * The email address of the person who will be receiving this web form
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The email address of the person who will be receiving this web form
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
    /**
     * Should the intended signer be allowed to sign this web form more than once
     *
     * @return bool|null
     */
    public function getReusable(): ?bool
    {
        return $this->reusable;
    }
    /**
     * Should the intended signer be allowed to sign this web form more than once
     *
     * @param bool|null $reusable
     *
     * @return self
     */
    public function setReusable(?bool $reusable): self
    {
        $this->initialized['reusable'] = true;
        $this->reusable = $reusable;
        return $this;
    }
}