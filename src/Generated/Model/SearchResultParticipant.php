<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class SearchResultParticipant
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
     * ['ORIGINATOR' or 'CC' or 'SENDER' or 'SIGNER' or 'APPROVER' or 'FORM_FILLER' or 'ACCEPTOR' or 'CERTIFIED_RECIPIENT' or 'DELEGATE_TO_SIGNER' or 'DELEGATE_TO_APPROVER' or 'DELEGATE_TO_FORM_FILLER' or 'DELEGATE_TO_ACCEPTOR' or 'DELEGATE_TO_CERTIFIED_RECIPIENT' or 'NOTARY_SIGNER' or 'ELECTRONIC_SEALER' or 'HOST' or 'IN_PERSON_SIGNER' or 'SHARE' or 'OTHER']: all roles the participant has on the agreement asset.
     *
     * @var list<string>|null
     */
    protected $role;
    /**
     * The full name of the participant, if available.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * The name of the company of the participant, if available.
     *
     * @var string|null
     */
    protected $company;
    /**
     * The names of the participant sets. Returned only if the participant belongs to any participant sets.
     *
     * @var list<string>|null
     */
    protected $participantSetNames;
    /**
     * The email of the user.
     *
     * @var string|null
     */
    protected $email;
    /**
     * ['ORIGINATOR' or 'CC' or 'SENDER' or 'SIGNER' or 'APPROVER' or 'FORM_FILLER' or 'ACCEPTOR' or 'CERTIFIED_RECIPIENT' or 'DELEGATE_TO_SIGNER' or 'DELEGATE_TO_APPROVER' or 'DELEGATE_TO_FORM_FILLER' or 'DELEGATE_TO_ACCEPTOR' or 'DELEGATE_TO_CERTIFIED_RECIPIENT' or 'NOTARY_SIGNER' or 'ELECTRONIC_SEALER' or 'HOST' or 'IN_PERSON_SIGNER' or 'SHARE' or 'OTHER']: all roles the participant has on the agreement asset.
     *
     * @return list<string>|null
     */
    public function getRole(): ?array
    {
        return $this->role;
    }
    /**
     * ['ORIGINATOR' or 'CC' or 'SENDER' or 'SIGNER' or 'APPROVER' or 'FORM_FILLER' or 'ACCEPTOR' or 'CERTIFIED_RECIPIENT' or 'DELEGATE_TO_SIGNER' or 'DELEGATE_TO_APPROVER' or 'DELEGATE_TO_FORM_FILLER' or 'DELEGATE_TO_ACCEPTOR' or 'DELEGATE_TO_CERTIFIED_RECIPIENT' or 'NOTARY_SIGNER' or 'ELECTRONIC_SEALER' or 'HOST' or 'IN_PERSON_SIGNER' or 'SHARE' or 'OTHER']: all roles the participant has on the agreement asset.
     *
     * @param list<string>|null $role
     *
     * @return self
     */
    public function setRole(?array $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;
        return $this;
    }
    /**
     * The full name of the participant, if available.
     *
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }
    /**
     * The full name of the participant, if available.
     *
     * @param string|null $fullName
     *
     * @return self
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;
        return $this;
    }
    /**
     * The name of the company of the participant, if available.
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }
    /**
     * The name of the company of the participant, if available.
     *
     * @param string|null $company
     *
     * @return self
     */
    public function setCompany(?string $company): self
    {
        $this->initialized['company'] = true;
        $this->company = $company;
        return $this;
    }
    /**
     * The names of the participant sets. Returned only if the participant belongs to any participant sets.
     *
     * @return list<string>|null
     */
    public function getParticipantSetNames(): ?array
    {
        return $this->participantSetNames;
    }
    /**
     * The names of the participant sets. Returned only if the participant belongs to any participant sets.
     *
     * @param list<string>|null $participantSetNames
     *
     * @return self
     */
    public function setParticipantSetNames(?array $participantSetNames): self
    {
        $this->initialized['participantSetNames'] = true;
        $this->participantSetNames = $participantSetNames;
        return $this;
    }
    /**
     * The email of the user.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * The email of the user.
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
}