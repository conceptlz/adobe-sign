<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class RedirectOption
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
     * The delay (in seconds) before the user gets redirected to the specific page associated with an action. If delay is not 0, then the user will first see the standard Acrobat Sign message, and then after the delay will be redirect to the specified page
     *
     * @var int|null
     */
    protected $delay;
    /**
     * The specific action that this redirect applies to. Allowed action is DECLINED : Participant has rejected the agreement. More actions to be added in a future release
     *
     * @var string|null
     */
    protected $action;
    /**
     * The publicly accessible URL which the user will be redirected to
     *
     * @var string|null
     */
    protected $url;
    /**
     * The delay (in seconds) before the user gets redirected to the specific page associated with an action. If delay is not 0, then the user will first see the standard Acrobat Sign message, and then after the delay will be redirect to the specified page
     *
     * @return int|null
     */
    public function getDelay(): ?int
    {
        return $this->delay;
    }
    /**
     * The delay (in seconds) before the user gets redirected to the specific page associated with an action. If delay is not 0, then the user will first see the standard Acrobat Sign message, and then after the delay will be redirect to the specified page
     *
     * @param int|null $delay
     *
     * @return self
     */
    public function setDelay(?int $delay): self
    {
        $this->initialized['delay'] = true;
        $this->delay = $delay;
        return $this;
    }
    /**
     * The specific action that this redirect applies to. Allowed action is DECLINED : Participant has rejected the agreement. More actions to be added in a future release
     *
     * @return string|null
     */
    public function getAction(): ?string
    {
        return $this->action;
    }
    /**
     * The specific action that this redirect applies to. Allowed action is DECLINED : Participant has rejected the agreement. More actions to be added in a future release
     *
     * @param string|null $action
     *
     * @return self
     */
    public function setAction(?string $action): self
    {
        $this->initialized['action'] = true;
        $this->action = $action;
        return $this;
    }
    /**
     * The publicly accessible URL which the user will be redirected to
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * The publicly accessible URL which the user will be redirected to
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
}