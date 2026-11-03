<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetRedirectionInfo
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
     * The delay (in seconds) before the user is taken to the resultant page. If this value is greater than 0, the user will first see the standard Acrobat Sign result message, and then after a delay will be redirected to your resultant page.
     *  Note that this parameter has no effect for embedded web forms when deframe is true
     *
     * @var int|null
     */
    protected $delay;
    /**
     * If deframe is false, the resultant page will be shown inside the web form frame. If deframe is true, the resultant page will be shown in the full browser window.
     *  Note that in the case of embedded web forms, browser security restrictions do not permit automatic redirection in the full browser window, so if deframe is true the user will instead just see a link to the success page. We recommend this scenario be avoided - in other words, setting deframe to false is recommended for embedded web forms
     *
     * @var bool|null
     */
    protected $deframe;
    /**
     * A publicly accessible url to which the user will be sent after successfully completing the web form.
     * If the URL you provide includes information that allows you to identify the specific transaction, such as your own unique identifier, you can use the browser request to this URL as a callback to notify you that this transaction is completed.
     * In addition, Acrobat Sign will append a documentKey parameter to the URL which will contain the Acrobat Sign DocumentKey for this signed web form, but only if the sender is the same as the API key user. Your application can use this value to get the form data for this web form
     *
     * @var string|null
     */
    protected $url;
    /**
     * The delay (in seconds) before the user is taken to the resultant page. If this value is greater than 0, the user will first see the standard Acrobat Sign result message, and then after a delay will be redirected to your resultant page.
     *  Note that this parameter has no effect for embedded web forms when deframe is true
     *
     * @return int|null
     */
    public function getDelay(): ?int
    {
        return $this->delay;
    }
    /**
    * The delay (in seconds) before the user is taken to the resultant page. If this value is greater than 0, the user will first see the standard Acrobat Sign result message, and then after a delay will be redirected to your resultant page. 
    Note that this parameter has no effect for embedded web forms when deframe is true
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
     * If deframe is false, the resultant page will be shown inside the web form frame. If deframe is true, the resultant page will be shown in the full browser window.
     *  Note that in the case of embedded web forms, browser security restrictions do not permit automatic redirection in the full browser window, so if deframe is true the user will instead just see a link to the success page. We recommend this scenario be avoided - in other words, setting deframe to false is recommended for embedded web forms
     *
     * @return bool|null
     */
    public function getDeframe(): ?bool
    {
        return $this->deframe;
    }
    /**
    * If deframe is false, the resultant page will be shown inside the web form frame. If deframe is true, the resultant page will be shown in the full browser window. 
    Note that in the case of embedded web forms, browser security restrictions do not permit automatic redirection in the full browser window, so if deframe is true the user will instead just see a link to the success page. We recommend this scenario be avoided - in other words, setting deframe to false is recommended for embedded web forms
    *
    * @param bool|null $deframe
    *
    * @return self
    */
    public function setDeframe(?bool $deframe): self
    {
        $this->initialized['deframe'] = true;
        $this->deframe = $deframe;
        return $this;
    }
    /**
     * A publicly accessible url to which the user will be sent after successfully completing the web form.
     * If the URL you provide includes information that allows you to identify the specific transaction, such as your own unique identifier, you can use the browser request to this URL as a callback to notify you that this transaction is completed.
     * In addition, Acrobat Sign will append a documentKey parameter to the URL which will contain the Acrobat Sign DocumentKey for this signed web form, but only if the sender is the same as the API key user. Your application can use this value to get the form data for this web form
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
    * A publicly accessible url to which the user will be sent after successfully completing the web form. 
    If the URL you provide includes information that allows you to identify the specific transaction, such as your own unique identifier, you can use the browser request to this URL as a callback to notify you that this transaction is completed. 
    In addition, Acrobat Sign will append a documentKey parameter to the URL which will contain the Acrobat Sign DocumentKey for this signed web form, but only if the sender is the same as the API key user. Your application can use this value to get the form data for this web form
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