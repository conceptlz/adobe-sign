<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class BaseUriInfo
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
     * Encrypted user ID derived from the resolved user. Populated only when immutableId is supplied and a matching user is found.
     *
     * @var string|null
     */
    protected $securedUserId;
    /**
     * The access point from where other APIs need to be accessed. In case other APIs are accessed from a different end point, it will be considered an invalid request
     *
     * @var string|null
     */
    protected $apiAccessPoint;
    /**
     * Shard prefix identifier of the resolved user's home shard (e.g. na1, eu1, jp1). Populated only when immutableId is supplied and a matching user is found.
     *
     * @var string|null
     */
    protected $homeShard;
    /**
     * The access point from where Acrobat Sign website can be be accessed
     *
     * @var string|null
     */
    protected $webAccessPoint;
    /**
     * Encrypted user ID derived from the resolved user. Populated only when immutableId is supplied and a matching user is found.
     *
     * @return string|null
     */
    public function getSecuredUserId(): ?string
    {
        return $this->securedUserId;
    }
    /**
     * Encrypted user ID derived from the resolved user. Populated only when immutableId is supplied and a matching user is found.
     *
     * @param string|null $securedUserId
     *
     * @return self
     */
    public function setSecuredUserId(?string $securedUserId): self
    {
        $this->initialized['securedUserId'] = true;
        $this->securedUserId = $securedUserId;
        return $this;
    }
    /**
     * The access point from where other APIs need to be accessed. In case other APIs are accessed from a different end point, it will be considered an invalid request
     *
     * @return string|null
     */
    public function getApiAccessPoint(): ?string
    {
        return $this->apiAccessPoint;
    }
    /**
     * The access point from where other APIs need to be accessed. In case other APIs are accessed from a different end point, it will be considered an invalid request
     *
     * @param string|null $apiAccessPoint
     *
     * @return self
     */
    public function setApiAccessPoint(?string $apiAccessPoint): self
    {
        $this->initialized['apiAccessPoint'] = true;
        $this->apiAccessPoint = $apiAccessPoint;
        return $this;
    }
    /**
     * Shard prefix identifier of the resolved user's home shard (e.g. na1, eu1, jp1). Populated only when immutableId is supplied and a matching user is found.
     *
     * @return string|null
     */
    public function getHomeShard(): ?string
    {
        return $this->homeShard;
    }
    /**
     * Shard prefix identifier of the resolved user's home shard (e.g. na1, eu1, jp1). Populated only when immutableId is supplied and a matching user is found.
     *
     * @param string|null $homeShard
     *
     * @return self
     */
    public function setHomeShard(?string $homeShard): self
    {
        $this->initialized['homeShard'] = true;
        $this->homeShard = $homeShard;
        return $this;
    }
    /**
     * The access point from where Acrobat Sign website can be be accessed
     *
     * @return string|null
     */
    public function getWebAccessPoint(): ?string
    {
        return $this->webAccessPoint;
    }
    /**
     * The access point from where Acrobat Sign website can be be accessed
     *
     * @param string|null $webAccessPoint
     *
     * @return self
     */
    public function setWebAccessPoint(?string $webAccessPoint): self
    {
        $this->initialized['webAccessPoint'] = true;
        $this->webAccessPoint = $webAccessPoint;
        return $this;
    }
}