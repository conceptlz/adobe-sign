<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Resource;

use Conceptlz\AdobeSign\Builder\WebhookInfo as WebhookBuilder;
use Conceptlz\AdobeSign\Generated\Model\UserWebhook;
use Conceptlz\AdobeSign\Generated\Model\WebhookInfo;

/**
 * Webhook subscriptions. To receive them, see Webhook\WebhookHandler.
 */
final class Webhooks extends AbstractResource
{
    /**
     * GET /webhooks
     *
     * @param string|null $scope ACCOUNT | GROUP | USER | RESOURCE
     * @param string|null $resourceType AGREEMENT | WIDGET | MEGASIGN | LIBRARY_DOCUMENT
     * @return \Generator<int, UserWebhook>
     */
    public function all(int $pageSize = 100, ?string $scope = null, ?string $resourceType = null, ?bool $showInActiveWebhooks = null): \Generator
    {
        return $this->paginate('webhooks', [
            'pageSize' => $pageSize,
            'scope' => $scope,
            'resourceType' => $resourceType,
            'showInActiveWebhooks' => $showInActiveWebhooks,
        ], 'userWebhookList', UserWebhook::class);
    }

    /**
     * GET /webhooks/{webhookId}. Shows whether Adobe disabled it after 72 hours of failed deliveries.
     */
    public function get(string $webhookId): WebhookInfo
    {
        return $this->fetch(WebhookInfo::class, self::path('webhooks', $webhookId));
    }

    /**
     * POST /webhooks. Adobe first sends a verification GET to the URL; it must echo the
     * X-AdobeSign-ClientId header (WebhookHandler does) or creation fails.
     *
     * @param WebhookBuilder|WebhookInfo|array<string, mixed> $info
     * @return string the new webhook id
     */
    public function create(WebhookBuilder|WebhookInfo|array $info): string
    {
        return $this->createResource('webhooks', $info);
    }

    /**
     * PUT /webhooks/{webhookId}. Call get() first to send If-Match automatically.
     *
     * @param WebhookBuilder|WebhookInfo|array<string, mixed> $info
     */
    public function update(string $webhookId, WebhookBuilder|WebhookInfo|array $info): void
    {
        $this->put(self::path('webhooks', $webhookId), $info);
    }

    /**
     * PUT /webhooks/{webhookId}/state. Re-activating a webhook that Adobe disabled resumes delivery;
     * notifications from while it was disabled are lost.
     *
     * @param string $state ACTIVE | INACTIVE
     */
    public function updateState(string $webhookId, string $state): void
    {
        $this->put(self::path('webhooks', $webhookId) . '/state', ['state' => $state]);
    }

    /**
     * DELETE /webhooks/{webhookId}
     */
    public function delete(string $webhookId): void
    {
        $this->transport->send('DELETE', self::path('webhooks', $webhookId), headers: ['Accept' => 'application/json']);
    }
}
