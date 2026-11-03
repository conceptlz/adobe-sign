<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Webhook;

/**
 * An event this SDK version doesn't know (Adobe adds events without a version bump). Use $raw.
 */
final class UnknownEvent extends WebhookEvent
{
    protected const RESOURCE_KEY = '';
}
