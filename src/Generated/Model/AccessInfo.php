<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AccessInfo
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
     * The unique identifier of the participant. This will be returned as part of Get call but is not mandatory to be passed as part of PUT call for agreements/{id}/members/participantSets/{id}.
     *
     * @var string|null
     */
    protected $participantId;
    /**
     * Access code associated with the participant of agreement
     *
     * @var string|null
     */
    protected $accessCode;
    /**
     * List of UrlDetail holding url and their access action name
     *
     * @var list<UrlDetail>|null
     */
    protected $urlDetails;
    /**
     * Email address of the participant of agreement
     *
     * @var string|null
     */
    protected $email;
    /**
     * The unique identifier of the participant. This will be returned as part of Get call but is not mandatory to be passed as part of PUT call for agreements/{id}/members/participantSets/{id}.
     *
     * @return string|null
     */
    public function getParticipantId(): ?string
    {
        return $this->participantId;
    }
    /**
     * The unique identifier of the participant. This will be returned as part of Get call but is not mandatory to be passed as part of PUT call for agreements/{id}/members/participantSets/{id}.
     *
     * @param string|null $participantId
     *
     * @return self
     */
    public function setParticipantId(?string $participantId): self
    {
        $this->initialized['participantId'] = true;
        $this->participantId = $participantId;
        return $this;
    }
    /**
     * Access code associated with the participant of agreement
     *
     * @return string|null
     */
    public function getAccessCode(): ?string
    {
        return $this->accessCode;
    }
    /**
     * Access code associated with the participant of agreement
     *
     * @param string|null $accessCode
     *
     * @return self
     */
    public function setAccessCode(?string $accessCode): self
    {
        $this->initialized['accessCode'] = true;
        $this->accessCode = $accessCode;
        return $this;
    }
    /**
     * List of UrlDetail holding url and their access action name
     *
     * @return list<UrlDetail>|null
     */
    public function getUrlDetails(): ?array
    {
        return $this->urlDetails;
    }
    /**
     * List of UrlDetail holding url and their access action name
     *
     * @param list<UrlDetail>|null $urlDetails
     *
     * @return self
     */
    public function setUrlDetails(?array $urlDetails): self
    {
        $this->initialized['urlDetails'] = true;
        $this->urlDetails = $urlDetails;
        return $this;
    }
    /**
     * Email address of the participant of agreement
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email address of the participant of agreement
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