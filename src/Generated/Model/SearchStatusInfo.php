<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SearchStatusInfo
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
     * Status code returned for the search response.
     *
     * @var int|null
     */
    protected $code;
    /**
     * Descriptive message corresponding to the status code.
     *
     * @var string|null
     */
    protected $message;
    /**
     * Status code returned for the search response.
     *
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }
    /**
     * Status code returned for the search response.
     *
     * @param int|null $code
     *
     * @return self
     */
    public function setCode(?int $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;
        return $this;
    }
    /**
     * Descriptive message corresponding to the status code.
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * Descriptive message corresponding to the status code.
     *
     * @param string|null $message
     *
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
}