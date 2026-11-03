<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class OfflineDeviceInfo
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
     * Device Description
     *
     * @var string|null
     */
    protected $deviceDescription;
    /**
     * Application Description
     *
     * @var string|null
     */
    protected $applicationDescription;
    /**
     * The device local time. The device time provided should not be before 30 days of current date.Format should be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time, while 2016-02-25T13:46:19-05:00 represents the same time in EST
     *
     * @var string|null
     */
    protected $deviceTime;
    /**
     * Device Description
     *
     * @return string|null
     */
    public function getDeviceDescription(): ?string
    {
        return $this->deviceDescription;
    }
    /**
     * Device Description
     *
     * @param string|null $deviceDescription
     *
     * @return self
     */
    public function setDeviceDescription(?string $deviceDescription): self
    {
        $this->initialized['deviceDescription'] = true;
        $this->deviceDescription = $deviceDescription;
        return $this;
    }
    /**
     * Application Description
     *
     * @return string|null
     */
    public function getApplicationDescription(): ?string
    {
        return $this->applicationDescription;
    }
    /**
     * Application Description
     *
     * @param string|null $applicationDescription
     *
     * @return self
     */
    public function setApplicationDescription(?string $applicationDescription): self
    {
        $this->initialized['applicationDescription'] = true;
        $this->applicationDescription = $applicationDescription;
        return $this;
    }
    /**
     * The device local time. The device time provided should not be before 30 days of current date.Format should be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time, while 2016-02-25T13:46:19-05:00 represents the same time in EST
     *
     * @return string|null
     */
    public function getDeviceTime(): ?string
    {
        return $this->deviceTime;
    }
    /**
     * The device local time. The device time provided should not be before 30 days of current date.Format should be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time, while 2016-02-25T13:46:19-05:00 represents the same time in EST
     *
     * @param string|null $deviceTime
     *
     * @return self
     */
    public function setDeviceTime(?string $deviceTime): self
    {
        $this->initialized['deviceTime'] = true;
        $this->deviceTime = $deviceTime;
        return $this;
    }
}