<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class CcInfos
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
     * List of emails of all the CC participant of the web form
     *
     * @var list<WidgetCcInfo>|null
     */
    protected $ccInfoList;
    /**
     * List of emails of all the CC participant of the web form
     *
     * @return list<WidgetCcInfo>|null
     */
    public function getCcInfoList(): ?array
    {
        return $this->ccInfoList;
    }
    /**
     * List of emails of all the CC participant of the web form
     *
     * @param list<WidgetCcInfo>|null $ccInfoList
     *
     * @return self
     */
    public function setCcInfoList(?array $ccInfoList): self
    {
        $this->initialized['ccInfoList'] = true;
        $this->ccInfoList = $ccInfoList;
        return $this;
    }
}