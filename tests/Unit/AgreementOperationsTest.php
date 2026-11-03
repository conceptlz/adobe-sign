<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Exception\NotFoundException;
use Conceptlz\AdobeSign\Exception\PreconditionFailedException;
use Conceptlz\AdobeSign\Generated\Model\AgreementDocuments;
use Conceptlz\AdobeSign\Generated\Model\AgreementEventList;
use Conceptlz\AdobeSign\Generated\Model\AgreementViews;
use Conceptlz\AdobeSign\Generated\Model\RemindersResponse;
use Conceptlz\AdobeSign\Tests\TestCase;
use Nyholm\Psr7\Response;

final class AgreementOperationsTest extends TestCase
{
    // --- state / update ---------------------------------------------------

    public function test_cancel_after_get_sends_the_agreements_etag(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement', ['ETag' => '"agr-v5"']);
        $this->queue(200);

        $sign = $this->client();
        $sign->agreements()->get('agr-1');
        $sign->agreements()->cancel('agr-1', 'Sent to the wrong person');

        $put = $this->request(2);
        self::assertSame('PUT', $put->getMethod());
        self::assertSame(self::API . '/agreements/agr-1/state', (string) $put->getUri());
        self::assertSame('"agr-v5"', $put->getHeaderLine('If-Match'), 'state change uses the parent agreement ETag');
        self::assertSame([
            'state' => 'CANCELLED',
            'agreementCancellationInfo' => ['notifyOthers' => true, 'comment' => 'Sent to the wrong person'],
        ], self::jsonBody($put));
    }

    public function test_cancel_without_comment_still_sends_required_notify_flag(): void
    {
        $this->queueBaseUris();
        $this->queue(200);

        $this->client()->agreements()->cancel('agr-1', notifyOthers: false);

        self::assertSame(
            ['state' => 'CANCELLED', 'agreementCancellationInfo' => ['notifyOthers' => false]],
            self::jsonBody($this->request(1)),
        );
    }

    public function test_update_sends_payload_query_and_if_match(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement', ['ETag' => '"agr-v5"']);
        $this->queue(200);

        $sign = $this->client();
        $info = $sign->agreements()->get('agr-1')->details();
        $info->setMessage('Updated message');
        $sign->agreements()->update('agr-1', $info, documentUpdateOnly: false);

        $put = $this->request(2);
        self::assertSame(self::API . '/agreements/agr-1?documentUpdateOnly=false', (string) $put->getUri());
        self::assertSame('"agr-v5"', $put->getHeaderLine('If-Match'));
        self::assertSame('Updated message', self::jsonBody($put)['message']);
        self::assertSame('Mutual NDA', self::jsonBody($put)['name'], 'full model is sent back');
    }

    public function test_stale_etag_surfaces_as_precondition_failed(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement', ['ETag' => '"old"']);
        $this->queue(412, 'error_resource_modified');

        $sign = $this->client();
        $sign->agreements()->get('agr-1');

        $this->expectException(PreconditionFailedException::class);
        $sign->agreements()->updateState('agr-1', 'IN_PROCESS');
    }

    // --- signing ----------------------------------------------------------

    public function test_signing_urls(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'signing_urls');

        $response = $this->client()->agreements()->signingUrls('agr-1', expiry: 3600, frameParent: 'app.example.com');

