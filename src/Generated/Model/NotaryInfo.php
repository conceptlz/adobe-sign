<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class NotaryInfo
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
     * Notes for the notary session.
     *
     * @var string|null
     */
    protected $note;
    /**
     * Email address of provided notary when the notaryType is BYON_NOTARY
     *
     * @var string|null
     */
    protected $notaryEmail;
    /**
     * PROVIDER_NOTARY: Notary is provided by the notary provider
     * BYON_NOTARY: In house Notary is provided by the customer
     *
     * @var string|null
     */
    protected $notaryType;
    /**
     * A proposed appointment time specified using the yyyy-MM-dd'T'HH:mm:ssZ format.
     *
     * @var string|null
     */
    protected $appointment;
    /**
     * BY_SENDER: When the notarization provider provides the notary and the notary fee will be paid by the sender
     * BY_SIGNER: When the notarization provider provides the notary and the notary fee will be paid by the signer
     *
     * @var string|null
     */
    protected $payment;
    /**
     * Notes for the notary session.
     *
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }
    /**
     * Notes for the notary session.
     *
     * @param string|null $note
     *
     * @return self
     */
    public function setNote(?string $note): self
    {
        $this->initialized['note'] = true;
        $this->note = $note;
        return $this;
    }
    /**
     * Email address of provided notary when the notaryType is BYON_NOTARY
     *
     * @return string|null
     */
    public function getNotaryEmail(): ?string
    {
        return $this->notaryEmail;
    }
    /**
     * Email address of provided notary when the notaryType is BYON_NOTARY
     *
     * @param string|null $notaryEmail
     *
     * @return self
     */
    public function setNotaryEmail(?string $notaryEmail): self
    {
        $this->initialized['notaryEmail'] = true;
        $this->notaryEmail = $notaryEmail;
        return $this;
    }
    /**
     * PROVIDER_NOTARY: Notary is provided by the notary provider
     * BYON_NOTARY: In house Notary is provided by the customer
     *
     * @return string|null
     */
    public function getNotaryType(): ?string
    {
        return $this->notaryType;
    }
    /**
    * PROVIDER_NOTARY: Notary is provided by the notary provider
    BYON_NOTARY: In house Notary is provided by the customer
    *
    * @param string|null $notaryType
    *
    * @return self
    */
    public function setNotaryType(?string $notaryType): self
    {
        $this->initialized['notaryType'] = true;
        $this->notaryType = $notaryType;
        return $this;
    }
    /**
     * A proposed appointment time specified using the yyyy-MM-dd'T'HH:mm:ssZ format.
     *
     * @return string|null
     */
    public function getAppointment(): ?string
    {
        return $this->appointment;
    }
    /**
     * A proposed appointment time specified using the yyyy-MM-dd'T'HH:mm:ssZ format.
     *
     * @param string|null $appointment
     *
     * @return self
     */
    public function setAppointment(?string $appointment): self
    {
        $this->initialized['appointment'] = true;
        $this->appointment = $appointment;
        return $this;
    }
    /**
     * BY_SENDER: When the notarization provider provides the notary and the notary fee will be paid by the sender
     * BY_SIGNER: When the notarization provider provides the notary and the notary fee will be paid by the signer
     *
     * @return string|null
     */
    public function getPayment(): ?string
    {
        return $this->payment;
    }
    /**
    * BY_SENDER: When the notarization provider provides the notary and the notary fee will be paid by the sender
    BY_SIGNER: When the notarization provider provides the notary and the notary fee will be paid by the signer
    *
    * @param string|null $payment
    *
    * @return self
    */
    public function setPayment(?string $payment): self
    {
        $this->initialized['payment'] = true;
        $this->payment = $payment;
        return $this;
    }
}