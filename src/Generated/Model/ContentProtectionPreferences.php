<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ContentProtectionPreferences
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
     * Specifies the Content Protection Preference for External users you would like to request . The possible values are <br> ENABLE : Enable Content Protection, <br>
     * DISABLE: Disable Content Protection
     *
     * @var string|null
     */
    protected $external;
    /**
     * Specifies the Content Protection Preference for Internal users you would like to request . The possible values are <br> ENABLE : Enable Content Protection, <br>
     * DISABLE: Disable Content Protection
     *
     * @var string|null
     */
    protected $internal;
    /**
     * Specifies the Content Protection Preference for External users you would like to request . The possible values are <br> ENABLE : Enable Content Protection, <br>
     * DISABLE: Disable Content Protection
     *
     * @return string|null
     */
    public function getExternal(): ?string
    {
        return $this->external;
    }
    /**
    * Specifies the Content Protection Preference for External users you would like to request . The possible values are <br> ENABLE : Enable Content Protection, <br>
    DISABLE: Disable Content Protection
    *
    * @param string|null $external
    *
    * @return self
    */
    public function setExternal(?string $external): self
    {
        $this->initialized['external'] = true;
        $this->external = $external;
        return $this;
    }
    /**
     * Specifies the Content Protection Preference for Internal users you would like to request . The possible values are <br> ENABLE : Enable Content Protection, <br>
     * DISABLE: Disable Content Protection
     *
     * @return string|null
     */
    public function getInternal(): ?string
    {
        return $this->internal;
    }
    /**
    * Specifies the Content Protection Preference for Internal users you would like to request . The possible values are <br> ENABLE : Enable Content Protection, <br>
    DISABLE: Disable Content Protection
    *
    * @param string|null $internal
    *
    * @return self
    */
    public function setInternal(?string $internal): self
    {
        $this->initialized['internal'] = true;
        $this->internal = $internal;
        return $this;
    }
}