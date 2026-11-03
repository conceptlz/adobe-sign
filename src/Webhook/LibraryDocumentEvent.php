<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Webhook;

/**
 * LIBRARY_DOCUMENT_* notification. resource() is the payload's "libraryDocument" object.
 */
final class LibraryDocumentEvent extends WebhookEvent
{
    protected const RESOURCE_KEY = 'libraryDocument';

    public function libraryDocumentId(): ?string
    {
        return $this->resourceId();
    }
}
