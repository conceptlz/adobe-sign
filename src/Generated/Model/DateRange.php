<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class DateRange
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
     * The minimum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @var string|null
     */
    protected $min;
    /**
     * The maximum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @var string|null
     */
    protected $max;
    /**
     * The minimum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @var string|null
     */
    protected $lt;
    /**
     * The maximum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @var string|null
     */
    protected $gt;
    /**
     * The minimum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @return string|null
     */
    public function getMin(): ?string
    {
        return $this->min;
    }
    /**
     * The minimum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @param string|null $min
     *
     * @return self
     */
    public function setMin(?string $min): self
    {
        $this->initialized['min'] = true;
        $this->min = $min;
        return $this;
    }
    /**
     * The maximum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @return string|null
     */
    public function getMax(): ?string
    {
        return $this->max;
    }
    /**
     * The maximum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @param string|null $max
     *
     * @return self
     */
    public function setMax(?string $max): self
    {
        $this->initialized['max'] = true;
        $this->max = $max;
        return $this;
    }
    /**
     * The minimum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @return string|null
     */
    public function getLt(): ?string
    {
        return $this->lt;
    }
    /**
     * The minimum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @param string|null $lt
     *
     * @return self
     */
    public function setLt(?string $lt): self
    {
        $this->initialized['lt'] = true;
        $this->lt = $lt;
        return $this;
    }
    /**
     * The maximum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @return string|null
     */
    public function getGt(): ?string
    {
        return $this->gt;
    }
    /**
     * The maximum allowed date-time that is allowed in the result set. Values for each range field must adhere to the ISO-8601 standard. Range terms can be defined as less-than/greater-than or min/max. If terms are mixed the JSON will be considered malformed.
     *
     * @param string|null $gt
     *
     * @return self
     */
    public function setGt(?string $gt): self
    {
        $this->initialized['gt'] = true;
        $this->gt = $gt;
        return $this;
    }
}