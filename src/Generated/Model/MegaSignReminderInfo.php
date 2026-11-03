<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class MegaSignReminderInfo
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
     * An optional message sent to the recipients, describing why their participation is required
     *
     * @var string|null
     */
    protected $note;
    /**
     * The date when the reminder was last sent. Only provided in GET. Cannot be provided in POST request. If provided in POST, it will be ignored. Cannot be updated in a PUT. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $lastSentDate;
    /**
     * The date when the reminder is scheduled to be sent next. When provided in POST request, frequency needs to be ONCE (or not specified), startReminderCounterFrom needs to be REMINDER_CREATION (or not specified) and firstReminderDelay needs to be 0 (or not specified). Cannot be updated in a PUT. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @var string|null
     */
    protected $nextSentDate;
    /**
     * An identifier of the reminder resource created on the server. If provided in POST or PUT, it will be ignored
     *
     * @var string|null
     */
    protected $reminderId;
    /**
     * Integer which specifies the delay in hours before sending the first reminder.<br>This is an optional field. The minimum value allowed is 1 hour and the maximum value can’t be more than the difference of agreement creation and expiry time of the agreement in hours.<br>If this is not specified but the reminder frequency is specified, then the first reminder will be sent based on frequency.<br>i.e. if the reminder is created with frequency specified as daily, the firstReminderDelay will be 24 hours. Cannot be updated in a PUT
     *
     * @var int|null
     */
    protected $firstReminderDelay;
    /**
     * A list of one or more participant IDs that the reminder should be sent to. These must be sharees or cc's on the bulk send. In order to remind any other participant who has not signed, use the allUnsigned boolean parameter.
     *
     * @var list<string>|null
     */
    protected $recipientParticipantIds;
    /**
     * Reminder can be sent based on when the agreement becomes available or when the reminder is created<br>AGREEMENT_AVAILABILITY: If the agreement is not available to the participant at the time of reminder creation, the reminder will be sent for the first time, only when the agreement becomes available to the participant taking the firstReminderDelay into account. Subsequent reminders will be sent based on the frequency specified.  If the agreement is already available to the participant at the time of reminder creation, the first reminder will be sent after the delay specified by firstReminderDelay from the reminder creation time.<br>REMINDER_CREATION: The first reminder will be sent after the delay specified by firstReminderDelay from the reminder creation time only if the agreement is available at that time. Subsequent reminders will be triggered based on the frequency specified and will be sent only if the agreement is available at that time.  For agreements in authoring state, creating reminder with startReminderCounterFrom as REMINDER_CREATION is not allowed.<br>Note : If firstReminderDelay, frequency and startReminderCounterFrom fields are not specified in POST, reminder will be sent right now if the agreement is available. If agreement is not available, an error will be thrown.  Cannot be updated in a PUT
     *
     * @var string|null
     */
    protected $startReminderCounterFrom;
    /**
     * If true, set a reminder on all participants (non-CCs and non-sharees) that still need to sign the bulk send agreement
     *
     * @var bool|null
     */
    protected $allUnsigned;
    /**
     * The frequency at which reminder will be sent until the agreement is completed.<br>If frequency is not provided, the reminder will be sent once (if the agreement is available at the specified time) with the delay based on the firstReminderDelay field and will never repeat again. If the agreement is not available at that time, reminder will not be sent. Cannot be updated in a PUT
     *
     * @var string|null
     */
    protected $frequency;
    /**
     * Current status of the reminder.  The only valid update in a PUT is from ACTIVE to CANCELED.  Must be provided as ACTIVE in a POST.
     *
     * @var string|null
     */
    protected $status;
    /**
     * An optional message sent to the recipients, describing why their participation is required
     *
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }
    /**
     * An optional message sent to the recipients, describing why their participation is required
     *
     * @param string|null $note
     *
     * @return self
     */
    public function setNote(?string $note): self
    {
        $this->initialized['note'] = true;
        $this->note = $note;
        return $this;
    }
    /**
     * The date when the reminder was last sent. Only provided in GET. Cannot be provided in POST request. If provided in POST, it will be ignored. Cannot be updated in a PUT. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getLastSentDate(): ?string
    {
        return $this->lastSentDate;
    }
    /**
     * The date when the reminder was last sent. Only provided in GET. Cannot be provided in POST request. If provided in POST, it will be ignored. Cannot be updated in a PUT. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $lastSentDate
     *
     * @return self
     */
    public function setLastSentDate(?string $lastSentDate): self
    {
        $this->initialized['lastSentDate'] = true;
        $this->lastSentDate = $lastSentDate;
        return $this;
    }
    /**
     * The date when the reminder is scheduled to be sent next. When provided in POST request, frequency needs to be ONCE (or not specified), startReminderCounterFrom needs to be REMINDER_CREATION (or not specified) and firstReminderDelay needs to be 0 (or not specified). Cannot be updated in a PUT. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @return string|null
     */
    public function getNextSentDate(): ?string
    {
        return $this->nextSentDate;
    }
    /**
     * The date when the reminder is scheduled to be sent next. When provided in POST request, frequency needs to be ONCE (or not specified), startReminderCounterFrom needs to be REMINDER_CREATION (or not specified) and firstReminderDelay needs to be 0 (or not specified). Cannot be updated in a PUT. Format would be yyyy-MM-dd'T'HH:mm:ssZ. For example, e.g 2016-02-25T18:46:19Z represents UTC time
     *
     * @param string|null $nextSentDate
     *
     * @return self
     */
    public function setNextSentDate(?string $nextSentDate): self
    {
        $this->initialized['nextSentDate'] = true;
        $this->nextSentDate = $nextSentDate;
        return $this;
    }
    /**
     * An identifier of the reminder resource created on the server. If provided in POST or PUT, it will be ignored
     *
     * @return string|null
     */
    public function getReminderId(): ?string
    {
        return $this->reminderId;
    }
    /**
     * An identifier of the reminder resource created on the server. If provided in POST or PUT, it will be ignored
     *
     * @param string|null $reminderId
     *
     * @return self
     */
    public function setReminderId(?string $reminderId): self
    {
        $this->initialized['reminderId'] = true;
        $this->reminderId = $reminderId;
        return $this;
    }
    /**
     * Integer which specifies the delay in hours before sending the first reminder.<br>This is an optional field. The minimum value allowed is 1 hour and the maximum value can’t be more than the difference of agreement creation and expiry time of the agreement in hours.<br>If this is not specified but the reminder frequency is specified, then the first reminder will be sent based on frequency.<br>i.e. if the reminder is created with frequency specified as daily, the firstReminderDelay will be 24 hours. Cannot be updated in a PUT
     *
     * @return int|null
     */
    public function getFirstReminderDelay(): ?int
    {
        return $this->firstReminderDelay;
    }
    /**
     * Integer which specifies the delay in hours before sending the first reminder.<br>This is an optional field. The minimum value allowed is 1 hour and the maximum value can’t be more than the difference of agreement creation and expiry time of the agreement in hours.<br>If this is not specified but the reminder frequency is specified, then the first reminder will be sent based on frequency.<br>i.e. if the reminder is created with frequency specified as daily, the firstReminderDelay will be 24 hours. Cannot be updated in a PUT
     *
     * @param int|null $firstReminderDelay
     *
     * @return self
     */
    public function setFirstReminderDelay(?int $firstReminderDelay): self
    {
        $this->initialized['firstReminderDelay'] = true;
        $this->firstReminderDelay = $firstReminderDelay;
        return $this;
    }
    /**
     * A list of one or more participant IDs that the reminder should be sent to. These must be sharees or cc's on the bulk send. In order to remind any other participant who has not signed, use the allUnsigned boolean parameter.
     *
     * @return list<string>|null
     */
    public function getRecipientParticipantIds(): ?array
    {
        return $this->recipientParticipantIds;
    }
    /**
     * A list of one or more participant IDs that the reminder should be sent to. These must be sharees or cc's on the bulk send. In order to remind any other participant who has not signed, use the allUnsigned boolean parameter.
     *
     * @param list<string>|null $recipientParticipantIds
     *
     * @return self
     */
    public function setRecipientParticipantIds(?array $recipientParticipantIds): self
    {
        $this->initialized['recipientParticipantIds'] = true;
        $this->recipientParticipantIds = $recipientParticipantIds;
        return $this;
    }
    /**
     * Reminder can be sent based on when the agreement becomes available or when the reminder is created<br>AGREEMENT_AVAILABILITY: If the agreement is not available to the participant at the time of reminder creation, the reminder will be sent for the first time, only when the agreement becomes available to the participant taking the firstReminderDelay into account. Subsequent reminders will be sent based on the frequency specified.  If the agreement is already available to the participant at the time of reminder creation, the first reminder will be sent after the delay specified by firstReminderDelay from the reminder creation time.<br>REMINDER_CREATION: The first reminder will be sent after the delay specified by firstReminderDelay from the reminder creation time only if the agreement is available at that time. Subsequent reminders will be triggered based on the frequency specified and will be sent only if the agreement is available at that time.  For agreements in authoring state, creating reminder with startReminderCounterFrom as REMINDER_CREATION is not allowed.<br>Note : If firstReminderDelay, frequency and startReminderCounterFrom fields are not specified in POST, reminder will be sent right now if the agreement is available. If agreement is not available, an error will be thrown.  Cannot be updated in a PUT
     *
     * @return string|null
     */
    public function getStartReminderCounterFrom(): ?string
    {
        return $this->startReminderCounterFrom;
    }
    /**
     * Reminder can be sent based on when the agreement becomes available or when the reminder is created<br>AGREEMENT_AVAILABILITY: If the agreement is not available to the participant at the time of reminder creation, the reminder will be sent for the first time, only when the agreement becomes available to the participant taking the firstReminderDelay into account. Subsequent reminders will be sent based on the frequency specified.  If the agreement is already available to the participant at the time of reminder creation, the first reminder will be sent after the delay specified by firstReminderDelay from the reminder creation time.<br>REMINDER_CREATION: The first reminder will be sent after the delay specified by firstReminderDelay from the reminder creation time only if the agreement is available at that time. Subsequent reminders will be triggered based on the frequency specified and will be sent only if the agreement is available at that time.  For agreements in authoring state, creating reminder with startReminderCounterFrom as REMINDER_CREATION is not allowed.<br>Note : If firstReminderDelay, frequency and startReminderCounterFrom fields are not specified in POST, reminder will be sent right now if the agreement is available. If agreement is not available, an error will be thrown.  Cannot be updated in a PUT
     *
     * @param string|null $startReminderCounterFrom
     *
     * @return self
     */
    public function setStartReminderCounterFrom(?string $startReminderCounterFrom): self
    {
        $this->initialized['startReminderCounterFrom'] = true;
        $this->startReminderCounterFrom = $startReminderCounterFrom;
        return $this;
    }
    /**
     * If true, set a reminder on all participants (non-CCs and non-sharees) that still need to sign the bulk send agreement
     *
     * @return bool|null
     */
    public function getAllUnsigned(): ?bool
    {
        return $this->allUnsigned;
    }
    /**
     * If true, set a reminder on all participants (non-CCs and non-sharees) that still need to sign the bulk send agreement
     *
     * @param bool|null $allUnsigned
     *
     * @return self
     */
    public function setAllUnsigned(?bool $allUnsigned): self
    {
        $this->initialized['allUnsigned'] = true;
        $this->allUnsigned = $allUnsigned;
        return $this;
    }
    /**
     * The frequency at which reminder will be sent until the agreement is completed.<br>If frequency is not provided, the reminder will be sent once (if the agreement is available at the specified time) with the delay based on the firstReminderDelay field and will never repeat again. If the agreement is not available at that time, reminder will not be sent. Cannot be updated in a PUT
     *
     * @return string|null
     */
    public function getFrequency(): ?string
    {
        return $this->frequency;
    }
    /**
     * The frequency at which reminder will be sent until the agreement is completed.<br>If frequency is not provided, the reminder will be sent once (if the agreement is available at the specified time) with the delay based on the firstReminderDelay field and will never repeat again. If the agreement is not available at that time, reminder will not be sent. Cannot be updated in a PUT
     *
     * @param string|null $frequency
     *
     * @return self
     */
    public function setFrequency(?string $frequency): self
    {
        $this->initialized['frequency'] = true;
        $this->frequency = $frequency;
        return $this;
    }
    /**
     * Current status of the reminder.  The only valid update in a PUT is from ACTIVE to CANCELED.  Must be provided as ACTIVE in a POST.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Current status of the reminder.  The only valid update in a PUT is from ACTIVE to CANCELED.  Must be provided as ACTIVE in a POST.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}