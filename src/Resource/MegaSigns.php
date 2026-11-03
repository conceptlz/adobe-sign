<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Resource;

use Conceptlz\AdobeSign\Generated\Model\FetchedMegaSignInfo;
use Conceptlz\AdobeSign\Generated\Model\MegaSign;
use Conceptlz\AdobeSign\Generated\Model\MegaSignChildAgreement;
use Conceptlz\AdobeSign\Generated\Model\MegasignEventList;
use Conceptlz\AdobeSign\Generated\Model\MegaSignInfo;
use Conceptlz\AdobeSign\Generated\Model\MegaSignMembersInfo;
use Conceptlz\AdobeSign\Generated\Model\ReminderCreationResult;
use Psr\Http\Message\StreamInterface;

/**
 * Send in Bulk ("megaSign" in the API): one document sent as a separate agreement to each recipient.
 */
final class MegaSigns extends AbstractResource
{
    /**
     * GET /megaSigns
     *
     * @return \Generator<int, MegaSign>
     */
    public function all(int $pageSize = 100, ?string $groupId = null, ?bool $showHiddenMegaSigns = null): \Generator
    {
        return $this->paginate('megaSigns', [
            'pageSize' => $pageSize,
            'groupId' => $groupId,
            'showHiddenMegaSigns' => $showHiddenMegaSigns,
        ], 'megaSignList', MegaSign::class);
    }

    /**
     * GET /megaSigns/{megaSignId}
     */
    public function get(string $megaSignId): FetchedMegaSignInfo
    {
        return $this->fetch(FetchedMegaSignInfo::class, self::path('megaSigns', $megaSignId));
    }

    /**
     * POST /megaSigns
     *
     * @param MegaSignInfo|array<string, mixed> $info required: childAgreementsInfo, fileInfos, name, signatureType, state
     * @return string the new megaSign id
     */
    public function create(MegaSignInfo|array $info): string
    {
        return $this->createResource('megaSigns', $info);
    }

    /**
     * PUT /megaSigns/{megaSignId}/state. Cancelling cancels every child agreement still in flight.
     *
     * @param string $state IN_PROCESS | CANCELLED
     * @param array<string, mixed>|null $cancellationInfo e.g. ['comment' => '...', 'notifyOthers' => true]
     */
    public function updateState(string $megaSignId, string $state, ?array $cancellationInfo = null): void
    {
        $body = ['state' => $state];
        if ($cancellationInfo !== null) {
            $body['megaSignCancellationInfo'] = $cancellationInfo;
        }

        $this->put(self::path('megaSigns', $megaSignId) . '/state', $body);
    }

    public function cancel(string $megaSignId, ?string $comment = null, bool $notifyOthers = true): void
    {
        $info = ['notifyOthers' => $notifyOthers];
        if ($comment !== null) {
            $info['comment'] = $comment;
        }

        $this->updateState($megaSignId, 'CANCELLED', $info);
    }

    /**
     * GET /megaSigns/{megaSignId}/agreements: the child agreements, one per recipient.
     *
     * @return \Generator<int, MegaSignChildAgreement>
     */
    public function agreements(string $megaSignId, int $pageSize = 100): \Generator
    {
        return $this->paginate(self::path('megaSigns', $megaSignId) . '/agreements', ['pageSize' => $pageSize], 'megaSignChildAgreementList', MegaSignChildAgreement::class);
    }

    /**
     * POST /megaSigns/{megaSignId}/reminders
     *
     * @param array<string> $participantIds empty + $allUnsigned = remind everyone who hasn't signed
     */
    public function sendReminder(string $megaSignId, array $participantIds = [], ?string $note = null, bool $allUnsigned = true): ReminderCreationResult
    {
        $body = ['recipientParticipantIds' => array_values($participantIds), 'status' => 'ACTIVE', 'allUnsigned' => $allUnsigned];
        if ($note !== null) {
            $body['note'] = $note;
        }

        return $this->postFor(ReminderCreationResult::class, self::path('megaSigns', $megaSignId) . '/reminders', $body);
    }

    /**
     * GET /megaSigns/{megaSignId}/members
     */
    public function members(string $megaSignId): MegaSignMembersInfo
    {
        return $this->fetch(MegaSignMembersInfo::class, self::path('megaSigns', $megaSignId) . '/members');
    }

    /**
     * GET /megaSigns/{megaSignId}/events
     */
    public function events(string $megaSignId): MegasignEventList
    {
        return $this->fetch(MegasignEventList::class, self::path('megaSigns', $megaSignId) . '/events');
    }

    /**
     * GET /megaSigns/{megaSignId}/formData: CSV of every child agreement's form data.
     */
    public function formData(string $megaSignId): StreamInterface
    {
        return $this->download(self::path('megaSigns', $megaSignId) . '/formData', accept: 'text/csv, application/json');
    }

    /**
     * GET /megaSigns/{megaSignId}/combinedDocument
     */
    public function combinedDocument(string $megaSignId, ?bool $attachAuditReport = null): StreamInterface
    {
        return $this->download(self::path('megaSigns', $megaSignId) . '/combinedDocument', ['attachAuditReport' => $attachAuditReport]);
    }

    /**
     * GET /megaSigns/{megaSignId}/errorReport: CSV of child agreements that failed to send.
     */
    public function errorReport(string $megaSignId): StreamInterface
    {
        return $this->download(self::path('megaSigns', $megaSignId) . '/errorReport', accept: 'text/csv, application/json');
    }
}
