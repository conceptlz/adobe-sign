<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class PostSendOption
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
     * URL to redirect to after completion of the SEND flow. Specified URL must be part of the allow list for application redirects, configured by a CSR Admin
     *
     * @var string|null
     */
    protected $redirectUrl;
    /**
     * URL to redirect to after completion of the SEND flow. Specified URL must be part of the allow list for application redirects, configured by a CSR Admin
     *
     * @return string|null
     */
    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }
    /**
     * URL to redirect to after completion of the SEND flow. Specified URL must be part of the allow list for application redirects, configured by a CSR Admin
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
}