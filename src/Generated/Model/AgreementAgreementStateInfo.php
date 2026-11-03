<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementAgreementStateInfo
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
     * @var AgreementAgreementCancellationInfo|null
     */
    protected $agreementCancellationInfo;
    /**
     * @var AgreementRestartInfo|null
     */
    protected $agreementRestartInfo;
    /**
     * The state in which the agreement should land
     *
     * @var string|null
     */
    protected $state;
    /**
     * @return AgreementAgreementCancellationInfo|null
     */
    public function getAgreementCancellationInfo(): ?AgreementAgreementCancellationInfo
    {
        return $this->agreementCancellationInfo;
    }
    /**
     * @param AgreementAgreementCancellationInfo|null $agreementCancellationInfo
     *
     * @return self
     */
    public function setAgreementCancellationInfo(?AgreementAgreementCancellationInfo $agreementCancellationInfo): self
    {
        $this->initialized['agreementCancellationInfo'] = true;
        $this->agreementCancellationInfo = $agreementCancellationInfo;
        return $this;
    }
    /**
     * @return AgreementRestartInfo|null
     */
    public function getAgreementRestartInfo(): ?AgreementRestartInfo
    {
        return $this->agreementRestartInfo;
    }
    /**
     * @param AgreementRestartInfo|null $agreementRestartInfo
     *
     * @return self
     */
    public function setAgreementRestartInfo(?AgreementRestartInfo $agreementRestartInfo): self
    {
        $this->initialized['agreementRestartInfo'] = true;
        $this->agreementRestartInfo = $agreementRestartInfo;
        return $this;
    }
    /**
     * The state in which the agreement should land
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * The state in which the agreement should land
     *
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
}