<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SettingsQueryResponseInfo
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
     * A list of setting data objects requested by user. If none were requested, all public setting data objects will be present.
     *
     * @var list<SettingData>|null
     */
    protected $settings;
    /**
     * A list of invalid setting names requested by user.
     *
     * @var list<string>|null
     */
    protected $notFound;
    /**
     * A list of setting data objects requested by user. If none were requested, all public setting data objects will be present.
     *
     * @return list<SettingData>|null
     */
    public function getSettings(): ?array
    {
        return $this->settings;
    }
    /**
     * A list of setting data objects requested by user. If none were requested, all public setting data objects will be present.
     *
     * @param list<SettingData>|null $settings
     *
     * @return self
     */
    public function setSettings(?array $settings): self
    {
        $this->initialized['settings'] = true;
        $this->settings = $settings;
        return $this;
    }
    /**
     * A list of invalid setting names requested by user.
     *
     * @return list<string>|null
     */
    public function getNotFound(): ?array
    {
        return $this->notFound;
    }
    /**
     * A list of invalid setting names requested by user.
     *
     * @param list<string>|null $notFound
     *
     * @return self
     */
    public function setNotFound(?array $notFound): self
    {
        $this->initialized['notFound'] = true;
        $this->notFound = $notFound;
        return $this;
    }
}