        self::assertSame(self::API . '/agreements/agr-1/signingUrls?expiry=3600&frameParent=app.example.com', (string) $this->request(1)->getUri());
        self::assertSame('Signer 1', $response->getSigningUrlSetInfos()[0]->getSigningUrlSetName());
    }

    public function test_signing_url_for_one_signer(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'signing_urls');
        $this->queue(200, 'signing_urls');

        $sign = $this->client();

        self::assertSame('https://secure.na4.adobesign.com/public/apiesign?pid=abc', $sign->agreements()->signingUrlFor('agr-1', 'jane@example.com'), 'email match is case-insensitive');
        self::assertNull($sign->agreements()->signingUrlFor('agr-1', 'nobody@example.com'));
    }

    public function test_signing_url_expiry_is_validated_before_any_request(): void
    {
        try {
            $this->client()->agreements()->signingUrls('agr-1', expiry: 10);
            self::fail('Expected InvalidArgumentException');
        } catch (InvalidArgumentException) {
        }

        self::assertSame([], $this->requests());
    }

    public function test_not_yet_signable_is_not_found(): void
    {
        $this->queueBaseUris();
        $this->queue(404, '{"code":"AGREEMENT_NOT_SIGNABLE","message":"The agreement is not currently waiting for anyone to sign it."}');

        try {
            $this->client()->agreements()->signingUrls('agr-1');
            self::fail('Expected NotFoundException');
        } catch (NotFoundException $e) {
            self::assertSame('AGREEMENT_NOT_SIGNABLE', $e->errorCode);
        }
    }

    public function test_views(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement_views');

        $views = $this->client()->agreements()->views('agr-1', 'SIGNING');

        self::assertInstanceOf(AgreementViews::class, $views);
        self::assertSame('SIGNING', $views->getAgreementViewList()[0]->getName());
        self::assertSame(['name' => 'SIGNING'], self::jsonBody($this->request(1)));
        self::assertSame(self::API . '/agreements/agr-1/views', (string) $this->request(1)->getUri());
    }

    // --- copy -------------------------------------------------------------

    public function test_copy_accepts_object_or_bare_string_response(): void
    {
        $this->queueBaseUris();
        $this->queue(200, '{"id":"agr-copy-1"}');
        $this->queue(200, '"agr-copy-2"');

        $sign = $this->client();

        self::assertSame('agr-copy-1', $sign->agreements()->copy('agr-1'));
        self::assertSame('agr-copy-2', $sign->agreements()->copy('agr-1'));
        self::assertSame('POST', $this->request(1)->getMethod());
        self::assertSame(self::API . '/agreements/agr-1/copy', (string) $this->request(1)->getUri());
    }

    // --- reads ------------------------------------------------------------

    public function test_documents_and_single_document(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement_documents');
        $this->http->addResponse(new Response(200, ['Content-Type' => 'application/pdf'], '%PDF-doc-1'));

        $sign = $this->client();
        $docs = $sign->agreements()->documents('agr-1', versionId: 'v2');
        $file = $sign->agreements()->document('agr-1', 'doc/1');

        self::assertInstanceOf(AgreementDocuments::class, $docs);
        self::assertSame(3, $docs->getDocuments()[0]->getNumPages());
        self::assertSame(self::API . '/agreements/agr-1/documents?versionId=v2', (string) $this->request(1)->getUri());
        self::assertSame('%PDF-doc-1', (string) $file);
        self::assertSame(self::API . '/agreements/agr-1/documents/doc%2F1', (string) $this->request(2)->getUri());
    }

    public function test_combined_document_url(): void
    {
        $this->queueBaseUris();
        $this->queue(200, '{"url":"https://secure.na4.adobesign.com/document/cp/abc/combined.pdf"}');

        $url = $this->client()->agreements()->combinedDocumentUrl('agr-1', attachAuditReport: true);

        self::assertSame('https://secure.na4.adobesign.com/document/cp/abc/combined.pdf', $url->getUrl());
        self::assertSame(self::API . '/agreements/agr-1/combinedDocument/url?attachAuditReport=true', (string) $this->request(1)->getUri());
    }

    public function test_form_data_csv(): void
    {
        $this->queueBaseUris();
        $this->http->addResponse(new Response(200, ['Content-Type' => 'text/csv'], "\"email\",\"company\"\n\"jane@example.com\",\"Acme\"\n"));

        $csv = $this->client()->agreements()->formData('agr-1', allowInProcessAgreement: true);

        self::assertStringContainsString('Acme', (string) $csv);
        self::assertSame(self::API . '/agreements/agr-1/formData?allowInProcessAgreement=true', (string) $this->request(1)->getUri());
        self::assertStringContainsString('text/csv', $this->request(1)->getHeaderLine('Accept'));
    }

    public function test_events_form_fields_reminders(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement_events');
        $this->queue(200, 'agreement_form_fields');
        $this->queue(200, 'agreement_reminders');

        $sign = $this->client();
        $events = $sign->agreements()->events('agr-1');
        $fields = $sign->agreements()->formFields('agr-1');
        $reminders = $sign->agreements()->reminders('agr-1', 'ACTIVE');

        self::assertInstanceOf(AgreementEventList::class, $events);
        self::assertSame(['CREATED', 'ACTION_COMPLETED'], array_map(static fn ($e) => $e->getType(), $events->getEvents()));
        self::assertSame('company', $fields->getFields()[0]->getName());
        self::assertInstanceOf(RemindersResponse::class, $reminders);
        self::assertSame('DAILY_UNTIL_SIGNED', $reminders->getReminderInfoList()[0]->getFrequency());
        self::assertSame(self::API . '/agreements/agr-1/reminders?status=ACTIVE', (string) $this->request(3)->getUri());
    }
}
