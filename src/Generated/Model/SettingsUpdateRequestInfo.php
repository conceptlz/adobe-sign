<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SettingsUpdateRequestInfo
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
     * Array of settings to be updated
     *
     * @var list<SettingUpdateDataInfo>|null
     */
    protected $settings;
    /**
     * Add comment
     *
     * @var string|null
     */
    protected $comment;
    /**
     * Array of settings to be updated
     *
     * @return list<SettingUpdateDataInfo>|null
     */
    public function getSettings(): ?array
    {
        return $this->settings;
    }
    /**
     * Array of settings to be updated
     *
     * @param list<SettingUpdateDataInfo>|null $settings
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
     * Add comment
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }
    /**
     * Add comment
     *
     * @param string|null $comment
     *
     * @return self
     */
    public function setComment(?string $comment): self
    {
        $this->initialized['comment'] = true;
        $this->comment = $comment;
        return $this;
    }
}