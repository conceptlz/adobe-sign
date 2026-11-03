<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Webhook;

/**
 * MEGASIGN_* (Send in Bulk) notification. resource() is the payload's "megaSign" object.
 */
final class MegaSignEvent extends WebhookEvent
{
    protected const RESOURCE_KEY = 'megaSign';

    /** The megaSign's id, or null if the payload omits it. */
    public function megaSignId(): ?string
    {
        return $this->resourceId();
    }
}
