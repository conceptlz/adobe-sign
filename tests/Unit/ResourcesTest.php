<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Builder\WebhookInfo;
use Conceptlz\AdobeSign\Generated\Model\DetailedUserInfo;
use Conceptlz\AdobeSign\Generated\Model\LibraryDocument;
use Conceptlz\AdobeSign\Generated\Model\LibraryDocumentCreationInfoV6;
use Conceptlz\AdobeSign\Generated\Model\MegaSignChildAgreement;
use Conceptlz\AdobeSign\Generated\Model\ReminderCreationResult;
use Conceptlz\AdobeSign\Generated\Model\UserStatusUpdateResponse;
use Conceptlz\AdobeSign\Generated\Model\UserWebhook;
use Conceptlz\AdobeSign\Generated\Model\WebhookInfo as WebhookInfoModel;
use Conceptlz\AdobeSign\Hydration\ModelMapper;
use Conceptlz\AdobeSign\Tests\TestCase;
use Conceptlz\AdobeSign\Webhook\EventType;
use Nyholm\Psr7\Response;

final class ResourcesTest extends TestCase
{
    // --- libraryDocuments -------------------------------------------------

    public function test_library_documents_list_yields_generated_models(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'library_documents_page');

        $docs = iterator_to_array($this->client()->libraryDocuments()->all(pageSize: 50, showHiddenLibraryDocuments: true));

