<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class CopyAgreementInfo
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
}