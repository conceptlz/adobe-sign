<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WidgetCreationResponse
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
     * The unique identifier of web form which can be used to retrieve the data entered by the signers.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The unique identifier of web form which can be used to retrieve the data entered by the signers.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * The unique identifier of web form which can be used to retrieve the data entered by the signers.
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