<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SettingsQueryRequestInfo
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
     * An array of the external names for requested settings. At least one must be specified.
     *
     * @var list<string>|null
     */
    protected $settings;
    /**
     * An array of the external names for requested settings. At least one must be specified.
     *
     * @return list<string>|null
     */
    public function getSettings(): ?array
    {
        return $this->settings;
    }
    /**
     * An array of the external names for requested settings. At least one must be specified.
     *
     * @param list<string>|null $settings
     *
     * @return self
     */
    public function setSettings(?array $settings): self
    {
        $this->initialized['settings'] = true;
        $this->settings = $settings;
        return $this;
    }
}