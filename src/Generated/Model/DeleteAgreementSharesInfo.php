<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DeleteAgreementSharesInfo
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
     * The list of participant ID's associated with the share deletions.
     *
     * @var string|null
     */
    protected $participationId;
    /**
     * The list of participant ID's associated with the share deletions.
     *
     * @return string|null
     */
    public function getParticipationId(): ?string
    {
        return $this->participationId;
    }
    /**
     * The list of participant ID's associated with the share deletions.
     *
     * @param string|null $participationId
     *
     * @return self
     */
    public function setParticipationId(?string $participationId): self
    {
        $this->initialized['participationId'] = true;
        $this->participationId = $participationId;
        return $this;
    }
}