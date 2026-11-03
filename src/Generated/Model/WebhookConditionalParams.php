<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class WebhookConditionalParams
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
     * @var WebhookWidgetEvents|null
     */
    protected $webhookWidgetEvents;
    /**
     * @var WebhookMegaSignEvents|null
     */
    protected $webhookMegaSignEvents;
    /**
     * @var WebhookLibraryDocumentEvents|null
     */
    protected $webhookLibraryDocumentEvents;
    /**
     * @var WebhookAgreementEvents|null
     */
    protected $webhookAgreementEvents;
    /**
     * @return WebhookWidgetEvents|null
     */
    public function getWebhookWidgetEvents(): ?WebhookWidgetEvents
    {
        return $this->webhookWidgetEvents;
    }
    /**
     * @param WebhookWidgetEvents|null $webhookWidgetEvents
     *
     * @return self
     */
    public function setWebhookWidgetEvents(?WebhookWidgetEvents $webhookWidgetEvents): self
    {
        $this->initialized['webhookWidgetEvents'] = true;
        $this->webhookWidgetEvents = $webhookWidgetEvents;
        return $this;
    }
    /**
     * @return WebhookMegaSignEvents|null
     */
    public function getWebhookMegaSignEvents(): ?WebhookMegaSignEvents
    {
        return $this->webhookMegaSignEvents;
    }
    /**
     * @param WebhookMegaSignEvents|null $webhookMegaSignEvents
     *
     * @return self
     */
    public function setWebhookMegaSignEvents(?WebhookMegaSignEvents $webhookMegaSignEvents): self
    {
        $this->initialized['webhookMegaSignEvents'] = true;
        $this->webhookMegaSignEvents = $webhookMegaSignEvents;
        return $this;
    }
    /**
     * @return WebhookLibraryDocumentEvents|null
     */
    public function getWebhookLibraryDocumentEvents(): ?WebhookLibraryDocumentEvents
    {
        return $this->webhookLibraryDocumentEvents;
    }
    /**
     * @param WebhookLibraryDocumentEvents|null $webhookLibraryDocumentEvents
     *
     * @return self
     */
    public function setWebhookLibraryDocumentEvents(?WebhookLibraryDocumentEvents $webhookLibraryDocumentEvents): self
    {
        $this->initialized['webhookLibraryDocumentEvents'] = true;
        $this->webhookLibraryDocumentEvents = $webhookLibraryDocumentEvents;
        return $this;
    }
    /**
     * @return WebhookAgreementEvents|null
     */
    public function getWebhookAgreementEvents(): ?WebhookAgreementEvents
    {
        return $this->webhookAgreementEvents;
    }
    /**
     * @param WebhookAgreementEvents|null $webhookAgreementEvents
     *
     * @return self
     */
    public function setWebhookAgreementEvents(?WebhookAgreementEvents $webhookAgreementEvents): self
    {
        $this->initialized['webhookAgreementEvents'] = true;
        $this->webhookAgreementEvents = $webhookAgreementEvents;
        return $this;
    }
}