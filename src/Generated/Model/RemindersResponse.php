<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class RemindersResponse
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
     * A list of one or more reminders created on the agreement specified by the unique identifier agreementId by the user invoking the API.
     *
     * @var list<AgreementReminderInfo>|null
     */
    protected $reminderInfoList;
    /**
     * A list of one or more reminders created on the agreement specified by the unique identifier agreementId by the user invoking the API.
     *
     * @return list<AgreementReminderInfo>|null
     */
    public function getReminderInfoList(): ?array
    {
        return $this->reminderInfoList;
    }
    /**
     * A list of one or more reminders created on the agreement specified by the unique identifier agreementId by the user invoking the API.
     *
     * @param list<AgreementReminderInfo>|null $reminderInfoList
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