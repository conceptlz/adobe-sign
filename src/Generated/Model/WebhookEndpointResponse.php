<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WebhookEndpointResponse
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
     * An Oauth configuration for the webhook endpoint.
     *
     * @var WebhookEndpointOauthConfig|null
     */
    protected $oAuth20;
    /**
     * The id of the webhook endpoint
     *
     * @var string|null
     */
    protected $webhookEndpointId;
    /**
     * Name of the webhookEndpoint resource that you want to create. It’s length cannot be more than 255 characters.
     *
     * @var string|null
     */
    protected $name;
    /**
     * A description for the webhookEndpoint.
     *
     * @var string|null
     */
    protected $description;
    /**
     * This is a webhookEndpoint URL pattern that you would like to be mapped to one or more webhook(s) that belong to the same account. See <a href="https://opensource.adobe.com/acrobat-sign/acrobat_sign_events/webhooks-oauth-2.0.html#webhookendpointurl" class="link-oauth"> webhookEndpointUrl details. </a>
     *
     * @var string|null
     */
    protected $webhookEndpointUrl;
    /**
     * One or more Application IDs (for example Step.1) that needs to be associated. This would be alphanumeric.
     *
     * @var list<string>|null
     */
    protected $applicationIds;
    /**
     * An Oauth configuration for the webhook endpoint.
     *
     * @return WebhookEndpointOauthConfig|null
     */
    public function getOAuth20(): ?WebhookEndpointOauthConfig
    {
        return $this->oAuth20;
    }
    /**
     * An Oauth configuration for the webhook endpoint.
     *
     * @param WebhookEndpointOauthConfig|null $oAuth20
     *
     * @return self
     */
    public function setOAuth20(?WebhookEndpointOauthConfig $oAuth20): self
    {
        $this->initialized['oAuth20'] = true;
        $this->oAuth20 = $oAuth20;
        return $this;
    }
    /**
     * The id of the webhook endpoint
     *
     * @return string|null
     */
    public function getWebhookEndpointId(): ?string
    {
        return $this->webhookEndpointId;
    }
    /**
     * The id of the webhook endpoint
     *
     * @param string|null $webhookEndpointId
     *
     * @return self
     */
    public function setWebhookEndpointId(?string $webhookEndpointId): self
    {
        $this->initialized['webhookEndpointId'] = true;
        $this->webhookEndpointId = $webhookEndpointId;
        return $this;
    }
    /**
     * Name of the webhookEndpoint resource that you want to create. It’s length cannot be more than 255 characters.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Name of the webhookEndpoint resource that you want to create. It’s length cannot be more than 255 characters.
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
     * A description for the webhookEndpoint.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * A description for the webhookEndpoint.
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * This is a webhookEndpoint URL pattern that you would like to be mapped to one or more webhook(s) that belong to the same account. See <a href="https://opensource.adobe.com/acrobat-sign/acrobat_sign_events/webhooks-oauth-2.0.html#webhookendpointurl" class="link-oauth"> webhookEndpointUrl details. </a>
     *
     * @return string|null
     */
    public function getWebhookEndpointUrl(): ?string
    {
        return $this->webhookEndpointUrl;
    }
    /**
     * This is a webhookEndpoint URL pattern that you would like to be mapped to one or more webhook(s) that belong to the same account. See <a href="https://opensource.adobe.com/acrobat-sign/acrobat_sign_events/webhooks-oauth-2.0.html#webhookendpointurl" class="link-oauth"> webhookEndpointUrl details. </a>
     *
     * @param string|null $webhookEndpointUrl
     *
     * @return self
     */
    public function setWebhookEndpointUrl(?string $webhookEndpointUrl): self
    {
        $this->initialized['webhookEndpointUrl'] = true;
        $this->webhookEndpointUrl = $webhookEndpointUrl;
        return $this;
    }
    /**
     * One or more Application IDs (for example Step.1) that needs to be associated. This would be alphanumeric.
     *
     * @return list<string>|null
     */
    public function getApplicationIds(): ?array
    {
        return $this->applicationIds;
    }
    /**
     * One or more Application IDs (for example Step.1) that needs to be associated. This would be alphanumeric.
     *
     * @param list<string>|null $applicationIds
     *
     * @return self
     */
    public function setApplicationIds(?array $applicationIds): self
    {
        $this->initialized['applicationIds'] = true;
        $this->applicationIds = $applicationIds;
        return $this;
    }
}