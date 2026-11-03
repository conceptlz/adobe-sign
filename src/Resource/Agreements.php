<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Resource;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Exception\ApiException;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Generated\Model\AgreementCreationInfo;
use Conceptlz\AdobeSign\Generated\Model\AgreementDocuments;
use Conceptlz\AdobeSign\Generated\Model\AgreementEventList;
use Conceptlz\AdobeSign\Generated\Model\AgreementFormFieldsResponse;
use Conceptlz\AdobeSign\Generated\Model\AgreementInfo as AgreementUpdateInfo;
use Conceptlz\AdobeSign\Generated\Model\AgreementViews;
use Conceptlz\AdobeSign\Generated\Model\DocumentUrl;
use Conceptlz\AdobeSign\Generated\Model\FetchedAgreementInfo;
use Conceptlz\AdobeSign\Generated\Model\RemindersResponse;
use Conceptlz\AdobeSign\Generated\Model\SigningUrlResponse;
use Conceptlz\AdobeSign\Hydration\ModelMapper;
use Conceptlz\AdobeSign\Model\Agreement;
use Conceptlz\AdobeSign\Model\AgreementSummary;
use Conceptlz\AdobeSign\Model\ReminderCreationResult;
use Conceptlz\AdobeSign\Pagination\CursorPaginator;
use Psr\Http\Message\StreamInterface;

final class Agreements extends AbstractResource
{
    /**
     * POST /agreements
     *
     * @param AgreementInfo|AgreementCreationInfo|array<string, mixed> $info builder, generated model, or raw payload
     * @return string the new agreement id
     */
    public function create(AgreementInfo|AgreementCreationInfo|array $info): string
    {
        $payload = match (true) {
            $info instanceof AgreementInfo => $info->toArray(),
            $info instanceof AgreementCreationInfo => ModelMapper::toArray($info),
            default => $info,
        };
        $data = $this->transport->json('POST', 'agreements', body: $payload);

        if (!isset($data['id'])) {
            throw new ApiException('Agreement creation response has no id.', 200, null);
        }

        return (string) $data['id'];
    }

    /**
     * GET /agreements/{agreementId}
     */
    public function get(string $agreementId): Agreement
    {
        $response = $this->transport->send('GET', 'agreements/' . self::segment($agreementId), headers: ['Accept' => 'application/json']);
        $data = json_decode((string) $response->getBody(), true, 512, JSON_THROW_ON_ERROR);

        return Agreement::fromArray(is_array($data) ? $data : [], $response->getHeaderLine('ETag'));
    }

    /**
     * Current status, e.g. OUT_FOR_SIGNATURE, SIGNED, CANCELLED.
     */
    public function status(string $agreementId): string
    {
        return $this->get($agreementId)->status;
    }

    /**
     * GET /agreements, cursor pages walked lazily.
     *
     * @return \Generator<int, AgreementSummary>
     */
    public function all(int $pageSize = 100, ?string $externalId = null, ?string $groupId = null, ?bool $showHiddenAgreements = null): \Generator
    {
        return CursorPaginator::iterate(
            fn (?string $cursor): array => $this->transport->json('GET', 'agreements', [
                'cursor' => $cursor,
                'pageSize' => $pageSize,
                'externalId' => $externalId,
                'groupId' => $groupId,
                'showHiddenAgreements' => $showHiddenAgreements,
            ]),
            'userAgreementList',
            AgreementSummary::fromArray(...),
        );
    }

    /**
     * GET /agreements/{agreementId}/members
     *
     * @return array<mixed> raw MembersInfo
     */
    public function members(string $agreementId): array
    {
        return $this->transport->json('GET', 'agreements/' . self::segment($agreementId) . '/members');
    }

    /**
     * POST /agreements/{agreementId}/reminders: send a one-off reminder now.
     *
     * @param array<string>|null $participantIds participant (member) ids; null = everyone whose
     *                                          turn it currently is (costs one extra GET /members)
     */
    public function sendReminder(string $agreementId, ?array $participantIds = null, ?string $note = null): ReminderCreationResult
    {
        $participantIds ??= $this->currentParticipantIds($agreementId);
        if ($participantIds === []) {
            throw new InvalidArgumentException("Agreement $agreementId has no participants awaiting action.");
        }

        // AgreementReminderInfo: status must be ACTIVE on POST; no frequency = send once.
        $payload = ['recipientParticipantIds' => array_values($participantIds), 'status' => 'ACTIVE'];
        if ($note !== null) {
            $payload['note'] = $note;
        }

        return ReminderCreationResult::fromArray(
            $this->transport->json('POST', 'agreements/' . self::segment($agreementId) . '/reminders', body: $payload),
        );
    }

