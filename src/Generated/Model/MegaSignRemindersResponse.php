<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignRemindersResponse
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
     * A list of one or more reminders created on the bulk send parent specified by the unique identifier megasignId by the user invoking the API.
     *
     * @var list<MegaSignReminderInfo>|null
     */
    protected $reminderInfoList;
    /**
     * A list of one or more reminders created on the bulk send parent specified by the unique identifier megasignId by the user invoking the API.
     *
     * @return list<MegaSignReminderInfo>|null
     */
    public function getReminderInfoList(): ?array
    {
        return $this->reminderInfoList;
    }
    /**
     * A list of one or more reminders created on the bulk send parent specified by the unique identifier megasignId by the user invoking the API.
     *
     * @param list<MegaSignReminderInfo>|null $reminderInfoList
     *
     * @return self
     */
    public function setReminderInfoList(?array $reminderInfoList): self
    {
        $this->initialized['reminderInfoList'] = true;
        $this->reminderInfoList = $reminderInfoList;
        return $this;
    }
}