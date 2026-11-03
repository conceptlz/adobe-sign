<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WebhookProblemNotificationEmails
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
     * Email of existing Acrobat Sign user in the same account or group as the API caller
     *
     * @var string|null
     */
    protected $email;
    /**
     * Email of existing Acrobat Sign user in the same account or group as the API caller
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email of existing Acrobat Sign user in the same account or group as the API caller
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