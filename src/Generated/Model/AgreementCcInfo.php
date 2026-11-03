<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementCcInfo
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
     * When you enable limited document visibility (documentVisibilityEnabled), you can specify which file (fileInfo) should be made visible to which specific participant set.<br>Specify one or more label values of a fileInfos element.<br>Each signer participant sets must contain at least one required signature field in at least one visible file included in this API call; if not a page with a signature field is automatically appended for any missing participant sets. If there is a possibility that one or more participant sets do not have a required signature field in the files included in the API call, all signer participant sets should include a special index value of '0' to make this automatically appended signature page visible to the signer. Not doing so may result in an error. For all other roles, you may omit this value to exclude this page.
     *
     * @var list<string>|null
     */
    protected $visiblePages;
    /**
     * Notification types to disable for this CC recipient. Currently applies only to email notifications; SMS and WhatsApp notifications are not affected. INITIAL: first notification when CC is added to the agreement. INTERMEDIATE: status update notifications during the signing workflow, including when participants sign, delegate, reject, or when other workflow events occur. FINAL: completion notification when the agreement is fully executed and all participants have completed their actions. CANCELLATION: notifications when the agreement is cancelled by sender or expires. REMINDER: all reminder notifications (not typically sent to CCs). This will be ignored as part of PUT calls. Not returned in GET calls.
     *
     * @var list<string>|null
     */
    protected $disabledNotificationTypes;
    /**
     * Label of the CC list as returned in workflow description
     *
     * @var string|null
     */
    protected $label;
    /**
     * To assign a signing order index to a CC, this should follow the same indexing as participantSetInfo order. CC will be notified when the participant is requested and when the agreement is completed. In case of null or 0, the CC is considered a general CC, where he/she will be notified when the agreement is sent and completed. CC can be both general cc and a participant's cc, eg. [0,1]. This will be ignored as part of PUT calls.
     *
     * @var list<int>|null
     */
    protected $ccSigningOrder;
    /**
     * The extended status of the participant. If provided in POST/PUT, it will be ignored
     *
     * @var string|null
     */
    protected $extendedStatus;
    /**
     * Email of the CC participant of the agreement
     *
     * @var string|null
     */
    protected $email;
    /**
     * The status of the participant. This cannot be changed as part of the PUT call. New participants will be ignored if added with status that is not ACTIVE.
     *
     * @var string|null
     */
    protected $status;
    /**
     * When you enable limited document visibility (documentVisibilityEnabled), you can specify which file (fileInfo) should be made visible to which specific participant set.<br>Specify one or more label values of a fileInfos element.<br>Each signer participant sets must contain at least one required signature field in at least one visible file included in this API call; if not a page with a signature field is automatically appended for any missing participant sets. If there is a possibility that one or more participant sets do not have a required signature field in the files included in the API call, all signer participant sets should include a special index value of '0' to make this automatically appended signature page visible to the signer. Not doing so may result in an error. For all other roles, you may omit this value to exclude this page.
     *
     * @return list<string>|null
     */
    public function getVisiblePages(): ?array
    {
        return $this->visiblePages;
    }
    /**
     * When you enable limited document visibility (documentVisibilityEnabled), you can specify which file (fileInfo) should be made visible to which specific participant set.<br>Specify one or more label values of a fileInfos element.<br>Each signer participant sets must contain at least one required signature field in at least one visible file included in this API call; if not a page with a signature field is automatically appended for any missing participant sets. If there is a possibility that one or more participant sets do not have a required signature field in the files included in the API call, all signer participant sets should include a special index value of '0' to make this automatically appended signature page visible to the signer. Not doing so may result in an error. For all other roles, you may omit this value to exclude this page.
     *
     * @param list<string>|null $visiblePages
     *
     * @return self
     */
    public function setVisiblePages(?array $visiblePages): self
    {
        $this->initialized['visiblePages'] = true;
        $this->visiblePages = $visiblePages;
        return $this;
    }
    /**
     * Notification types to disable for this CC recipient. Currently applies only to email notifications; SMS and WhatsApp notifications are not affected. INITIAL: first notification when CC is added to the agreement. INTERMEDIATE: status update notifications during the signing workflow, including when participants sign, delegate, reject, or when other workflow events occur. FINAL: completion notification when the agreement is fully executed and all participants have completed their actions. CANCELLATION: notifications when the agreement is cancelled by sender or expires. REMINDER: all reminder notifications (not typically sent to CCs). This will be ignored as part of PUT calls. Not returned in GET calls.
     *
     * @return list<string>|null
     */
    public function getDisabledNotificationTypes(): ?array
    {
        return $this->disabledNotificationTypes;
    }
    /**
     * Notification types to disable for this CC recipient. Currently applies only to email notifications; SMS and WhatsApp notifications are not affected. INITIAL: first notification when CC is added to the agreement. INTERMEDIATE: status update notifications during the signing workflow, including when participants sign, delegate, reject, or when other workflow events occur. FINAL: completion notification when the agreement is fully executed and all participants have completed their actions. CANCELLATION: notifications when the agreement is cancelled by sender or expires. REMINDER: all reminder notifications (not typically sent to CCs). This will be ignored as part of PUT calls. Not returned in GET calls.
     *
     * @param list<string>|null $disabledNotificationTypes
     *
     * @return self
     */
    public function setDisabledNotificationTypes(?array $disabledNotificationTypes): self
    {
        $this->initialized['disabledNotificationTypes'] = true;
        $this->disabledNotificationTypes = $disabledNotificationTypes;
        return $this;
    }
    /**
     * Label of the CC list as returned in workflow description
     *
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * Label of the CC list as returned in workflow description
     *
     * @param string|null $label
     *
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
        return $this;
    }
    /**
     * To assign a signing order index to a CC, this should follow the same indexing as participantSetInfo order. CC will be notified when the participant is requested and when the agreement is completed. In case of null or 0, the CC is considered a general CC, where he/she will be notified when the agreement is sent and completed. CC can be both general cc and a participant's cc, eg. [0,1]. This will be ignored as part of PUT calls.
     *
     * @return list<int>|null
     */
    public function getCcSigningOrder(): ?array
    {
        return $this->ccSigningOrder;
    }
    /**
     * To assign a signing order index to a CC, this should follow the same indexing as participantSetInfo order. CC will be notified when the participant is requested and when the agreement is completed. In case of null or 0, the CC is considered a general CC, where he/she will be notified when the agreement is sent and completed. CC can be both general cc and a participant's cc, eg. [0,1]. This will be ignored as part of PUT calls.
     *
     * @param list<int>|null $ccSigningOrder
     *
     * @return self
     */
    public function setCcSigningOrder(?array $ccSigningOrder): self
    {
        $this->initialized['ccSigningOrder'] = true;
        $this->ccSigningOrder = $ccSigningOrder;
        return $this;
    }
    /**
     * The extended status of the participant. If provided in POST/PUT, it will be ignored
     *
     * @return string|null
     */
    public function getExtendedStatus(): ?string
    {
        return $this->extendedStatus;
    }
    /**
     * The extended status of the participant. If provided in POST/PUT, it will be ignored
     *
     * @param string|null $extendedStatus
     *
     * @return self
     */
    public function setExtendedStatus(?string $extendedStatus): self
    {
        $this->initialized['extendedStatus'] = true;
        $this->extendedStatus = $extendedStatus;
        return $this;
    }
    /**
     * Email of the CC participant of the agreement
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Email of the CC participant of the agreement
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
    /**
     * The status of the participant. This cannot be changed as part of the PUT call. New participants will be ignored if added with status that is not ACTIVE.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * The status of the participant. This cannot be changed as part of the PUT call. New participants will be ignored if added with status that is not ACTIVE.
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