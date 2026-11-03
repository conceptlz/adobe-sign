<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementEventElectronicSealInfo
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
     * the display name of the electronic seal
     *
     * @var string|null
     */
    protected $name;
    /**
     * Company name that placed the electronic seal
     *
     * @var string|null
     */
    protected $company;
    /**
     * unique identifier for the electronic seal
     *
     * @var string|null
     */
    protected $id;
    /**
     * the display name of the electronic seal
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * the display name of the electronic seal
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
     * Company name that placed the electronic seal
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * Company name that placed the electronic seal
     *
     * @param string|null $company
     *
     * @return self
     */
    public function setCompany(?string $company): self
    {
        $this->initialized['company'] = true;
        $this->company = $company;
        return $this;
    }
    /**
     * unique identifier for the electronic seal
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * unique identifier for the electronic seal
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
}