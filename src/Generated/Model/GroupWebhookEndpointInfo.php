<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class GroupWebhookEndpointInfo
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
     * The id of the webhook endpoint
     *
     * @var string|null
     */
    protected $id;
    /**
     * This is a webhookEndpoint URL pattern that you would like to be mapped to one or more webhook(s) that belong to the same account. See <a href="https://opensource.adobe.com/acrobat-sign/acrobat_sign_events/webhooks-oauth-2.0.html#webhookendpointurl" class="link-oauth"> webhookEndpointUrl details. </a>
     *
     * @var string|null
     */
    protected $webhookEndpointUrl;
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
     * The id of the webhook endpoint
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The id of the webhook endpoint
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
}