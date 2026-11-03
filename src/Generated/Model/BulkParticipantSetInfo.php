<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class BulkParticipantSetInfo
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
     * Information about the send participants.
     *
     * @var list<BulkParticipantInfo>|null
     */
    protected $membersInfo;
    /**
     * Role assumed by members in the set. If this is in response for bulk send created with new CSV format, this information is irrelevant.
     *
     * @var string|null
     */
    protected $role;
    /**
     * @var BulkInfo|null
     */
    protected $bulkInfo;
    /**
     * Index indicating position at which signing group needs to sign.Signing group to sign at first place is assigned a 1 index. Different signingOrder specified in input should form a valid consecutive increasing sequence of integers. Otherwise signing order will be considered invalid.
     *
     * @var int|null
     */
    protected $order;
    /**
     * Information about the send participants.
     *
     * @return list<BulkParticipantInfo>|null
     */
    public function getMembersInfo(): ?array
    {
        return $this->membersInfo;
    }
    /**
     * Information about the send participants.
     *
     * @param list<BulkParticipantInfo>|null $membersInfo
     *
     * @return self
     */
    public function setMembersInfo(?array $membersInfo): self
    {
        $this->initialized['membersInfo'] = true;
        $this->membersInfo = $membersInfo;
        return $this;
    }
    /**
     * Role assumed by members in the set. If this is in response for bulk send created with new CSV format, this information is irrelevant.
     *
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }
    /**
     * Role assumed by members in the set. If this is in response for bulk send created with new CSV format, this information is irrelevant.
     *
     * @param string|null $role
     *
     * @return self
     */
    public function setRole(?string $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;
        return $this;
    }
    /**
     * @return BulkInfo|null
     */
    public function getBulkInfo(): ?BulkInfo
    {
        return $this->bulkInfo;
    }
    /**
     * @param BulkInfo|null $bulkInfo
     *
     * @return self
     */
    public function setBulkInfo(?BulkInfo $bulkInfo): self
    {
        $this->initialized['bulkInfo'] = true;
        $this->bulkInfo = $bulkInfo;
        return $this;
    }
    /**
     * Index indicating position at which signing group needs to sign.Signing group to sign at first place is assigned a 1 index. Different signingOrder specified in input should form a valid consecutive increasing sequence of integers. Otherwise signing order will be considered invalid.
     *
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }
    /**
     * Index indicating position at which signing group needs to sign.Signing group to sign at first place is assigned a 1 index. Different signingOrder specified in input should form a valid consecutive increasing sequence of integers. Otherwise signing order will be considered invalid.
     *
     * @param int|null $order
     *
     * @return self
     */
    public function setOrder(?int $order): self
    {
        $this->initialized['order'] = true;
        $this->order = $order;
        return $this;
    }
}