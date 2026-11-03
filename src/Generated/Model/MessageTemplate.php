<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MessageTemplate
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
     * Message template name
     *
     * @var string|null
     */
    protected $name;
    /**
     * Unique identifier of the message template
     *
     * @var string|null
     */
    protected $messageTemplateId;
    /**
     * Message template text
     *
     * @var string|null
     */
    protected $text;
    /**
     * Message template locale
     *
     * @var string|null
     */
    protected $locale;
    /**
     * Message template name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Message template name
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
     * Unique identifier of the message template
     *
     * @return string|null
     */
    public function getMessageTemplateId(): ?string
    {
        return $this->messageTemplateId;
    }
    /**
     * Unique identifier of the message template
     *
     * @param string|null $messageTemplateId
     *
     * @return self
     */
    public function setMessageTemplateId(?string $messageTemplateId): self
    {
        $this->initialized['messageTemplateId'] = true;
        $this->messageTemplateId = $messageTemplateId;
        return $this;
    }
    /**
     * Message template text
     *
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }
    /**
     * Message template text
     *
     * @param string|null $text
     *
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;
        return $this;
    }
    /**
     * Message template locale
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
    /**
     * Message template locale
     *
     * @param string|null $locale
     *
     * @return self
     */
    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;
        return $this;
    }
}