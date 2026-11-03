<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Resource;

use Conceptlz\AdobeSign\Exception\PreconditionFailedException;
use Conceptlz\AdobeSign\Generated\Model\Documents;
use Conceptlz\AdobeSign\Generated\Model\LibraryDocument;
use Conceptlz\AdobeSign\Generated\Model\LibraryDocumentCreationInfoV6;
use Conceptlz\AdobeSign\Generated\Model\LibraryDocumentEventList;
use Conceptlz\AdobeSign\Generated\Model\LibraryDocumentFormFieldsResponse;
use Conceptlz\AdobeSign\Generated\Model\LibraryDocumentInfoV6;
use Conceptlz\AdobeSign\Generated\Model\LibraryDocumentMembersInfo;
use Psr\Http\Message\StreamInterface;

/**
 * Library templates (reusable documents and form field layers).
 *
 * Every method that calls the API throws ApiException (or a subclass) on an error response and
 * TransportException on a network failure; see AbstractResource.
 */
final class LibraryDocuments extends AbstractResource
{
    /**
     * GET /libraryDocuments
     *
     * @return \Generator<int, LibraryDocument>
     */
    public function all(int $pageSize = 100, ?string $groupId = null, ?bool $showHiddenLibraryDocuments = null, ?bool $includeSharees = null): \Generator
    {
        return $this->paginate('libraryDocuments', [
            'pageSize' => $pageSize,
            'groupId' => $groupId,
            'showHiddenLibraryDocuments' => $showHiddenLibraryDocuments,
            'includeSharees' => $includeSharees,
        ], 'libraryDocumentList', LibraryDocument::class);
    }

    /**
     * GET /libraryDocuments/{libraryDocumentId}
     */
    public function get(string $libraryDocumentId): LibraryDocumentCreationInfoV6
    {
        return $this->fetch(LibraryDocumentCreationInfoV6::class, self::path('libraryDocuments', $libraryDocumentId));
    }

    /**
     * POST /libraryDocuments
     *
     * @param LibraryDocumentCreationInfoV6|array<string, mixed> $info required: fileInfos, name, sharingMode, state, templateTypes
     * @return string the new library document id
     */
    public function create(LibraryDocumentCreationInfoV6|array $info): string
    {
        return $this->createResource('libraryDocuments', $info);
    }

    /**
     * PUT /libraryDocuments/{libraryDocumentId}. Adobe expects the full object (fileInfos, name,
     * sharingMode, status, templateTypes): fetch with get() (which also makes the client send
     * If-Match), change what you need, send it back.
     *
     * @param LibraryDocumentInfoV6|LibraryDocumentCreationInfoV6|array<string, mixed> $info
     * @throws PreconditionFailedException when the library document changed since it was fetched
     */
    public function update(string $libraryDocumentId, LibraryDocumentInfoV6|LibraryDocumentCreationInfoV6|array $info, ?bool $documentUpdateOnly = null): void
    {
        $this->put(self::path('libraryDocuments', $libraryDocumentId), $info, ['documentUpdateOnly' => $documentUpdateOnly]);
    }

    /**
     * PUT /libraryDocuments/{libraryDocumentId}/state
     *
     * @param string $state AUTHORING | ACTIVE | REMOVED
     * @throws PreconditionFailedException when the library document changed since it was fetched
     */
    public function updateState(string $libraryDocumentId, string $state): void
    {
        $this->put(self::path('libraryDocuments', $libraryDocumentId) . '/state', ['state' => $state]);
    }

    /**
     * GET /libraryDocuments/{libraryDocumentId}/documents
     */
    public function documents(string $libraryDocumentId, ?string $versionId = null): Documents
    {
        return $this->fetch(Documents::class, self::path('libraryDocuments', $libraryDocumentId) . '/documents', ['versionId' => $versionId]);
    }

    /**
     * GET /libraryDocuments/{libraryDocumentId}/documents/{documentId}: one document's file.
     */
    public function document(string $libraryDocumentId, string $documentId): StreamInterface
    {
        return $this->download(self::path('libraryDocuments', $libraryDocumentId) . '/documents/' . self::segment($documentId), accept: '*/*');
    }

    /**
     * GET /libraryDocuments/{libraryDocumentId}/combinedDocument: all documents merged into one PDF.
     */
    public function combinedDocument(string $libraryDocumentId, ?bool $attachAuditReport = null): StreamInterface
    {
        return $this->download(self::path('libraryDocuments', $libraryDocumentId) . '/combinedDocument', ['attachAuditReport' => $attachAuditReport]);
    }

    /**
     * GET /libraryDocuments/{libraryDocumentId}/auditTrail: the audit report PDF.
     */
    public function auditTrail(string $libraryDocumentId): StreamInterface
    {
        return $this->download(self::path('libraryDocuments', $libraryDocumentId) . '/auditTrail');
    }

    /**
     * GET /libraryDocuments/{libraryDocumentId}/formFields
     */
    public function formFields(string $libraryDocumentId): LibraryDocumentFormFieldsResponse
    {
        return $this->fetch(LibraryDocumentFormFieldsResponse::class, self::path('libraryDocuments', $libraryDocumentId) . '/formFields');
    }

    /**
     * GET /libraryDocuments/{libraryDocumentId}/members
     */
    public function members(string $libraryDocumentId): LibraryDocumentMembersInfo
    {
        return $this->fetch(LibraryDocumentMembersInfo::class, self::path('libraryDocuments', $libraryDocumentId) . '/members');
    }

    /**
     * GET /libraryDocuments/{libraryDocumentId}/events
     */
    public function events(string $libraryDocumentId): LibraryDocumentEventList
    {
        return $this->fetch(LibraryDocumentEventList::class, self::path('libraryDocuments', $libraryDocumentId) . '/events');
    }
}
