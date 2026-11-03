<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class PostSignOption
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
     * A publicly accessible url to which the user will be sent after successfully completing the signing process
     *
     * @var string|null
     */
    protected $redirectUrl;
    /**
     * The delay (in seconds) before the user is taken to the success page. If this value is greater than 0, the user will first see the standard Acrobat Sign success message, and then after a delay will be redirected to your success page
     *
     * @var int|null
     */
    protected $redirectDelay;
    /**
     * A publicly accessible url to which the user will be sent after successfully completing the signing process
     *
     * @return string|null
     */
    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }
    /**
     * A publicly accessible url to which the user will be sent after successfully completing the signing process
     *
     * @param string|null $redirectUrl
     *
     * @return self
     */
    public function setRedirectUrl(?string $redirectUrl): self
    {
        $this->initialized['redirectUrl'] = true;
        $this->redirectUrl = $redirectUrl;
        return $this;
    }
    /**
     * The delay (in seconds) before the user is taken to the success page. If this value is greater than 0, the user will first see the standard Acrobat Sign success message, and then after a delay will be redirected to your success page
     *
     * @return int|null
     */
    public function getRedirectDelay(): ?int
    {
        return $this->redirectDelay;
    }
    /**
     * The delay (in seconds) before the user is taken to the success page. If this value is greater than 0, the user will first see the standard Acrobat Sign success message, and then after a delay will be redirected to your success page
     *
     * @param int|null $redirectDelay
     *
     * @return self
     */
    public function setRedirectDelay(?int $redirectDelay): self
    {
        $this->initialized['redirectDelay'] = true;
        $this->redirectDelay = $redirectDelay;
        return $this;
    }
}