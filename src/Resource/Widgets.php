<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Resource;

use Conceptlz\AdobeSign\Exception\PreconditionFailedException;
use Conceptlz\AdobeSign\Generated\Model\FetchedWidgetInfo;
use Conceptlz\AdobeSign\Generated\Model\UserWidget;
use Conceptlz\AdobeSign\Generated\Model\WidgetAgreement;
use Conceptlz\AdobeSign\Generated\Model\WidgetCreationInfoV6;
use Conceptlz\AdobeSign\Generated\Model\WidgetDocuments;
use Conceptlz\AdobeSign\Generated\Model\WidgetEventList;
use Conceptlz\AdobeSign\Generated\Model\WidgetFormFields;
use Conceptlz\AdobeSign\Generated\Model\WidgetInfo;
use Conceptlz\AdobeSign\Generated\Model\WidgetMembersInfo;
use Psr\Http\Message\StreamInterface;

/**
 * Web forms ("widgets" in the API): a public URL anyone can sign, each signing creates an agreement.
 *
 * Every method that calls the API throws ApiException (or a subclass) on an error response and
 * TransportException on a network failure; see AbstractResource.
 */
final class Widgets extends AbstractResource
{
    /**
     * GET /widgets
     *
     * @return \Generator<int, UserWidget>
     */
    public function all(int $pageSize = 100, ?string $groupId = null, ?bool $showHiddenWidgets = null): \Generator
    {
        return $this->paginate('widgets', [
            'pageSize' => $pageSize,
            'groupId' => $groupId,
            'showHiddenWidgets' => $showHiddenWidgets,
        ], 'userWidgetList', UserWidget::class);
    }

    /**
     * GET /widgets/{widgetId}
     */
    public function get(string $widgetId): FetchedWidgetInfo
    {
        return $this->fetch(FetchedWidgetInfo::class, self::path('widgets', $widgetId));
    }

    /**
     * POST /widgets
     *
     * @param WidgetCreationInfoV6|array<string, mixed> $info required: fileInfos, name, state, widgetParticipantSetInfo
     * @return string the new widget id
     */
    public function create(WidgetCreationInfoV6|array $info): string
    {
        return $this->createResource('widgets', $info);
    }

    /**
     * PUT /widgets/{widgetId}. Adobe expects the full object (fileInfos, name, status,
     * widgetParticipantSetInfo): fetch with get() (which also makes the client send If-Match),
     * change what you need, send it back.
     *
     * @param WidgetInfo|FetchedWidgetInfo|array<string, mixed> $info
     * @throws PreconditionFailedException when the web form changed since it was fetched
     */
    public function update(string $widgetId, WidgetInfo|FetchedWidgetInfo|array $info): void
    {
        $this->put(self::path('widgets', $widgetId), $info);
    }

    /**
     * PUT /widgets/{widgetId}/state
     *
     * @param string $state ACTIVE | INACTIVE | AUTHORING | CANCELLED
     * @param array{message?: string, redirectUrl?: string}|null $inactiveInfo for visitors of a deactivated
     *        form: give exactly one of message or redirectUrl
     * @throws PreconditionFailedException when the web form changed since it was fetched
     */
    public function updateState(string $widgetId, string $state, ?array $inactiveInfo = null): void
    {
        $body = ['state' => $state];
        if ($inactiveInfo !== null) {
            $body['widgetInActiveInfo'] = $inactiveInfo;
        }

        $this->put(self::path('widgets', $widgetId) . '/state', $body);
    }

    /**
     * GET /widgets/{widgetId}/agreements: agreements created by signing this form.
     *
     * @return \Generator<int, WidgetAgreement>
     */
    public function agreements(string $widgetId, int $pageSize = 100, ?bool $showHiddenAgreements = null): \Generator
    {
        return $this->paginate(self::path('widgets', $widgetId) . '/agreements', [
            'pageSize' => $pageSize,
            'showHiddenAgreements' => $showHiddenAgreements,
        ], 'userAgreementList', WidgetAgreement::class);
    }

    /**
     * GET /widgets/{widgetId}/documents
     */
    public function documents(string $widgetId): WidgetDocuments
    {
        return $this->fetch(WidgetDocuments::class, self::path('widgets', $widgetId) . '/documents');
    }

    /**
     * GET /widgets/{widgetId}/members
     */
    public function members(string $widgetId): WidgetMembersInfo
    {
        return $this->fetch(WidgetMembersInfo::class, self::path('widgets', $widgetId) . '/members');
    }

    /**
     * GET /widgets/{widgetId}/formFields
     */
    public function formFields(string $widgetId): WidgetFormFields
    {
        return $this->fetch(WidgetFormFields::class, self::path('widgets', $widgetId) . '/formFields');
    }

    /**
     * GET /widgets/{widgetId}/events
     */
    public function events(string $widgetId): WidgetEventList
    {
        return $this->fetch(WidgetEventList::class, self::path('widgets', $widgetId) . '/events');
    }

    /**
     * GET /widgets/{widgetId}/formData: CSV of the data entered by every signer.
     */
    public function formData(string $widgetId): StreamInterface
    {
        return $this->download(self::path('widgets', $widgetId) . '/formData', accept: 'text/csv, application/json');
    }

    /**
     * GET /widgets/{widgetId}/combinedDocument: all documents merged into one PDF.
     */
    public function combinedDocument(string $widgetId, ?bool $attachAuditReport = null): StreamInterface
    {
        return $this->download(self::path('widgets', $widgetId) . '/combinedDocument', ['attachAuditReport' => $attachAuditReport]);
    }

    /**
     * GET /widgets/{widgetId}/auditTrail: the audit report PDF.
     */
    public function auditTrail(string $widgetId): StreamInterface
    {
        return $this->download(self::path('widgets', $widgetId) . '/auditTrail');
    }
}