    /**
     * GET /agreements/{agreementId}/combinedDocument: all documents merged into one PDF.
     *
     * Returned as a stream so large PDFs can be piped to disk/storage without buffering.
     */
    public function combinedDocument(
        string $agreementId,
        ?bool $attachAuditReport = null,
        ?bool $attachSupportingDocuments = null,
        ?string $versionId = null,
        ?string $participantId = null,
        ?bool $includeMergedFieldData = null,
    ): StreamInterface {
        return $this->transport->send(
            'GET',
            'agreements/' . self::segment($agreementId) . '/combinedDocument',
            [
                'attachAuditReport' => $attachAuditReport,
                'attachSupportingDocuments' => $attachSupportingDocuments,
                'versionId' => $versionId,
                'participantId' => $participantId,
                'includeMergedFieldData' => $includeMergedFieldData,
            ],
            ['Accept' => 'application/pdf, application/json'],
        )->getBody();
    }

    /**
     * GET /agreements/{agreementId}/auditTrail: the audit report PDF.
     */
    public function auditTrail(string $agreementId): StreamInterface
    {
        return $this->transport->send(
            'GET',
            'agreements/' . self::segment($agreementId) . '/auditTrail',
            headers: ['Accept' => 'application/pdf, application/json'],
        )->getBody();
    }

    /**
     * PUT /agreements/{agreementId}. Adobe expects the full AgreementInfo; fetch with get() first
     * (that also makes the client send If-Match), change what you need, send it back.
     *
     *     $info = $sign->agreements()->get($id)->details();
     *     $info->setMessage('...');
     *     $sign->agreements()->update($id, $info);
     *
     * @param AgreementUpdateInfo|FetchedAgreementInfo|array<string, mixed> $info
     */
    public function update(string $agreementId, AgreementUpdateInfo|FetchedAgreementInfo|array $info, ?bool $documentUpdateOnly = null): void
    {
        $this->put(self::path('agreements', $agreementId), $info, ['documentUpdateOnly' => $documentUpdateOnly]);
    }

    /**
     * PUT /agreements/{agreementId}/state
     *
     * @param string $state AUTHORING | CANCELLED | IN_PROCESS | RESTART | IN_REVISION | PAUSED
     * @param array<string, mixed> $extra e.g. ['agreementRestartInfo' => [...]]
     */
    public function updateState(string $agreementId, string $state, array $extra = []): void
    {
        $this->put(self::path('agreements', $agreementId) . '/state', ['state' => $state] + $extra);
    }

    /**
     * Cancel (recall) an agreement that is out for signature.
     */
    public function cancel(string $agreementId, ?string $comment = null, bool $notifyOthers = true): void
    {
        $info = ['notifyOthers' => $notifyOthers]; // required by the spec
        if ($comment !== null) {
            $info['comment'] = $comment;
        }

        $this->updateState($agreementId, 'CANCELLED', ['agreementCancellationInfo' => $info]);
    }

    /**
     * GET /agreements/{agreementId}/signingUrls: e-sign links for whoever's turn it is, for
     * embedded signing. Right after create() Adobe may still be processing documents and
     * answers 404 AGREEMENT_NOT_SIGNABLE (NotFoundException); retry after a few seconds.
     *
     * @param int|null $expiry link lifetime in seconds, 30 to 315360000 (default: account setting)
     * @param string|null $frameParent domain that will host the signing page in an iframe
     */
    public function signingUrls(string $agreementId, ?int $expiry = null, ?string $frameParent = null): SigningUrlResponse
    {
        if ($expiry !== null && ($expiry < 30 || $expiry > 315_360_000)) {
            throw new InvalidArgumentException('Signing URL expiry must be between 30 and 315360000 seconds.');
        }

        return $this->fetch(SigningUrlResponse::class, self::path('agreements', $agreementId) . '/signingUrls', [
            'expiry' => $expiry,
            'frameParent' => $frameParent,
        ]);
    }

    /**
     * The e-sign link for one signer, or null if it isn't their turn.
     */
    public function signingUrlFor(string $agreementId, string $email, ?int $expiry = null): ?string
    {
        foreach ($this->signingUrls($agreementId, $expiry)->getSigningUrlSetInfos() ?? [] as $set) {
            foreach ($set->getSigningUrls() ?? [] as $url) {
                if (strcasecmp((string) $url->getEmail(), $email) === 0) {
                    return $url->getEsignUrl();
                }
            }
        }

        return null;
    }

