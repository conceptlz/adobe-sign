<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ReminderCreationResult
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
     * An identifier of the reminder resource created on the server. If provided in POST or PUT, it will be ignored
     *
     * @var string|null
     */
    protected $id;
    /**
     * Array of secure participant IDs for recipients who will not receive reminder notifications due to REMINDER notification disabling configuration. Returns null if no recipients are disabled.
     *
     * @var list<string>|null
     */
    protected $disabledRecipients;
    /**
     * An identifier of the reminder resource created on the server. If provided in POST or PUT, it will be ignored
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * An identifier of the reminder resource created on the server. If provided in POST or PUT, it will be ignored
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * Array of secure participant IDs for recipients who will not receive reminder notifications due to REMINDER notification disabling configuration. Returns null if no recipients are disabled.
     *
     * @return list<string>|null
     */
    public function getDisabledRecipients(): ?array
    {
        return $this->disabledRecipients;
    }
    /**
     * Array of secure participant IDs for recipients who will not receive reminder notifications due to REMINDER notification disabling configuration. Returns null if no recipients are disabled.
     *
     * @param list<string>|null $disabledRecipients
     *
     * @return self
     */
    public function setDisabledRecipients(?array $disabledRecipients): self
    {
        $this->initialized['disabledRecipients'] = true;
        $this->disabledRecipients = $disabledRecipients;
        return $this;
    }
}