        self::assertSame([LibraryDocument::class], array_map(get_class(...), $docs));
        self::assertSame('NDA template', $docs[0]->getName());
        self::assertSame(['DOCUMENT'], $docs[0]->getTemplateTypes());
        self::assertSame(self::API . '/libraryDocuments?pageSize=50&showHiddenLibraryDocuments=true', (string) $this->request(1)->getUri());
    }

    public function test_library_document_get_then_update_sends_if_match(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'library_document', ['ETag' => '"lib-v3"']);
        $this->queue(204);

        $sign = $this->client();
        $doc = $sign->libraryDocuments()->get('lib-1');
        self::assertInstanceOf(LibraryDocumentCreationInfoV6::class, $doc);
        self::assertSame('ACCOUNT', $doc->getSharingMode());

        $doc->setName('NDA v2');
        $sign->libraryDocuments()->update('lib-1', $doc, documentUpdateOnly: false); // fetched model goes straight back

        $put = $this->request(2);
        self::assertSame('PUT', $put->getMethod());
        self::assertSame(self::API . '/libraryDocuments/lib-1?documentUpdateOnly=false', (string) $put->getUri());
        self::assertSame('"lib-v3"', $put->getHeaderLine('If-Match'));
        self::assertSame('NDA v2', self::jsonBody($put)['name']);
        self::assertSame('ACCOUNT', self::jsonBody($put)['sharingMode'], 'full object is sent back');
    }

    public function test_library_document_create_from_generated_model(): void
    {
        $this->queueBaseUris();
        $this->queue(200, '{"id":"lib-new"}');

        $model = ModelMapper::hydrate(LibraryDocumentCreationInfoV6::class, [
            'name' => 'Template',
            'sharingMode' => 'USER',
            'state' => 'ACTIVE',
            'templateTypes' => ['DOCUMENT'],
            'fileInfos' => [['transientDocumentId' => 'tdoc-1']],
        ]);

        self::assertSame('lib-new', $this->client()->libraryDocuments()->create($model));
        self::assertSame([['transientDocumentId' => 'tdoc-1']], self::jsonBody($this->request(1))['fileInfos']);
    }

    public function test_library_document_state_and_downloads(): void
    {
        $this->queueBaseUris();
        $this->queue(200);
        $this->http->addResponse(new Response(200, ['Content-Type' => 'application/pdf'], '%PDF-lib'));

        $sign = $this->client();
        $sign->libraryDocuments()->updateState('lib-1', 'REMOVED');
        $pdf = $sign->libraryDocuments()->combinedDocument('lib-1', attachAuditReport: true);

        self::assertSame(['state' => 'REMOVED'], self::jsonBody($this->request(1)));
        self::assertSame(self::API . '/libraryDocuments/lib-1/state', (string) $this->request(1)->getUri());
        self::assertSame('%PDF-lib', (string) $pdf);
        self::assertSame(self::API . '/libraryDocuments/lib-1/combinedDocument?attachAuditReport=true', (string) $this->request(2)->getUri());
    }

    // --- users ------------------------------------------------------------

    public function test_users_me(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'user_me');

        $me = $this->client()->users()->me();

        self::assertInstanceOf(DetailedUserInfo::class, $me);
        self::assertTrue($me->getIsAccountAdmin());
        self::assertSame(self::API . '/users/me', (string) $this->request(1)->getUri());
    }

    public function test_users_update_state_returns_result(): void
    {
        $this->queueBaseUris();
        $this->queue(200, '{"code":"OK","state":"INACTIVE","message":"done"}');

        $result = $this->client()->users()->updateState('user-1', 'INACTIVE', 'Left the company');

        self::assertInstanceOf(UserStatusUpdateResponse::class, $result);
        self::assertSame('INACTIVE', $result->getState());
        self::assertSame(['state' => 'INACTIVE', 'comment' => 'Left the company'], self::jsonBody($this->request(1)));
    }

    public function test_user_events_paginate_on_their_own_path(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'user_events');

        $events = iterator_to_array($this->client()->users()->events('user 1'));

        self::assertCount(1, $events);
        self::assertSame(self::API . '/users/user%201/events?pageSize=100', (string) $this->request(1)->getUri());
    }

    // --- widgets ----------------------------------------------------------

    public function test_widget_deactivate_with_message(): void
    {
        $this->queueBaseUris();
        $this->queue(200);

        $this->client()->widgets()->updateState('wid-1', 'INACTIVE', ['message' => 'Closed', 'redirectUrl' => 'https://example.com']);

        self::assertSame(self::API . '/widgets/wid-1/state', (string) $this->request(1)->getUri());
        self::assertSame(
            ['state' => 'INACTIVE', 'widgetInActiveInfo' => ['message' => 'Closed', 'redirectUrl' => 'https://example.com']],
            self::jsonBody($this->request(1)),
        );
    }

    public function test_widget_form_data_is_a_csv_stream(): void
    {
        $this->queueBaseUris();
        $this->http->addResponse(new Response(200, ['Content-Type' => 'text/csv'], "email,name\na@example.com,A\n"));

        $csv = $this->client()->widgets()->formData('wid-1');

        self::assertStringStartsWith('email,name', (string) $csv);
        self::assertStringContainsString('text/csv', $this->request(1)->getHeaderLine('Accept'));
    }

    // --- megaSigns --------------------------------------------------------

    public function test_megasign_children_paginate(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'megasign_children');

        $children = iterator_to_array($this->client()->megaSigns()->agreements('ms-1', pageSize: 2));

        self::assertSame([MegaSignChildAgreement::class, MegaSignChildAgreement::class], array_map(get_class(...), $children));
        self::assertSame(['OUT_FOR_SIGNATURE', 'SIGNED'], array_map(static fn ($c) => $c->getStatus(), $children));
        self::assertCount(2, $this->requests(), 'empty nextCursor ends pagination');
    }

    public function test_megasign_cancel_and_remind(): void
    {
        $this->queueBaseUris();
        $this->queue(200);
        $this->queue(200, '{"id":"rem-1","disabledRecipients":["x@example.com"]}');

        $sign = $this->client();
        $sign->megaSigns()->cancel('ms-1', 'Sent by mistake');
        $result = $sign->megaSigns()->sendReminder('ms-1', note: 'Please sign');

        self::assertSame(
            ['state' => 'CANCELLED', 'megaSignCancellationInfo' => ['notifyOthers' => true, 'comment' => 'Sent by mistake']],
            self::jsonBody($this->request(1)),
        );
        self::assertSame(
            ['recipientParticipantIds' => [], 'status' => 'ACTIVE', 'allUnsigned' => true, 'note' => 'Please sign'],
            self::jsonBody($this->request(2)),
        );
        self::assertInstanceOf(ReminderCreationResult::class, $result);
        self::assertSame(['x@example.com'], $result->getDisabledRecipients());
    }

    // --- webhooks ---------------------------------------------------------

    public function test_webhook_create_from_builder(): void
    {
        $this->queueBaseUris();
        $this->queue(200, '{"id":"wh-new"}');

        $id = $this->client()->webhooks()->create(
            WebhookInfo::forAgreement('Status sync', 'https://app.example.com/adobe/webhook', 'agr-1')
                ->events(EventType::AGREEMENT_WORKFLOW_COMPLETED, EventType::AGREEMENT_RECALLED)
                ->agreementPayload(participants: true),
        );

        self::assertSame('wh-new', $id);
        self::assertSame([
            'name' => 'Status sync',
            'scope' => 'RESOURCE',
            'state' => 'ACTIVE',
            'webhookSubscriptionEvents' => ['AGREEMENT_WORKFLOW_COMPLETED', 'AGREEMENT_RECALLED'],
            'webhookUrlInfo' => ['url' => 'https://app.example.com/adobe/webhook'],
            'resourceType' => 'AGREEMENT',
            'resourceId' => 'agr-1',
            'webhookConditionalParams' => ['webhookAgreementEvents' => [
                'includeDetailedInfo' => false,
                'includeParticipantsInfo' => true,
                'includeDocumentsInfo' => false,
                'includeSignedDocuments' => false,
            ]],
        ], self::jsonBody($this->request(1)));
    }

    public function test_webhook_list_get_delete(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'webhooks_page');
        $this->queue(200, 'webhook', ['ETag' => '"wh-v1"']);
        $this->queue(200);

        $sign = $this->client();
        $list = iterator_to_array($sign->webhooks()->all(scope: 'RESOURCE', resourceType: 'AGREEMENT'));
        $webhook = $sign->webhooks()->get('wh-1');
        $sign->webhooks()->delete('wh-1');

        self::assertSame([UserWebhook::class], array_map(get_class(...), $list));
        self::assertSame(self::API . '/webhooks?pageSize=100&scope=RESOURCE&resourceType=AGREEMENT', (string) $this->request(1)->getUri());
        self::assertInstanceOf(WebhookInfoModel::class, $webhook);
        self::assertTrue($webhook->getWebhookConditionalParams()->getWebhookAgreementEvents()->getIncludeDetailedInfo());
        self::assertSame('DELETE', $this->request(3)->getMethod());
        self::assertSame('"wh-v1"', $this->request(3)->getHeaderLine('If-Match'), 'DELETE /webhooks takes If-Match');
    }

    public function test_as_user_applies_to_new_resources(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'user_me');

        $this->client()->asUser('ops@example.com')->users()->me();

        self::assertSame('email:ops@example.com', $this->request(1)->getHeaderLine('x-api-user'));
    }
}
