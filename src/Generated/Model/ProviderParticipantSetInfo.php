<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ProviderParticipantSetInfo
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
     * It indicates whether it is mandatory or not for the provider participant to provide the details for the unknown participant
     *
     * @var bool|null
     */
    protected $actionRequired;
    /**
     * The description for the provider participant who is responsible to provide details like name, email for the unknown participant.
     *
     * @var string|null
     */
    protected $actionDescription;
    /**
     * It indicates whether it is mandatory or not for the provider participant to provide the details for the unknown participant
     *
     * @return bool|null
     */
    public function getActionRequired(): ?bool
    {
        return $this->actionRequired;
    }
    /**
     * It indicates whether it is mandatory or not for the provider participant to provide the details for the unknown participant
     *
     * @param bool|null $actionRequired
     *
     * @return self
     */
    public function setActionRequired(?bool $actionRequired): self
    {
        $this->initialized['actionRequired'] = true;
        $this->actionRequired = $actionRequired;
        return $this;
    }
    /**
     * The description for the provider participant who is responsible to provide details like name, email for the unknown participant.
     *
     * @return string|null
     */
    public function getActionDescription(): ?string
    {
        return $this->actionDescription;
    }
    /**
     * The description for the provider participant who is responsible to provide details like name, email for the unknown participant.
     *
     * @param string|null $actionDescription
     *
     * @return self
     */
    public function setActionDescription(?string $actionDescription): self
    {
        $this->initialized['actionDescription'] = true;
        $this->actionDescription = $actionDescription;
        return $this;
    }
}