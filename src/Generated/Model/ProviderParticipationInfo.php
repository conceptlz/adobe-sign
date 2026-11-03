<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ProviderParticipationInfo
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
     * Participation set ID of provider participant (corresponding signer in case of witness, corresponding host in case of in-person-signer). Ignored as part of POST call
     *
     * @var string|null
     */
    protected $participationSetId;
    /**
     * Label of provider participant (corresponding signer in case of witness, corresponding host in case of in-person-signer. Ensure to have unique label across all signers to identify them uniquely.)
     *
     * @var string|null
     */
    protected $label;
    /**
     * Participation ID of provider participant (corresponding signer in case of witness, corresponding host in case of in-person-signer). Ignored as part of POST call
     *
     * @var string|null
     */
    protected $participationId;
    /**
     * Participation set ID of provider participant (corresponding signer in case of witness, corresponding host in case of in-person-signer). Ignored as part of POST call
     *
     * @return string|null
     */
    public function getParticipationSetId(): ?string
    {
        return $this->participationSetId;
    }
    /**
     * Participation set ID of provider participant (corresponding signer in case of witness, corresponding host in case of in-person-signer). Ignored as part of POST call
     *
     * @param string|null $participationSetId
     *
     * @return self
     */
    public function setParticipationSetId(?string $participationSetId): self
    {
        $this->initialized['participationSetId'] = true;
        $this->participationSetId = $participationSetId;
        return $this;
    }
    /**
     * Label of provider participant (corresponding signer in case of witness, corresponding host in case of in-person-signer. Ensure to have unique label across all signers to identify them uniquely.)
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * Label of provider participant (corresponding signer in case of witness, corresponding host in case of in-person-signer. Ensure to have unique label across all signers to identify them uniquely.)
     *
     * @param string|null $label
     *
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
        return $this;
    }
    /**
     * Participation ID of provider participant (corresponding signer in case of witness, corresponding host in case of in-person-signer). Ignored as part of POST call
     *
     * @return string|null
     */
    public function getParticipationId(): ?string
    {
        return $this->participationId;
    }
    /**
     * Participation ID of provider participant (corresponding signer in case of witness, corresponding host in case of in-person-signer). Ignored as part of POST call
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