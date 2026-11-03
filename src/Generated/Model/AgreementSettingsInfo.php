<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementSettingsInfo
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
     * True if the Agreement sender had HIPAA protections enabled for their agreements at the time the agreement was created.
     *
     * @var bool|null
     */
    protected $hipaaEnabled;
    /**
     * if false, the user will not be permitted to modify the set of files being sent out for signature, defaults to true.
     *
     * @var bool|null
     */
    protected $canEditFiles;
    /**
     *  if false, the user will not be allowed to modify any agreement settings. defaults to true.
     *
     * @var bool|null
     */
    protected $canEditAgreementSettings;
    /**
     * if false, the user will not be allowed to modify electronic seal, defaults to true.
     *
     * @var bool|null
     */
    protected $canEditElectronicSeals;
    /**
     * True if the Agreement sender had HIPAA protections enabled for their agreements at the time the agreement was created.
     *
     * @return bool|null
     */
    public function getHipaaEnabled(): ?bool
    {
        return $this->hipaaEnabled;
    }
    /**
     * True if the Agreement sender had HIPAA protections enabled for their agreements at the time the agreement was created.
     *
     * @param bool|null $hipaaEnabled
     *
     * @return self
     */
    public function setHipaaEnabled(?bool $hipaaEnabled): self
    {
        $this->initialized['hipaaEnabled'] = true;
        $this->hipaaEnabled = $hipaaEnabled;
        return $this;
    }
    /**
     * if false, the user will not be permitted to modify the set of files being sent out for signature, defaults to true.
     *
     * @return bool|null
     */
    public function getCanEditFiles(): ?bool
    {
        return $this->canEditFiles;
    }
    /**
     * if false, the user will not be permitted to modify the set of files being sent out for signature, defaults to true.
     *
     * @param bool|null $canEditFiles
     *
     * @return self
     */
    public function setCanEditFiles(?bool $canEditFiles): self
    {
        $this->initialized['canEditFiles'] = true;
        $this->canEditFiles = $canEditFiles;
        return $this;
    }
    /**
     *  if false, the user will not be allowed to modify any agreement settings. defaults to true.
     *
     * @return bool|null
     */
    public function getCanEditAgreementSettings(): ?bool
    {
        return $this->canEditAgreementSettings;
    }
    /**
     *  if false, the user will not be allowed to modify any agreement settings. defaults to true.
     *
     * @param bool|null $canEditAgreementSettings
     *
     * @return self
     */
    public function setCanEditAgreementSettings(?bool $canEditAgreementSettings): self
    {
        $this->initialized['canEditAgreementSettings'] = true;
        $this->canEditAgreementSettings = $canEditAgreementSettings;
        return $this;
    }
    /**
     * if false, the user will not be allowed to modify electronic seal, defaults to true.
     *
     * @return bool|null
     */
    public function getCanEditElectronicSeals(): ?bool
    {
        return $this->canEditElectronicSeals;
    }
    /**
     * if false, the user will not be allowed to modify electronic seal, defaults to true.
     *
     * @param bool|null $canEditElectronicSeals
     *
     * @return self
     */
    public function setCanEditElectronicSeals(?bool $canEditElectronicSeals): self
    {
        $this->initialized['canEditElectronicSeals'] = true;
        $this->canEditElectronicSeals = $canEditElectronicSeals;
        return $this;
    }
}