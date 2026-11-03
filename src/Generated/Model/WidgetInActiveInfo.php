<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetInActiveInfo
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
     * Redirect the user to this URL when the web form is accessed. This is required if message is not provided. Both message and redirectUrl cannot be specified.
     *
     * @var string|null
     */
    protected $redirectUrl;
    /**
     * Display this custom message to the user when the web form is accessed. Note that this can contain wiki markup to include clickable links in the message. This is required if redirectUrl is not provided. Both message and redirectUrl cannot be specified.
     *
     * @var string|null
     */
    protected $message;
    /**
     * Redirect the user to this URL when the web form is accessed. This is required if message is not provided. Both message and redirectUrl cannot be specified.
     *
     * @return string|null
     */
    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }
    /**
     * Redirect the user to this URL when the web form is accessed. This is required if message is not provided. Both message and redirectUrl cannot be specified.
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
     * Display this custom message to the user when the web form is accessed. Note that this can contain wiki markup to include clickable links in the message. This is required if redirectUrl is not provided. Both message and redirectUrl cannot be specified.
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * Display this custom message to the user when the web form is accessed. Note that this can contain wiki markup to include clickable links in the message. This is required if redirectUrl is not provided. Both message and redirectUrl cannot be specified.
     *
     * @param string|null $message
     *
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
}