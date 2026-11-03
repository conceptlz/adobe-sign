<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Resource;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Exception\ApiException;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Exception\NotFoundException;
use Conceptlz\AdobeSign\Exception\PreconditionFailedException;
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
use Conceptlz\AdobeSign\Model\SignatureEvidence;
use Conceptlz\AdobeSign\Model\SignerEvidence;
use Conceptlz\AdobeSign\Pagination\CursorPaginator;
use Psr\Http\Message\StreamInterface;

/**
 * Agreements: send documents for signature, track them, and download the results.
 *
 * Every method that calls the API throws ApiException (or a subclass) on an error response and
 * TransportException on a network failure; see AbstractResource.
 */
final class Agreements extends AbstractResource
{
    /** Event types Adobe records when a participant signs. */
    private const SIGNING_EVENTS = [
        'ACTION_COMPLETED',
        'ACTION_COMPLETED_HOSTED',
        'ACTION_COMPLETED_OFFLINE',
        'DIGSIGNED',
    ];

    /**
     * POST /agreements
     *
     * @param AgreementInfo|AgreementCreationInfo|array<string, mixed> $info builder, generated model, or raw payload
     * @return string the new agreement id
     * @throws InvalidArgumentException when the builder is incomplete (no file or participant set)
     */
    public function create(AgreementInfo|AgreementCreationInfo|array $info): string
    {
        $payload = match (true) {
            $info instanceof AgreementInfo => $info->toArray($this->options->defaultSignatureLevel),
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
     * GET /agreements/{agreementId}. The ETag is kept on the result and, unless
     * ClientOptions::$autoEtag is off, replayed as If-Match by a later update() or updateState().
     */
    public function get(string $agreementId): Agreement
    {
        $response = $this->transport->send('GET', 'agreements/' . self::segment($agreementId), headers: ['Accept' => 'application/json']);
        return Agreement::fromArray($this->transport->decode($response), $response->getHeaderLine('ETag'));
    }

    /**
     * Current status via GET /agreements/{agreementId}, e.g. OUT_FOR_SIGNATURE, SIGNED, CANCELLED.
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
     * GET /agreements/{agreementId}/members: every participant set with its status and order.
     *
     * @param bool $includeNextParticipantSet also return nextParticipantSets (whose turn it is now).
     *                                        Adobe omits that key unless asked, even though the spec
     *                                        lists it, so pass true when you need it.
     * @return array<mixed> raw MembersInfo
     */
    public function members(string $agreementId, bool $includeNextParticipantSet = false): array
    {
        return $this->transport->json(
            'GET',
            'agreements/' . self::segment($agreementId) . '/members',
            $includeNextParticipantSet ? ['includeNextParticipantSet' => true] : [],
        );
    }

    /**
     * POST /agreements/{agreementId}/reminders: send a one-off reminder now.
     *
     * @param array<string>|null $participantIds participant (member) ids; null = everyone whose
     *                                          turn it currently is (costs one extra GET /members)
     * @throws InvalidArgumentException when no participant is left to remind
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
     * @throws PreconditionFailedException when the agreement changed since it was fetched
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
     * @throws PreconditionFailedException when the agreement changed since it was fetched
     */
    public function updateState(string $agreementId, string $state, array $extra = []): void
    {
        $this->put(self::path('agreements', $agreementId) . '/state', ['state' => $state] + $extra);
    }

    /**
     * Cancel (recall) an agreement that is out for signature: PUT /agreements/{agreementId}/state
     * with state CANCELLED.
     *
     * @param string|null $comment shown to participants
     * @throws PreconditionFailedException when the agreement changed since it was fetched
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
     * @throws InvalidArgumentException when $expiry is out of range
     * @throws NotFoundException when nobody can sign yet (AGREEMENT_NOT_SIGNABLE) or the
     *                           agreement is not visible to this user
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
     * The e-sign link for one signer (from signingUrls(), email compared case-insensitively),
     * or null if it isn't their turn.
     *
     * @param int|null $expiry link lifetime in seconds, 30 to 315360000
     * @throws InvalidArgumentException when $expiry is out of range
     * @throws NotFoundException when nobody can sign yet (AGREEMENT_NOT_SIGNABLE)
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
        // CopyAgreementInfo has no fields, but it is an object: send {} (json_encode([]) would give []).
        $response = $this->transport->send(
            'POST',
            self::path('agreements', $agreementId) . '/copy',
            headers: ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            body: $this->transport->streams()->createStream('{}'),
        );
        $data = json_decode((string) $response->getBody(), true);
        $id = is_array($data) ? ($data['id'] ?? null) : $data; // spec types the body loosely; accept {"id"} or a bare string

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

    /**
     * What signature level each signer actually reached, from GET /members and GET /events.
     * Use it after signing to confirm a required SES/AES/QES level; see SignatureEvidence.
     *
     * A signer counts as signed when Adobe recorded their signing action (ACTION_COMPLETED and
     * variants, DIGSIGNED), and as digitally signed when that event carries
     * digitalSignatureInfo. If a signer delegated, the delegate's signature is matched by the
     * original signer's email only when Adobe reports it that way.
     */
    public function signatureEvidence(string $agreementId): SignatureEvidence
    {
        $status = $this->status($agreementId);
        $members = $this->members($agreementId);
        $events = $this->transport->json('GET', self::path('agreements', $agreementId) . '/events')['events'] ?? [];

        // Latest signing event per participant email.
        $signedBy = [];
        foreach ($events as $event) {
            if (!is_array($event)
                || !in_array($event['type'] ?? '', self::SIGNING_EVENTS, true)
                || !in_array($event['participantRole'] ?? 'SIGNER', ['SIGNER', 'DELEGATE_TO_SIGNER'], true)) {
                continue;
            }
            $signedBy[strtolower((string) ($event['participantEmail'] ?? ''))] = $event;
        }

        $signers = [];
        foreach ($members['participantSets'] ?? [] as $set) {
            if (($set['role'] ?? '') !== 'SIGNER') {
                continue;
            }
            foreach ($set['memberInfos'] ?? [] as $member) {
                $email = (string) ($member['email'] ?? '');
                $event = $signedBy[strtolower($email)] ?? null;
                $digital = is_array($event['digitalSignatureInfo'] ?? null) && array_filter($event['digitalSignatureInfo']) !== [];

                $signers[] = new SignerEvidence(
                    email: $email,
                    name: ($event['actingUserName'] ?? '') !== '' ? (string) $event['actingUserName'] : ($member['name'] ?? null),
                    order: (int) ($set['order'] ?? 0),
                    signed: $event !== null,
                    signedAt: $event['date'] ?? null,
                    signatureInputType: $event['signatureInputType'] ?? null,
                    digitalSignatureRequired: (bool) ($set['isDigitalSignatureRequired'] ?? false),
                    digitallySigned: $digital || ($event['type'] ?? '') === 'DIGSIGNED',
                    certificateIssuer: $digital ? ($event['digitalSignatureInfo']['certificateIssuer'] ?? null) : null,
                    signingProvider: $digital ? ($event['digitalSignatureInfo']['cloudProviderName'] ?? null) : null,
                    verification: (string) ($member['securityOption']['authenticationMethod'] ?? 'NONE'),
                );
            }
        }
        usort($signers, static fn (SignerEvidence $a, SignerEvidence $b) => $a->order <=> $b->order);

        return new SignatureEvidence($agreementId, $status, $signers);
    }

    /** @return list<string> */
    private function currentParticipantIds(string $agreementId): array
    {
        $members = $this->members($agreementId, includeNextParticipantSet: true);

        // Prefer nextParticipantSets; fall back to sets whose status says it is their turn
        // (WAITING_FOR_MY_SIGNATURE, _APPROVAL, ...), in case Adobe leaves the key out.
        $sets = $members['nextParticipantSets'] ?? array_filter(
            $members['participantSets'] ?? [],
            static fn (array $set) => str_starts_with((string) ($set['status'] ?? ''), 'WAITING_FOR_MY_'),
        );

        $ids = [];
        foreach ($sets as $set) {
            foreach ($set['memberInfos'] ?? [] as $member) {
                if (isset($member['id'])) {
                    $ids[] = (string) $member['id'];
                }
            }
        }

        return $ids;
    }
}
