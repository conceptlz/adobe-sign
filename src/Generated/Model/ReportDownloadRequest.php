<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ReportDownloadRequest
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
     * Encrypted schedule ID. The raw schedule ID is encrypted using DataEncryption.encrypt(). This ID is obtained from the CFBI Reporting UI when setting up a scheduled report.
     *
     * @var string|null
     */
    protected $scheduleId;
    /**
     * Encrypted schedule ID. The raw schedule ID is encrypted using DataEncryption.encrypt(). This ID is obtained from the CFBI Reporting UI when setting up a scheduled report.
     *
     * @return string|null
     */
    public function getScheduleId(): ?string
    {
        return $this->scheduleId;
    }
    /**
     * Encrypted schedule ID. The raw schedule ID is encrypted using DataEncryption.encrypt(). This ID is obtained from the CFBI Reporting UI when setting up a scheduled report.
     *
     * @param string|null $scheduleId
     *
     * @return self
     */
    public function setScheduleId(?string $scheduleId): self
    {
        $this->initialized['scheduleId'] = true;
        $this->scheduleId = $scheduleId;
        return $this;
    }
}