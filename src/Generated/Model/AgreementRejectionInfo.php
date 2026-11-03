<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class AgreementRejectionInfo
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
     * Comment describing the reason to reject this agreement.
     *
     * @var string|null
     */
    protected $comment;
    /**
     * Comment describing the reason to reject this agreement.
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }
    /**
     * Comment describing the reason to reject this agreement.
     *
     * @param string|null $comment
     *
     * @return self
     */
    public function setComment(?string $comment): self
    {
        $this->initialized['comment'] = true;
        $this->comment = $comment;
        return $this;
    }
}