<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Webhook;

/**
 * WIDGET_* (web form) notification. resource() is the payload's "widget" object.
 */
final class WidgetEvent extends WebhookEvent
{
    protected const RESOURCE_KEY = 'widget';

    public function widgetId(): ?string
    {
        return $this->resourceId();
    }
}
