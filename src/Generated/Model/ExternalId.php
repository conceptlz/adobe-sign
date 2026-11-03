<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class ExternalId
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
     * An arbitrary value from your system, which can be specified at sending time and then later returned or queried. Note: the externalId value is visible to all participants through the API, so should not be used to contain a sensitive token.
     *
     * @var string|null
     */
    protected $id;
    /**
     * An arbitrary value from your system, which can be specified at sending time and then later returned or queried. Note: the externalId value is visible to all participants through the API, so should not be used to contain a sensitive token.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * An arbitrary value from your system, which can be specified at sending time and then later returned or queried. Note: the externalId value is visible to all participants through the API, so should not be used to contain a sensitive token.
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
}