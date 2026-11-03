<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WebhookInfo
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
     * Id of the resource type for which you want to create webhook. Provide agreementId if webhook needs to be created for an agreement. Similarly, widgetId if webhook needs to be created for a web form, megaSignId if webhook needs to be created for a bulk send and libraryDocumentId if webhook needs to be created for a library document. For GROUP scope, provide the groupId to override (the API user must be an administrator), or omit it to default to the API user's group. Need to specify only if scope is 'RESOURCE' OR 'GROUP'. Can't be modified in PUT request
     *
     * @var string|null
     */
    protected $resourceId;
    /**
     * @var WebhookUrlInfo|null
     */
    protected $webhookUrlInfo;
    /**
     * @var WebhookConditionalParams|null
     */
    protected $webhookConditionalParams;
    /**
     * Timestamp when the webhook was created. Will only be returned in GET request. Can't be modified in PUT request
     *
     * @var string|null
     */
    protected $created;
    /**
     * Determines events for which the webhook is triggered. The possible values are <br> AGREEMENT_CREATED : When an agreement is created <br>,
     * AGREEMENT_ACTION_DELEGATED : When an agreement is delegated <br>,
     * AGREEMENT_RECALLED : When an agreement is recalled <br>,
     * AGREEMENT_REJECTED : When an agreement is rejected <br>,
     * AGREEMENT_RESTARTED : When an agreement is restarted <br>,
     * AGREEMENT_EXPIRED : When an agreement expires <br>,
     * AGREEMENT_ACTION_COMPLETED : When an agreement action is completed <br>,
     * AGREEMENT_WORKFLOW_COMPLETED : When an agreement workflow is completed <br>,
     * AGREEMENT_EMAIL_VIEWED : When an agreement's email is viewed <br>,
     * AGREEMENT_MODIFIED : When an agreement is modified <br>,
     * AGREEMENT_SHARED : When an agreement is shared <br>,
     * AGREEMENT_UNSHARED : When an agreement is unshared <br>,
     * AGREEMENT_UNSHARED_AUTO : When an agreement is unshared auto <br>,
     * AGREEMENT_READY_TO_VAULT : When an agreement is ready to vault <br>,
     * AGREEMENT_VAULTED : When an agreement is vaulted <br>,
     * AGREEMENT_ACTION_REQUESTED : When an agreement action is requested <br>,
     * AGREEMENT_ACTION_REPLACED_SIGNER : When signer is replaced for an agreement <br>,
     * AGREEMENT_AUTO_CANCELLED_CONVERSION_PROBLEM : When an agreement is auto-cancelled due to conversion problem <br>,
     * AGREEMENT_DOCUMENTS_DELETED : When an agreement documents are deleted <br>,
     * AGREEMENT_EMAIL_BOUNCED : When an agreement email gets bounced <br>,
     * AGREEMENT_SMS_MESSAGE_BOUNCED : When an agreement SMS gets bounced <br>,
     * AGREEMENT_WHATSAPP_MESSAGE_BOUNCED : When an agreement WhatsApp gets bounced <br>,
     * AGREEMENT_KBA_AUTHENTICATED : When an agreement KBA is authenticated <br>,
     * AGREEMENT_EMAIL_OTP_AUTHENTICATED : When an agreement EMAIL OTP is authenticated <br>,
     * AGREEMENT_OFFLINE_SYNC : When an agreement is synced offline <br>,
     * AGREEMENT_USER_ACK_AGREEMENT_MODIFIED : User Acknowledgement when an agreement is modified <br>,
     * AGREEMENT_WEB_IDENTITY_AUTHENTICATED : When an agreement web identity is authenticated <br>,
     * AGREEMENT_READY_TO_NOTARIZE: When an agreement is ready for notarization <br>,
     * AGREEMENT_EXPIRATION_UPDATED: When agreement expiration time is updated <br>,
     * AGREEMENT_REMINDER_SENT: When an agreement reminder is sent <br>,
     * AGREEMENT_SIGNER_NAME_CHANGED_BY_SIGNER : When a signer changes his name at signing <br>,
     * AGREEMENT_REMINDER_INITIATED: When an agreement reminder is initiated <br>,
     * AGREEMENT_DOCUMENTS_VIEWED: An agreement is initially viewed by an user since its creation or modification <br>,
     * AGREEMENT_DOCUMENTS_VIEWED_PASSWORD_PROTECTED: A password protected agreement PDF is initially viewed by an user since its creation or modification <br>,
     * AGREEMENT_PAUSED: When an agreement is paused <br>,
     * AGREEMENT_RESUMED: When a paused agreement is resumed <br>,
     * AGREEMENT_PAUSED_EXPIRED: When a paused agreement expires after the pause period <br>,
     * AGREEMENT_PAUSE_EXPIRATION_WARNING_SENT: When a pause expiration warning is sent <br>,
     * AGREEMENT_ALL : All the supported agreement events for Webhooks <br>,
     * MEGASIGN_CREATED : When a bulk send is created <br>,
     * MEGASIGN_RECALLED : When a bulk send is recalled <br>,
     * MEGASIGN_SHARED : When a bulk send is shared <br>,
     * MEGASIGN_REMINDER_SENT: When a bulk send reminder is sent <br>,
     * MEGASIGN_REMINDER_INITIATED: When a bulk send reminder is initiated <br>,
     * MEGASIGN_ALL : All the supported Send in Bulk events for Webhooks <br>,
     * WIDGET_CREATED : When a web form is created <br>,
     * WIDGET_MODIFIED : When a web form is modified <br>,
     * WIDGET_SHARED : When a web form is shared <br>,
     * WIDGET_ENABLED : When a web form is enabled <br>,
     * WIDGET_DISABLED : When a web form is disabled <br>,
     * WIDGET_AUTO_CANCELLED_CONVERSION_PROBLEM : When a web form is auto-cancelled due to conversion problem <br>,
     * WIDGET_ALL : All the supported web form events for Webhooks <br>,
     * LIBRARY_DOCUMENT_CREATED : When a library document  is created <br>,
     * LIBRARY_DOCUMENT_AUTO_CANCELLED_CONVERSION_PROBLEM : When a library document is auto-cancelled due to conversion problem <br>,
     * LIBRARY_DOCUMENT_MODIFIED : When a library document is modified <br>,
     * LIBRARY_DOCUMENT_ALL : All the supported library document  events for Webhooks
     *
     * @var list<string>|null
     */
    protected $webhookSubscriptionEvents;
    /**
     * The display name of the application through which webhook is created
     *
     * @var string|null
     */
    protected $applicationDisplayName;
    /**
     * Emails of existing Acrobat Sign users to receive warnings and disablement notifications, only Admins can set this.
     *
     * @var list<WebhookProblemNotificationEmails>|null
     */
    protected $problemNotificationEmails;
    /**
     * Scope of webhook. Can't be modified in PUT request. The possible values are ACCOUNT, GROUP, USER or RESOURCE
     *
     * @var string|null
     */
    protected $scope;
    /**
     * The name of the webhook
     *
     * @var string|null
     */
    protected $name;
    /**
     * The unique identifier of the webhook. Will only be returned in GET request. Can't be modified in PUT request
     *
     * @var string|null
     */
    protected $id;
    /**
     * Timestamp when the webhook was last updated. Will only be returned in GET request. Can't be modified in PUT request
     *
     * @var string|null
     */
    protected $lastModified;
    /**
     * The state in which the webhook should be created
     *
     * @var string|null
     */
    protected $state;
    /**
     * The name of the application through which webhook is created
     *
     * @var string|null
     */
    protected $applicationName;
    /**
     * The resource for which you want to create webhook. Need to specify only if scope is 'RESOURCE'. Can't be modified in PUT request. The possible values are AGREEMENT, WIDGET,  MEGASIGN AND LIBRARY_DOCUMENT
     *
     * @var string|null
     */
    protected $resourceType;
    /**
     * Status of the webhook. Determines whether the webhook will be actually triggered. Default: ACTIVE, if ACTIVE, this webhook will receive event requests. If INACTIVE, this webhook will not receive event requests. Can't provide status in POST/PUT requests.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Id of the resource type for which you want to create webhook. Provide agreementId if webhook needs to be created for an agreement. Similarly, widgetId if webhook needs to be created for a web form, megaSignId if webhook needs to be created for a bulk send and libraryDocumentId if webhook needs to be created for a library document. For GROUP scope, provide the groupId to override (the API user must be an administrator), or omit it to default to the API user's group. Need to specify only if scope is 'RESOURCE' OR 'GROUP'. Can't be modified in PUT request
     *
     * @return string|null
     */
    public function getResourceId(): ?string
    {
        return $this->resourceId;
    }
    /**
     * Id of the resource type for which you want to create webhook. Provide agreementId if webhook needs to be created for an agreement. Similarly, widgetId if webhook needs to be created for a web form, megaSignId if webhook needs to be created for a bulk send and libraryDocumentId if webhook needs to be created for a library document. For GROUP scope, provide the groupId to override (the API user must be an administrator), or omit it to default to the API user's group. Need to specify only if scope is 'RESOURCE' OR 'GROUP'. Can't be modified in PUT request
     *
     * @param string|null $resourceId
     *
     * @return self
     */
    public function setResourceId(?string $resourceId): self
    {
        $this->initialized['resourceId'] = true;
        $this->resourceId = $resourceId;
        return $this;
    }
    /**
     * @return WebhookUrlInfo|null
     */
    public function getWebhookUrlInfo(): ?WebhookUrlInfo
    {
        return $this->webhookUrlInfo;
    }
    /**
     * @param WebhookUrlInfo|null $webhookUrlInfo
     *
     * @return self
     */
    public function setWebhookUrlInfo(?WebhookUrlInfo $webhookUrlInfo): self
    {
        $this->initialized['webhookUrlInfo'] = true;
        $this->webhookUrlInfo = $webhookUrlInfo;
        return $this;
    }
    /**
     * @return WebhookConditionalParams|null
     */
    public function getWebhookConditionalParams(): ?WebhookConditionalParams
    {
        return $this->webhookConditionalParams;
    }
    /**
     * @param WebhookConditionalParams|null $webhookConditionalParams
     *
     * @return self
     */
    public function setWebhookConditionalParams(?WebhookConditionalParams $webhookConditionalParams): self
    {
        $this->initialized['webhookConditionalParams'] = true;
        $this->webhookConditionalParams = $webhookConditionalParams;
        return $this;
    }
    /**
     * Timestamp when the webhook was created. Will only be returned in GET request. Can't be modified in PUT request
     *
     * @return string|null
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }
    /**
     * Timestamp when the webhook was created. Will only be returned in GET request. Can't be modified in PUT request
     *
     * @param string|null $created
     *
     * @return self
     */
    public function setCreated(?string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;
        return $this;
    }
    /**
     * Determines events for which the webhook is triggered. The possible values are <br> AGREEMENT_CREATED : When an agreement is created <br>,
     * AGREEMENT_ACTION_DELEGATED : When an agreement is delegated <br>,
     * AGREEMENT_RECALLED : When an agreement is recalled <br>,
     * AGREEMENT_REJECTED : When an agreement is rejected <br>,
     * AGREEMENT_RESTARTED : When an agreement is restarted <br>,
     * AGREEMENT_EXPIRED : When an agreement expires <br>,
     * AGREEMENT_ACTION_COMPLETED : When an agreement action is completed <br>,
     * AGREEMENT_WORKFLOW_COMPLETED : When an agreement workflow is completed <br>,
     * AGREEMENT_EMAIL_VIEWED : When an agreement's email is viewed <br>,
     * AGREEMENT_MODIFIED : When an agreement is modified <br>,
     * AGREEMENT_SHARED : When an agreement is shared <br>,
     * AGREEMENT_UNSHARED : When an agreement is unshared <br>,
     * AGREEMENT_UNSHARED_AUTO : When an agreement is unshared auto <br>,
     * AGREEMENT_READY_TO_VAULT : When an agreement is ready to vault <br>,
     * AGREEMENT_VAULTED : When an agreement is vaulted <br>,
     * AGREEMENT_ACTION_REQUESTED : When an agreement action is requested <br>,
     * AGREEMENT_ACTION_REPLACED_SIGNER : When signer is replaced for an agreement <br>,
     * AGREEMENT_AUTO_CANCELLED_CONVERSION_PROBLEM : When an agreement is auto-cancelled due to conversion problem <br>,
     * AGREEMENT_DOCUMENTS_DELETED : When an agreement documents are deleted <br>,
     * AGREEMENT_EMAIL_BOUNCED : When an agreement email gets bounced <br>,
     * AGREEMENT_SMS_MESSAGE_BOUNCED : When an agreement SMS gets bounced <br>,
     * AGREEMENT_WHATSAPP_MESSAGE_BOUNCED : When an agreement WhatsApp gets bounced <br>,
     * AGREEMENT_KBA_AUTHENTICATED : When an agreement KBA is authenticated <br>,
     * AGREEMENT_EMAIL_OTP_AUTHENTICATED : When an agreement EMAIL OTP is authenticated <br>,
     * AGREEMENT_OFFLINE_SYNC : When an agreement is synced offline <br>,
     * AGREEMENT_USER_ACK_AGREEMENT_MODIFIED : User Acknowledgement when an agreement is modified <br>,
     * AGREEMENT_WEB_IDENTITY_AUTHENTICATED : When an agreement web identity is authenticated <br>,
     * AGREEMENT_READY_TO_NOTARIZE: When an agreement is ready for notarization <br>,
     * AGREEMENT_EXPIRATION_UPDATED: When agreement expiration time is updated <br>,
     * AGREEMENT_REMINDER_SENT: When an agreement reminder is sent <br>,
     * AGREEMENT_SIGNER_NAME_CHANGED_BY_SIGNER : When a signer changes his name at signing <br>,
     * AGREEMENT_REMINDER_INITIATED: When an agreement reminder is initiated <br>,
     * AGREEMENT_DOCUMENTS_VIEWED: An agreement is initially viewed by an user since its creation or modification <br>,
     * AGREEMENT_DOCUMENTS_VIEWED_PASSWORD_PROTECTED: A password protected agreement PDF is initially viewed by an user since its creation or modification <br>,
     * AGREEMENT_PAUSED: When an agreement is paused <br>,
     * AGREEMENT_RESUMED: When a paused agreement is resumed <br>,
     * AGREEMENT_PAUSED_EXPIRED: When a paused agreement expires after the pause period <br>,
     * AGREEMENT_PAUSE_EXPIRATION_WARNING_SENT: When a pause expiration warning is sent <br>,
     * AGREEMENT_ALL : All the supported agreement events for Webhooks <br>,
     * MEGASIGN_CREATED : When a bulk send is created <br>,
     * MEGASIGN_RECALLED : When a bulk send is recalled <br>,
     * MEGASIGN_SHARED : When a bulk send is shared <br>,
     * MEGASIGN_REMINDER_SENT: When a bulk send reminder is sent <br>,
     * MEGASIGN_REMINDER_INITIATED: When a bulk send reminder is initiated <br>,
     * MEGASIGN_ALL : All the supported Send in Bulk events for Webhooks <br>,
     * WIDGET_CREATED : When a web form is created <br>,
     * WIDGET_MODIFIED : When a web form is modified <br>,
     * WIDGET_SHARED : When a web form is shared <br>,
     * WIDGET_ENABLED : When a web form is enabled <br>,
     * WIDGET_DISABLED : When a web form is disabled <br>,
     * WIDGET_AUTO_CANCELLED_CONVERSION_PROBLEM : When a web form is auto-cancelled due to conversion problem <br>,
     * WIDGET_ALL : All the supported web form events for Webhooks <br>,
     * LIBRARY_DOCUMENT_CREATED : When a library document  is created <br>,
     * LIBRARY_DOCUMENT_AUTO_CANCELLED_CONVERSION_PROBLEM : When a library document is auto-cancelled due to conversion problem <br>,
     * LIBRARY_DOCUMENT_MODIFIED : When a library document is modified <br>,
     * LIBRARY_DOCUMENT_ALL : All the supported library document  events for Webhooks
     *
     * @return list<string>|null
     */
    public function getWebhookSubscriptionEvents(): ?array
    {
        return $this->webhookSubscriptionEvents;
    }
    /**
    * Determines events for which the webhook is triggered. The possible values are <br> AGREEMENT_CREATED : When an agreement is created <br>,
    AGREEMENT_ACTION_DELEGATED : When an agreement is delegated <br>,
    AGREEMENT_RECALLED : When an agreement is recalled <br>,
    AGREEMENT_REJECTED : When an agreement is rejected <br>,
    AGREEMENT_RESTARTED : When an agreement is restarted <br>,
    AGREEMENT_EXPIRED : When an agreement expires <br>,
    AGREEMENT_ACTION_COMPLETED : When an agreement action is completed <br>,
    AGREEMENT_WORKFLOW_COMPLETED : When an agreement workflow is completed <br>,
    AGREEMENT_EMAIL_VIEWED : When an agreement's email is viewed <br>,
    AGREEMENT_MODIFIED : When an agreement is modified <br>,
    AGREEMENT_SHARED : When an agreement is shared <br>,
    AGREEMENT_UNSHARED : When an agreement is unshared <br>,
    AGREEMENT_UNSHARED_AUTO : When an agreement is unshared auto <br>,
    AGREEMENT_READY_TO_VAULT : When an agreement is ready to vault <br>,
    AGREEMENT_VAULTED : When an agreement is vaulted <br>,
    AGREEMENT_ACTION_REQUESTED : When an agreement action is requested <br>,
    AGREEMENT_ACTION_REPLACED_SIGNER : When signer is replaced for an agreement <br>,
    AGREEMENT_AUTO_CANCELLED_CONVERSION_PROBLEM : When an agreement is auto-cancelled due to conversion problem <br>,
    AGREEMENT_DOCUMENTS_DELETED : When an agreement documents are deleted <br>,
    AGREEMENT_EMAIL_BOUNCED : When an agreement email gets bounced <br>,
    AGREEMENT_SMS_MESSAGE_BOUNCED : When an agreement SMS gets bounced <br>,
    AGREEMENT_WHATSAPP_MESSAGE_BOUNCED : When an agreement WhatsApp gets bounced <br>,
    AGREEMENT_KBA_AUTHENTICATED : When an agreement KBA is authenticated <br>,
    AGREEMENT_EMAIL_OTP_AUTHENTICATED : When an agreement EMAIL OTP is authenticated <br>,
    AGREEMENT_OFFLINE_SYNC : When an agreement is synced offline <br>,
    AGREEMENT_USER_ACK_AGREEMENT_MODIFIED : User Acknowledgement when an agreement is modified <br>,
    AGREEMENT_WEB_IDENTITY_AUTHENTICATED : When an agreement web identity is authenticated <br>,
    AGREEMENT_READY_TO_NOTARIZE: When an agreement is ready for notarization <br>,
    AGREEMENT_EXPIRATION_UPDATED: When agreement expiration time is updated <br>,
    AGREEMENT_REMINDER_SENT: When an agreement reminder is sent <br>,
    AGREEMENT_SIGNER_NAME_CHANGED_BY_SIGNER : When a signer changes his name at signing <br>,
    AGREEMENT_REMINDER_INITIATED: When an agreement reminder is initiated <br>,
    AGREEMENT_DOCUMENTS_VIEWED: An agreement is initially viewed by an user since its creation or modification <br>,
    AGREEMENT_DOCUMENTS_VIEWED_PASSWORD_PROTECTED: A password protected agreement PDF is initially viewed by an user since its creation or modification <br>,
    AGREEMENT_PAUSED: When an agreement is paused <br>,
    AGREEMENT_RESUMED: When a paused agreement is resumed <br>,
    AGREEMENT_PAUSED_EXPIRED: When a paused agreement expires after the pause period <br>,
    AGREEMENT_PAUSE_EXPIRATION_WARNING_SENT: When a pause expiration warning is sent <br>,
    AGREEMENT_ALL : All the supported agreement events for Webhooks <br>,
    MEGASIGN_CREATED : When a bulk send is created <br>,
    MEGASIGN_RECALLED : When a bulk send is recalled <br>,
    MEGASIGN_SHARED : When a bulk send is shared <br>,
    MEGASIGN_REMINDER_SENT: When a bulk send reminder is sent <br>,
    MEGASIGN_REMINDER_INITIATED: When a bulk send reminder is initiated <br>,
    MEGASIGN_ALL : All the supported Send in Bulk events for Webhooks <br>,
    WIDGET_CREATED : When a web form is created <br>,
    WIDGET_MODIFIED : When a web form is modified <br>,
    WIDGET_SHARED : When a web form is shared <br>,
    WIDGET_ENABLED : When a web form is enabled <br>,
    WIDGET_DISABLED : When a web form is disabled <br>,
    WIDGET_AUTO_CANCELLED_CONVERSION_PROBLEM : When a web form is auto-cancelled due to conversion problem <br>,
    WIDGET_ALL : All the supported web form events for Webhooks <br>,
    LIBRARY_DOCUMENT_CREATED : When a library document  is created <br>,
    LIBRARY_DOCUMENT_AUTO_CANCELLED_CONVERSION_PROBLEM : When a library document is auto-cancelled due to conversion problem <br>,
    LIBRARY_DOCUMENT_MODIFIED : When a library document is modified <br>,
    LIBRARY_DOCUMENT_ALL : All the supported library document  events for Webhooks
    *
    * @param list<string>|null $webhookSubscriptionEvents
    *
    * @return self
    */
    public function setWebhookSubscriptionEvents(?array $webhookSubscriptionEvents): self
    {
        $this->initialized['webhookSubscriptionEvents'] = true;
        $this->webhookSubscriptionEvents = $webhookSubscriptionEvents;
        return $this;
    }
    /**
     * The display name of the application through which webhook is created
     *
     * @return string|null
     */
    public function getApplicationDisplayName(): ?string
    {
        return $this->applicationDisplayName;
    }
    /**
     * The display name of the application through which webhook is created
     *
     * @param string|null $applicationDisplayName
     *
     * @return self
     */
    public function setApplicationDisplayName(?string $applicationDisplayName): self
    {
        $this->initialized['applicationDisplayName'] = true;
        $this->applicationDisplayName = $applicationDisplayName;
        return $this;
    }
    /**
     * Emails of existing Acrobat Sign users to receive warnings and disablement notifications, only Admins can set this.
     *
     * @return list<WebhookProblemNotificationEmails>|null
     */
    public function getProblemNotificationEmails(): ?array
    {
        return $this->problemNotificationEmails;
    }
    /**
     * Emails of existing Acrobat Sign users to receive warnings and disablement notifications, only Admins can set this.
     *
     * @param list<WebhookProblemNotificationEmails>|null $problemNotificationEmails
     *
     * @return self
     */
    public function setProblemNotificationEmails(?array $problemNotificationEmails): self
    {
        $this->initialized['problemNotificationEmails'] = true;
        $this->problemNotificationEmails = $problemNotificationEmails;
        return $this;
    }
    /**
     * Scope of webhook. Can't be modified in PUT request. The possible values are ACCOUNT, GROUP, USER or RESOURCE
     *
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }
    /**
     * Scope of webhook. Can't be modified in PUT request. The possible values are ACCOUNT, GROUP, USER or RESOURCE
     *
     * @param string|null $scope
     *
     * @return self
     */
    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
    /**
     * The name of the webhook
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * The name of the webhook
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The unique identifier of the webhook. Will only be returned in GET request. Can't be modified in PUT request
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of the webhook. Will only be returned in GET request. Can't be modified in PUT request
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * Timestamp when the webhook was last updated. Will only be returned in GET request. Can't be modified in PUT request
     *
     * @return string|null
     */
    public function getLastModified(): ?string
    {
        return $this->lastModified;
    }
    /**
     * Timestamp when the webhook was last updated. Will only be returned in GET request. Can't be modified in PUT request
     *
     * @param string|null $lastModified
     *
     * @return self
     */
    public function setLastModified(?string $lastModified): self
    {
        $this->initialized['lastModified'] = true;
        $this->lastModified = $lastModified;
        return $this;
    }
    /**
     * The state in which the webhook should be created
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }
    /**
     * The state in which the webhook should be created
     *
     * @param string|null $state
     *
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }
    /**
     * The name of the application through which webhook is created
     *
     * @return string|null
     */
    public function getApplicationName(): ?string
    {
        return $this->applicationName;
    }
    /**
     * The name of the application through which webhook is created
     *
     * @param string|null $applicationName
     *
     * @return self
     */
    public function setApplicationName(?string $applicationName): self
    {
        $this->initialized['applicationName'] = true;
        $this->applicationName = $applicationName;
        return $this;
    }
    /**
     * The resource for which you want to create webhook. Need to specify only if scope is 'RESOURCE'. Can't be modified in PUT request. The possible values are AGREEMENT, WIDGET,  MEGASIGN AND LIBRARY_DOCUMENT
     *
     * @return string|null
     */
    public function getResourceType(): ?string
    {
        return $this->resourceType;
    }
    /**
     * The resource for which you want to create webhook. Need to specify only if scope is 'RESOURCE'. Can't be modified in PUT request. The possible values are AGREEMENT, WIDGET,  MEGASIGN AND LIBRARY_DOCUMENT
     *
     * @param string|null $resourceType
     *
     * @return self
     */
    public function setResourceType(?string $resourceType): self
    {
        $this->initialized['resourceType'] = true;
        $this->resourceType = $resourceType;
        return $this;
    }
    /**
     * Status of the webhook. Determines whether the webhook will be actually triggered. Default: ACTIVE, if ACTIVE, this webhook will receive event requests. If INACTIVE, this webhook will not receive event requests. Can't provide status in POST/PUT requests.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Status of the webhook. Determines whether the webhook will be actually triggered. Default: ACTIVE, if ACTIVE, this webhook will receive event requests. If INACTIVE, this webhook will not receive event requests. Can't provide status in POST/PUT requests.
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