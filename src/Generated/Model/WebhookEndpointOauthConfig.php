<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WebhookEndpointOauthConfig
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
     * clientId for the authorization server.
     *
     * @var string|null
     */
    protected $clientId;
    /**
     * URL of the authorization server for getting the access token
     *
     * @var string|null
     */
    protected $authorizationServerUrl;
    /**
     * scope, if any, needed for the authorization server.
     *
     * @var string|null
     */
    protected $scope;
    /**
     * client secret for the authorization server.
     *
     * @var string|null
     */
    protected $clientSecret;
    /**
     * A map of key-value pairs that you want in webhook notification request for increased personalization.
     *
     * @var list<HeaderDto>|null
     */
    protected $customHeaders;
    /**
     * clientId for the authorization server.
     *
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }
    /**
     * clientId for the authorization server.
     *
     * @param string|null $clientId
     *
     * @return self
     */
    public function setClientId(?string $clientId): self
    {
        $this->initialized['clientId'] = true;
        $this->clientId = $clientId;
        return $this;
    }
    /**
     * URL of the authorization server for getting the access token
     *
     * @return string|null
     */
    public function getAuthorizationServerUrl(): ?string
    {
        return $this->authorizationServerUrl;
    }
    /**
     * URL of the authorization server for getting the access token
     *
     * @param string|null $authorizationServerUrl
     *
     * @return self
     */
    public function setAuthorizationServerUrl(?string $authorizationServerUrl): self
    {
        $this->initialized['authorizationServerUrl'] = true;
        $this->authorizationServerUrl = $authorizationServerUrl;
        return $this;
    }
    /**
     * scope, if any, needed for the authorization server.
     *
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }
    /**
     * scope, if any, needed for the authorization server.
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
     * client secret for the authorization server.
     *
     * @return string|null
     */
    public function getClientSecret(): ?string
    {
        return $this->clientSecret;
    }
    /**
     * client secret for the authorization server.
     *
     * @param string|null $clientSecret
     *
     * @return self
     */
    public function setClientSecret(?string $clientSecret): self
    {
        $this->initialized['clientSecret'] = true;
        $this->clientSecret = $clientSecret;
        return $this;
    }
    /**
     * A map of key-value pairs that you want in webhook notification request for increased personalization.
     *
     * @return list<HeaderDto>|null
     */
    public function getCustomHeaders(): ?array
    {
        return $this->customHeaders;
    }
    /**
     * A map of key-value pairs that you want in webhook notification request for increased personalization.
     *
     * @param list<HeaderDto>|null $customHeaders
     *
     * @return self
     */
    public function setCustomHeaders(?array $customHeaders): self
    {
        $this->initialized['customHeaders'] = true;
        $this->customHeaders = $customHeaders;
        return $this;
    }
}