    /**
     * POST /agreements/{agreementId}/views: URLs for Adobe's own pages (e.g. the authoring or
     * signing page), to redirect to or embed.
     *
     * @param string $name COMPOSE | MODIFY | PREFILL | AUTHORING | SEND_PROGRESS | POST_CREATE | DOCUMENT | MANAGE | SIGNING | ALL
     * @param array<string, mixed> $configuration extra AgreementViewInfo fields, e.g. commonViewConfiguration
     */
    public function views(string $agreementId, string $name = 'ALL', array $configuration = []): AgreementViews
    {
        return $this->postFor(AgreementViews::class, self::path('agreements', $agreementId) . '/views', ['name' => $name] + $configuration);
    }

    /**
     * POST /agreements/{agreementId}/copy: a new DRAFT with the same documents and participants.
     *
     * @return string the new agreement id
     */
    public function copy(string $agreementId): string
    {
        $data = $this->transport->json('POST', self::path('agreements', $agreementId) . '/copy', body: []);
        $id = $data['id'] ?? $data['value'] ?? null; // spec types the body loosely; accept {"id"} or a bare string

        if (!is_string($id) || $id === '') {
            throw new ApiException('Agreement copy response has no id.', 200, null);
        }

        return $id;
    }

    /**
     * GET /agreements/{agreementId}/documents
     */
    public function documents(string $agreementId, ?string $versionId = null, ?string $participantId = null): AgreementDocuments
    {
        return $this->fetch(AgreementDocuments::class, self::path('agreements', $agreementId) . '/documents', [
            'versionId' => $versionId,
            'participantId' => $participantId,
        ]);
    }

    /**
     * GET /agreements/{agreementId}/documents/{documentId}: one document's file.
     */
    public function document(string $agreementId, string $documentId): StreamInterface
    {
        return $this->download(self::path('agreements', $agreementId, 'documents', $documentId), accept: '*/*');
    }

    /**
     * GET /agreements/{agreementId}/combinedDocument/url: a short-lived download link instead of the bytes.
     */
    public function combinedDocumentUrl(string $agreementId, ?bool $attachAuditReport = null, ?bool $attachSupportingDocuments = null): DocumentUrl
    {
        return $this->fetch(DocumentUrl::class, self::path('agreements', $agreementId) . '/combinedDocument/url', [
            'attachAuditReport' => $attachAuditReport,
            'attachSupportingDocuments' => $attachSupportingDocuments,
        ]);
    }

    /**
     * GET /agreements/{agreementId}/formData: CSV of the values signers entered. Creator only.
     */
    public function formData(string $agreementId, ?string $participantId = null, ?bool $allowInProcessAgreement = null): StreamInterface
    {
        return $this->download(self::path('agreements', $agreementId) . '/formData', [
            'participantId' => $participantId,
            'allowInProcessAgreement' => $allowInProcessAgreement,
        ], 'text/csv, application/json');
    }

    /**
     * GET /agreements/{agreementId}/formFields
     */
    public function formFields(string $agreementId): AgreementFormFieldsResponse
    {
        return $this->fetch(AgreementFormFieldsResponse::class, self::path('agreements', $agreementId) . '/formFields');
    }

    /**
     * GET /agreements/{agreementId}/events: the audit history (created, viewed, signed, ...).
     */
    public function events(string $agreementId): AgreementEventList
    {
        return $this->fetch(AgreementEventList::class, self::path('agreements', $agreementId) . '/events');
    }

    /**
     * GET /agreements/{agreementId}/reminders
     *
     * @param string|null $status ACTIVE | CANCELED | COMPLETE
     */
    public function reminders(string $agreementId, ?string $status = null): RemindersResponse
    {
        return $this->fetch(RemindersResponse::class, self::path('agreements', $agreementId) . '/reminders', ['status' => $status]);
    }

    /** @return list<string> */
    private function currentParticipantIds(string $agreementId): array
    {
        $ids = [];
        foreach ($this->members($agreementId)['nextParticipantSets'] ?? [] as $set) {
            foreach ($set['memberInfos'] ?? [] as $member) {
                if (isset($member['id'])) {
                    $ids[] = (string) $member['id'];
                }
            }
        }

        return $ids;
    }
}
