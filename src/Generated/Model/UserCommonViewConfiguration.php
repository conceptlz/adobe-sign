<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class UserCommonViewConfiguration
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
     * An optional field to provide the comma-separated list of parent domain urls where the returned URLs may be iframed. If provided with non-empty and valid list of parent domain urls, it will be used to allow framing for the same. By default the value is null and the Acrobat Sign pages will not be viewable in an iframe.
     *
     * @var string|null
     */
    protected $frameParent;
    /**
     * Auto LogIn Flag. If true, the URL returned will automatically log the user in. If false, the URL returned will require the credentials. By default its value is false
     *
     * @var bool|null
     */
    protected $autoLoginUser;
    /**
     * No Chrome Flag. If true, the embedded page is shown without a navigation header or footer. If false, the standard page header and footer will be present. By default its value is false
     *
     * @var bool|null
     */
    protected $noChrome;
    /**
     * An optional field to provide the comma-separated list of parent domain urls where the returned URLs may be iframed. If provided with non-empty and valid list of parent domain urls, it will be used to allow framing for the same. By default the value is null and the Acrobat Sign pages will not be viewable in an iframe.
     *
     * @return string|null
     */
    public function getFrameParent(): ?string
    {
        return $this->frameParent;
    }
    /**
     * An optional field to provide the comma-separated list of parent domain urls where the returned URLs may be iframed. If provided with non-empty and valid list of parent domain urls, it will be used to allow framing for the same. By default the value is null and the Acrobat Sign pages will not be viewable in an iframe.
     *
     * @param string|null $frameParent
     *
     * @return self
     */
    public function setFrameParent(?string $frameParent): self
    {
        $this->initialized['frameParent'] = true;
        $this->frameParent = $frameParent;
        return $this;
    }
    /**
     * Auto LogIn Flag. If true, the URL returned will automatically log the user in. If false, the URL returned will require the credentials. By default its value is false
     *
     * @return bool|null
     */
    public function getAutoLoginUser(): ?bool
    {
        return $this->autoLoginUser;
    }
    /**
     * Auto LogIn Flag. If true, the URL returned will automatically log the user in. If false, the URL returned will require the credentials. By default its value is false
     *
     * @param bool|null $autoLoginUser
     *
     * @return self
     */
    public function setAutoLoginUser(?bool $autoLoginUser): self
    {
        $this->initialized['autoLoginUser'] = true;
        $this->autoLoginUser = $autoLoginUser;
        return $this;
    }
    /**
     * No Chrome Flag. If true, the embedded page is shown without a navigation header or footer. If false, the standard page header and footer will be present. By default its value is false
     *
     * @return bool|null
     */
    public function getNoChrome(): ?bool
    {
        return $this->noChrome;
    }
    /**
     * No Chrome Flag. If true, the embedded page is shown without a navigation header or footer. If false, the standard page header and footer will be present. By default its value is false
     *
     * @param bool|null $noChrome
     *
     * @return self
     */
    public function setNoChrome(?bool $noChrome): self
    {
        $this->initialized['noChrome'] = true;
        $this->noChrome = $noChrome;
        return $this;
    }
}