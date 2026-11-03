<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementAssetsCriteria
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
     * ['SENDER' or 'CC' or 'SIGNER' or 'APPROVER' or 'FORM_FILLER' or 'ACCEPTOR' or 'CERTIFIED_RECIPIENT' or 'DELEGATE_TO_SIGNER' or 'DELEGATE_TO_APPROVER' or 'DELEGATE_TO_FORM_FILLER' or 'DELEGATE_TO_ACCEPTOR' or 'DELEGATE_TO_CERTIFIED_RECIPIENT' or 'NOTARY_SIGNER' or 'ELECTRONIC_SEALER' or 'HOST' or 'IN_PERSON_SIGNER' or 'SHARE' or 'OTHER']: a filter against the roles the user has on agreement assets.
     *
     * @var list<string>|null
     */
    protected $role;
    /**
     * ['SHOW_VISIBLE' or 'SHOW_HIDDEN' or 'SHOW_ALL']: a filter indicating the visibility level of agreements that get returned in the response. SHOW_VISIBLE by default.
     *
     * @var string|null
     */
    protected $visibility;
    /**
     * A filter against group identifier, as returned by the group creation API or retrieved from the API to fetch groups.
     *
     * @var list<string>|null
     */
    protected $groupId;
    /**
     * A filter against case-sensitive external id for which you would like to retrieve agreement asset information. External id is passed in the call to the agreement asset creation API.
     *
     * @var list<string>|null
     */
    protected $externalId;
    /**
     * The maximum number of elements returned in the result set. The value must be greater than or equal to 1 and less than or equal to 100. If not set, the default value is 50.
     *
     * @var int|null
     */
    protected $pageSize = 50;
    /**
     * ['DOCUMENT' or 'FORM_FIELD_LAYER']: a filter against the agreement asset sub types. Only agreement assets with type LIBRARY_TEMPLATE currently have this field populated.
     *
     * @var list<string>|null
     */
    protected $subTypes;
    /**
     * A filter against the email addresses of the agreement asset participants.
     *
     * @var list<string>|null
     */
    protected $participantEmail;
    /**
     * ['AGREEMENT' or 'MEGASIGN_CHILD' or 'WIDGET_INSTANCE' or 'MEGASIGN_PARENT' or 'LIBRARY_TEMPLATE' or 'WIDGET']: a filter against the agreement asset type.
     *
     * @var list<string>|null
     */
    protected $type;
    /**
     * A filter against the user id for account sharing.
     *
     * @var list<string>|null
     */
    protected $userId;
    /**
     * A filter against case-sensitive parent id for which you would like to retrieve agreement asset information.
     *
     * @var list<string>|null
     */
    protected $parentId;
    /**
     * ['CREATED_DATE' or 'MODIFIED_DATE' or 'EXPIRATION_DATE' or 'NAME' or 'STATUS' or 'SENDER']: defines the field by which the results will be ordered.
     *
     * @var string|null
     */
    protected $sortByField;
    /**
     * 0-based first row (offset) of the search results to return. The value must be greater than or equal to 0 and less than 10,000. If not provided, the default value is 0 and returns results from the very fist row, without offset.
     *
     * @var int|null
     */
    protected $startIndex = 0;
    /**
     * @var DateRangeFilter|null
     */
    protected $createdDate;
    /**
     * ['ASC' or 'DESC']: defines the sort order for the sortField field. Please note that for date sort fields agreements with missing date values for the sort field will always appear last, irrespective of sort order. For other types of sort fields agreements with missing values for the sort field appear last if order is ascending, and first if order is descending.
     *
     * @var string|null
     */
    protected $sortOrder;
    /**
     * @var DateRangeFilter|null
     */
    protected $modifiedDate;
    /**
     * ['title' or 'note' or 'message' or 'originalFileName' or 'email' or 'fullName' or 'jobTitle' or 'companyName' or 'recipientGroupName' or 'textFieldContent' or 'sharerFullName' or 'sharerRecipientGroupName' or 'externalId' or 'externalGroupId' or 'agreementId']: a list of field names against which string query specified in the 'query' field above is executed. For more information please refer here: <a href="https://helpx.adobe.com/sign/using/adobesign-search-users-agreements.html#NamePrefix" target="_blank">Field Name Prefix Query</a> (opens in separate window/tab).
     *
     * @var list<string>|null
     */
    protected $queryableFields;
    /**
     * A filter against case-sensitive agreement asset id for which you would like to retrieve the information.
     *
     * @var list<string>|null
     */
    protected $id;
    /**
     * A filter against case-sensitive workflow id for which you would like to retrieve agreement asset information. Workflow id is passed in the call to the agreement asset creation API.
     *
     * @var list<string>|null
     */
    protected $workflowId;
    /**
     * @var DateRangeFilter|null
     */
    protected $expirationDate;
    /**
     * ['WAITING_FOR_MY_SIGNATURE' or 'WAITING_FOR_MY_APPROVAL' or 'WAITING_FOR_MY_DELEGATION' or 'WAITING_FOR_MY_ACKNOWLEDGEMENT' or 'WAITING_FOR_MY_ACCEPTANCE' or 'WAITING_FOR_MY_FORM_FILLING' or 'WAITING_FOR_MY_HOSTING' or 'WAITING_FOR_AUTHORING' or 'WAITING_FOR_PREFILL' or 'WAITING_FOR_REVISION' or 'OUT_FOR_SIGNATURE' or 'OUT_FOR_APPROVAL' or 'OUT_FOR_DELIVERY' or 'OUT_FOR_ACCEPTANCE' or 'OUT_FOR_FORM_FILLING' or 'SIGNED' or 'APPROVED' or 'FORM_FILLED' or 'DELIVERED' or 'ACCEPTED' or 'ARCHIVED' or 'CANCELLED' or 'REMOVED' or 'EXPIRED' or 'AUTHORING' or 'ACTIVE' or 'DISABLED' or 'WAITING_FOR_NOTARIZATION' or  'ACCEPT_BEFORE_NOTARIZATION' or 'PAUSED' or 'SCHEDULED' or 'OTHER']: a filter against the detailed status of the agreement asset. <b>Please note that PARTIAL and DRAFT agreements are not supported for search.</b>
     *
     * @var list<string>|null
     */
    protected $status;
    /**
     * ['SENDER' or 'CC' or 'SIGNER' or 'APPROVER' or 'FORM_FILLER' or 'ACCEPTOR' or 'CERTIFIED_RECIPIENT' or 'DELEGATE_TO_SIGNER' or 'DELEGATE_TO_APPROVER' or 'DELEGATE_TO_FORM_FILLER' or 'DELEGATE_TO_ACCEPTOR' or 'DELEGATE_TO_CERTIFIED_RECIPIENT' or 'NOTARY_SIGNER' or 'ELECTRONIC_SEALER' or 'HOST' or 'IN_PERSON_SIGNER' or 'SHARE' or 'OTHER']: a filter against the roles the user has on agreement assets.
     *
     * @return list<string>|null
     */
    public function getRole(): ?array
    {
        return $this->role;
    }
    /**
     * ['SENDER' or 'CC' or 'SIGNER' or 'APPROVER' or 'FORM_FILLER' or 'ACCEPTOR' or 'CERTIFIED_RECIPIENT' or 'DELEGATE_TO_SIGNER' or 'DELEGATE_TO_APPROVER' or 'DELEGATE_TO_FORM_FILLER' or 'DELEGATE_TO_ACCEPTOR' or 'DELEGATE_TO_CERTIFIED_RECIPIENT' or 'NOTARY_SIGNER' or 'ELECTRONIC_SEALER' or 'HOST' or 'IN_PERSON_SIGNER' or 'SHARE' or 'OTHER']: a filter against the roles the user has on agreement assets.
     *
     * @param list<string>|null $role
     *
     * @return self
     */
    public function setRole(?array $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;
        return $this;
    }
    /**
     * ['SHOW_VISIBLE' or 'SHOW_HIDDEN' or 'SHOW_ALL']: a filter indicating the visibility level of agreements that get returned in the response. SHOW_VISIBLE by default.
     *
     * @return string|null
     */
    public function getVisibility(): ?string
    {
        return $this->visibility;
    }
    /**
     * ['SHOW_VISIBLE' or 'SHOW_HIDDEN' or 'SHOW_ALL']: a filter indicating the visibility level of agreements that get returned in the response. SHOW_VISIBLE by default.
     *
     * @param string|null $visibility
     *
     * @return self
     */
    public function setVisibility(?string $visibility): self
    {
        $this->initialized['visibility'] = true;
        $this->visibility = $visibility;
        return $this;
    }
    /**
     * A filter against group identifier, as returned by the group creation API or retrieved from the API to fetch groups.
     *
     * @return list<string>|null
     */
    public function getGroupId(): ?array
    {
        return $this->groupId;
    }
    /**
     * A filter against group identifier, as returned by the group creation API or retrieved from the API to fetch groups.
     *
     * @param list<string>|null $groupId
     *
     * @return self
     */
    public function setGroupId(?array $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;
        return $this;
    }
    /**
     * A filter against case-sensitive external id for which you would like to retrieve agreement asset information. External id is passed in the call to the agreement asset creation API.
     *
     * @return list<string>|null
     */
    public function getExternalId(): ?array
    {
        return $this->externalId;
    }
    /**
     * A filter against case-sensitive external id for which you would like to retrieve agreement asset information. External id is passed in the call to the agreement asset creation API.
     *
     * @param list<string>|null $externalId
     *
     * @return self
     */
    public function setExternalId(?array $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;
        return $this;
    }
    /**
     * The maximum number of elements returned in the result set. The value must be greater than or equal to 1 and less than or equal to 100. If not set, the default value is 50.
     *
     * @return int|null
     */
    public function getPageSize(): ?int
    {
        return $this->pageSize;
    }
    /**
     * The maximum number of elements returned in the result set. The value must be greater than or equal to 1 and less than or equal to 100. If not set, the default value is 50.
     *
     * @param int|null $pageSize
     *
     * @return self
     */
    public function setPageSize(?int $pageSize): self
    {
        $this->initialized['pageSize'] = true;
        $this->pageSize = $pageSize;
        return $this;
    }
    /**
     * ['DOCUMENT' or 'FORM_FIELD_LAYER']: a filter against the agreement asset sub types. Only agreement assets with type LIBRARY_TEMPLATE currently have this field populated.
     *
     * @return list<string>|null
     */
    public function getSubTypes(): ?array
    {
        return $this->subTypes;
    }
    /**
     * ['DOCUMENT' or 'FORM_FIELD_LAYER']: a filter against the agreement asset sub types. Only agreement assets with type LIBRARY_TEMPLATE currently have this field populated.
     *
     * @param list<string>|null $subTypes
     *
     * @return self
     */
    public function setSubTypes(?array $subTypes): self
    {
        $this->initialized['subTypes'] = true;
        $this->subTypes = $subTypes;
        return $this;
    }
    /**
     * A filter against the email addresses of the agreement asset participants.
     *
     * @return list<string>|null
     */
    public function getParticipantEmail(): ?array
    {
        return $this->participantEmail;
    }
    /**
     * A filter against the email addresses of the agreement asset participants.
     *
     * @param list<string>|null $participantEmail
     *
     * @return self
     */
    public function setParticipantEmail(?array $participantEmail): self
    {
        $this->initialized['participantEmail'] = true;
        $this->participantEmail = $participantEmail;
        return $this;
    }
    /**
     * ['AGREEMENT' or 'MEGASIGN_CHILD' or 'WIDGET_INSTANCE' or 'MEGASIGN_PARENT' or 'LIBRARY_TEMPLATE' or 'WIDGET']: a filter against the agreement asset type.
     *
     * @return list<string>|null
     */
    public function getType(): ?array
    {
        return $this->type;
    }
    /**
     * ['AGREEMENT' or 'MEGASIGN_CHILD' or 'WIDGET_INSTANCE' or 'MEGASIGN_PARENT' or 'LIBRARY_TEMPLATE' or 'WIDGET']: a filter against the agreement asset type.
     *
     * @param list<string>|null $type
     *
     * @return self
     */
    public function setType(?array $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * A filter against the user id for account sharing.
     *
     * @return list<string>|null
     */
    public function getUserId(): ?array
    {
        return $this->userId;
    }
    /**
     * A filter against the user id for account sharing.
     *
     * @param list<string>|null $userId
     *
     * @return self
     */
    public function setUserId(?array $userId): self
    {
        $this->initialized['userId'] = true;
        $this->userId = $userId;
        return $this;
    }
    /**
     * A filter against case-sensitive parent id for which you would like to retrieve agreement asset information.
     *
     * @return list<string>|null
     */
    public function getParentId(): ?array
    {
        return $this->parentId;
    }
    /**
     * A filter against case-sensitive parent id for which you would like to retrieve agreement asset information.
     *
     * @param list<string>|null $parentId
     *
     * @return self
     */
    public function setParentId(?array $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;
        return $this;
    }
    /**
     * ['CREATED_DATE' or 'MODIFIED_DATE' or 'EXPIRATION_DATE' or 'NAME' or 'STATUS' or 'SENDER']: defines the field by which the results will be ordered.
     *
     * @return string|null
     */
    public function getSortByField(): ?string
    {
        return $this->sortByField;
    }
    /**
     * ['CREATED_DATE' or 'MODIFIED_DATE' or 'EXPIRATION_DATE' or 'NAME' or 'STATUS' or 'SENDER']: defines the field by which the results will be ordered.
     *
     * @param string|null $sortByField
     *
     * @return self
     */
    public function setSortByField(?string $sortByField): self
    {
        $this->initialized['sortByField'] = true;
        $this->sortByField = $sortByField;
        return $this;
    }
    /**
     * 0-based first row (offset) of the search results to return. The value must be greater than or equal to 0 and less than 10,000. If not provided, the default value is 0 and returns results from the very fist row, without offset.
     *
     * @return int|null
     */
    public function getStartIndex(): ?int
    {
        return $this->startIndex;
    }
    /**
     * 0-based first row (offset) of the search results to return. The value must be greater than or equal to 0 and less than 10,000. If not provided, the default value is 0 and returns results from the very fist row, without offset.
     *
     * @param int|null $startIndex
     *
     * @return self
     */
    public function setStartIndex(?int $startIndex): self
    {
        $this->initialized['startIndex'] = true;
        $this->startIndex = $startIndex;
        return $this;
    }
    /**
     * @return DateRangeFilter|null
     */
    public function getCreatedDate(): ?DateRangeFilter
    {
        return $this->createdDate;
    }
    /**
     * @param DateRangeFilter|null $createdDate
     *
     * @return self
     */
    public function setCreatedDate(?DateRangeFilter $createdDate): self
    {
        $this->initialized['createdDate'] = true;
        $this->createdDate = $createdDate;
        return $this;
    }
    /**
     * ['ASC' or 'DESC']: defines the sort order for the sortField field. Please note that for date sort fields agreements with missing date values for the sort field will always appear last, irrespective of sort order. For other types of sort fields agreements with missing values for the sort field appear last if order is ascending, and first if order is descending.
     *
     * @return string|null
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }
    /**
     * ['ASC' or 'DESC']: defines the sort order for the sortField field. Please note that for date sort fields agreements with missing date values for the sort field will always appear last, irrespective of sort order. For other types of sort fields agreements with missing values for the sort field appear last if order is ascending, and first if order is descending.
     *
     * @param string|null $sortOrder
     *
     * @return self
     */
    public function setSortOrder(?string $sortOrder): self
    {
        $this->initialized['sortOrder'] = true;
        $this->sortOrder = $sortOrder;
        return $this;
    }
    /**
     * @return DateRangeFilter|null
     */
    public function getModifiedDate(): ?DateRangeFilter
    {
        return $this->modifiedDate;
    }
    /**
     * @param DateRangeFilter|null $modifiedDate
     *
     * @return self
     */
    public function setModifiedDate(?DateRangeFilter $modifiedDate): self
    {
        $this->initialized['modifiedDate'] = true;
        $this->modifiedDate = $modifiedDate;
        return $this;
    }
    /**
     * ['title' or 'note' or 'message' or 'originalFileName' or 'email' or 'fullName' or 'jobTitle' or 'companyName' or 'recipientGroupName' or 'textFieldContent' or 'sharerFullName' or 'sharerRecipientGroupName' or 'externalId' or 'externalGroupId' or 'agreementId']: a list of field names against which string query specified in the 'query' field above is executed. For more information please refer here: <a href="https://helpx.adobe.com/sign/using/adobesign-search-users-agreements.html#NamePrefix" target="_blank">Field Name Prefix Query</a> (opens in separate window/tab).
     *
     * @return list<string>|null
     */
    public function getQueryableFields(): ?array
    {
        return $this->queryableFields;
    }
    /**
     * ['title' or 'note' or 'message' or 'originalFileName' or 'email' or 'fullName' or 'jobTitle' or 'companyName' or 'recipientGroupName' or 'textFieldContent' or 'sharerFullName' or 'sharerRecipientGroupName' or 'externalId' or 'externalGroupId' or 'agreementId']: a list of field names against which string query specified in the 'query' field above is executed. For more information please refer here: <a href="https://helpx.adobe.com/sign/using/adobesign-search-users-agreements.html#NamePrefix" target="_blank">Field Name Prefix Query</a> (opens in separate window/tab).
     *
     * @param list<string>|null $queryableFields
     *
     * @return self
     */
    public function setQueryableFields(?array $queryableFields): self
    {
        $this->initialized['queryableFields'] = true;
        $this->queryableFields = $queryableFields;
        return $this;
    }
    /**
     * A filter against case-sensitive agreement asset id for which you would like to retrieve the information.
     *
     * @return list<string>|null
     */
    public function getId(): ?array
    {
        return $this->id;
    }
    /**
     * A filter against case-sensitive agreement asset id for which you would like to retrieve the information.
     *
     * @param list<string>|null $id
     *
     * @return self
     */
    public function setId(?array $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * A filter against case-sensitive workflow id for which you would like to retrieve agreement asset information. Workflow id is passed in the call to the agreement asset creation API.
     *
     * @return list<string>|null
     */
    public function getWorkflowId(): ?array
    {
        return $this->workflowId;
    }
    /**
     * A filter against case-sensitive workflow id for which you would like to retrieve agreement asset information. Workflow id is passed in the call to the agreement asset creation API.
     *
     * @param list<string>|null $workflowId
     *
     * @return self
     */
    public function setWorkflowId(?array $workflowId): self
    {
        $this->initialized['workflowId'] = true;
        $this->workflowId = $workflowId;
        return $this;
    }
    /**
     * @return DateRangeFilter|null
     */
    public function getExpirationDate(): ?DateRangeFilter
    {
        return $this->expirationDate;
    }
    /**
     * @param DateRangeFilter|null $expirationDate
     *
     * @return self
     */
    public function setExpirationDate(?DateRangeFilter $expirationDate): self
    {
        $this->initialized['expirationDate'] = true;
        $this->expirationDate = $expirationDate;
        return $this;
    }
    /**
     * ['WAITING_FOR_MY_SIGNATURE' or 'WAITING_FOR_MY_APPROVAL' or 'WAITING_FOR_MY_DELEGATION' or 'WAITING_FOR_MY_ACKNOWLEDGEMENT' or 'WAITING_FOR_MY_ACCEPTANCE' or 'WAITING_FOR_MY_FORM_FILLING' or 'WAITING_FOR_MY_HOSTING' or 'WAITING_FOR_AUTHORING' or 'WAITING_FOR_PREFILL' or 'WAITING_FOR_REVISION' or 'OUT_FOR_SIGNATURE' or 'OUT_FOR_APPROVAL' or 'OUT_FOR_DELIVERY' or 'OUT_FOR_ACCEPTANCE' or 'OUT_FOR_FORM_FILLING' or 'SIGNED' or 'APPROVED' or 'FORM_FILLED' or 'DELIVERED' or 'ACCEPTED' or 'ARCHIVED' or 'CANCELLED' or 'REMOVED' or 'EXPIRED' or 'AUTHORING' or 'ACTIVE' or 'DISABLED' or 'WAITING_FOR_NOTARIZATION' or  'ACCEPT_BEFORE_NOTARIZATION' or 'PAUSED' or 'SCHEDULED' or 'OTHER']: a filter against the detailed status of the agreement asset. <b>Please note that PARTIAL and DRAFT agreements are not supported for search.</b>
     *
     * @return list<string>|null
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }
    /**
     * ['WAITING_FOR_MY_SIGNATURE' or 'WAITING_FOR_MY_APPROVAL' or 'WAITING_FOR_MY_DELEGATION' or 'WAITING_FOR_MY_ACKNOWLEDGEMENT' or 'WAITING_FOR_MY_ACCEPTANCE' or 'WAITING_FOR_MY_FORM_FILLING' or 'WAITING_FOR_MY_HOSTING' or 'WAITING_FOR_AUTHORING' or 'WAITING_FOR_PREFILL' or 'WAITING_FOR_REVISION' or 'OUT_FOR_SIGNATURE' or 'OUT_FOR_APPROVAL' or 'OUT_FOR_DELIVERY' or 'OUT_FOR_ACCEPTANCE' or 'OUT_FOR_FORM_FILLING' or 'SIGNED' or 'APPROVED' or 'FORM_FILLED' or 'DELIVERED' or 'ACCEPTED' or 'ARCHIVED' or 'CANCELLED' or 'REMOVED' or 'EXPIRED' or 'AUTHORING' or 'ACTIVE' or 'DISABLED' or 'WAITING_FOR_NOTARIZATION' or  'ACCEPT_BEFORE_NOTARIZATION' or 'PAUSED' or 'SCHEDULED' or 'OTHER']: a filter against the detailed status of the agreement asset. <b>Please note that PARTIAL and DRAFT agreements are not supported for search.</b>
     *
     * @param list<string>|null $status
     *
     * @return self
     */
    public function setStatus(?array $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
}