<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Builder\FileInfo;
use Conceptlz\AdobeSign\Builder\ParticipantSetInfo;
use Conceptlz\AdobeSign\Exception\NotFoundException;
use Conceptlz\AdobeSign\Model\AgreementSummary;
use Conceptlz\AdobeSign\Tests\TestCase;
use Psr\Http\Message\StreamInterface;

final class AgreementsTest extends TestCase
{
    public function test_create_posts_agreement_creation_info(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement_created'); // spec: POST /agreements answers 200, not 201

        $id = $this->client()->agreements()->create(
            AgreementInfo::create('Mutual NDA')
                ->file(FileInfo::transientDocument('tdoc-1'))
                ->participantSet(ParticipantSetInfo::signer('jane@example.com'))
                ->message('Please sign'),
        );

        self::assertSame('CBJCHBCAABAAx1aFQyYF-aGrLsBZtVqaT9gPh6Xw42kK', $id);

        $request = $this->request(1);
        self::assertSame('POST', $request->getMethod());
        self::assertSame(self::API . '/agreements', (string) $request->getUri());
        self::assertSame('application/json', $request->getHeaderLine('Content-Type'));
        self::assertSame([
            'name' => 'Mutual NDA',
            'fileInfos' => [['transientDocumentId' => 'tdoc-1']],
            'participantSetsInfo' => [[
                'role' => 'SIGNER',
                'order' => 1,
                'memberInfos' => [['email' => 'jane@example.com']],
            ]],
            'signatureType' => 'ESIGN',
            'state' => 'IN_PROCESS',
            'message' => 'Please sign',
        ], self::jsonBody($request));
    }

    public function test_create_accepts_raw_payload(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement_created');

        $payload = ['name' => 'Raw', 'fileInfos' => [], 'participantSetsInfo' => [], 'signatureType' => 'ESIGN', 'state' => 'DRAFT'];
        $this->client()->agreements()->create($payload);

        self::assertSame($payload, self::jsonBody($this->request(1)));
    }

    public function test_get_returns_typed_agreement_with_etag(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement', ['ETag' => '"3a7b"']);

        $agreement = $this->client()->agreements()->get('CBJCHBCAABAAx1aFQyYF-aGrLsBZtVqaT9gPh6Xw42kK');

        self::assertSame('Mutual NDA', $agreement->name);
        self::assertSame('OUT_FOR_SIGNATURE', $agreement->status);
        self::assertTrue($agreement->isOutForSignature());
        self::assertSame('ESIGN', $agreement->signatureType);
        self::assertSame('"3a7b"', $agreement->etag);
        self::assertSame('en_US', $agreement->raw['locale']);
    }

    public function test_status_shortcut(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement');

        self::assertSame('OUT_FOR_SIGNATURE', $this->client()->agreements()->status('agr-1'));
    }

    public function test_ids_are_url_encoded(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement');

        $this->client()->agreements()->get('a/b?c');

        self::assertSame(self::API . '/agreements/a%2Fb%3Fc', (string) $this->request(1)->getUri());
    }

    public function test_unknown_agreement_throws_not_found(): void
    {
        $this->queueBaseUris();
        $this->queue(404, 'error_invalid_agreement_id');

        try {
            $this->client()->agreements()->get('missing');
            self::fail('Expected NotFoundException');
        } catch (NotFoundException $e) {
            self::assertSame('INVALID_AGREEMENT_ID', $e->errorCode);
            self::assertStringContainsString('The Agreement ID specified is invalid.', $e->getMessage());
        }
    }

    public function test_send_reminder_to_explicit_participants(): void
    {
        $this->queueBaseUris();
        $this->queue(201, 'reminder_created'); // spec: 201

        $result = $this->client()->agreements()->sendReminder('agr-1', ['mem-1'], 'Gentle nudge');

        self::assertSame('CBJCHBCAABAArem1', $result->id);
        self::assertSame([], $result->disabledRecipients);

        $request = $this->request(1);
        self::assertSame('POST', $request->getMethod());
        self::assertSame(self::API . '/agreements/agr-1/reminders', (string) $request->getUri());
        self::assertSame(
            ['recipientParticipantIds' => ['mem-1'], 'status' => 'ACTIVE', 'note' => 'Gentle nudge'],
            self::jsonBody($request),
        );
    }

    public function test_send_reminder_defaults_to_participants_whose_turn_it_is(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'members');
        $this->queue(201, 'reminder_created');

        $this->client()->agreements()->sendReminder('agr-1');

        self::assertSame(self::API . '/agreements/agr-1/members', (string) $this->request(1)->getUri());
        self::assertSame(
            ['recipientParticipantIds' => ['CBJCHBCAABAAmem1'], 'status' => 'ACTIVE'],
            self::jsonBody($this->request(2)),
        );
    }

    public function test_combined_document_returns_pdf_stream(): void
    {
        $pdf = (string) file_get_contents(self::fixturePath('sample.pdf'));
        $this->queueBaseUris();
        $this->http->addResponse(new \Nyholm\Psr7\Response(200, ['Content-Type' => 'application/pdf'], $pdf));

        $stream = $this->client()->agreements()->combinedDocument('agr-1', attachAuditReport: true);

        self::assertInstanceOf(StreamInterface::class, $stream);
        self::assertSame($pdf, (string) $stream);
        self::assertSame(
            self::API . '/agreements/agr-1/combinedDocument?attachAuditReport=true',
            (string) $this->request(1)->getUri(),
        );
    }

    public function test_audit_trail_returns_pdf_stream(): void
    {
        $this->queueBaseUris();
        $this->http->addResponse(new \Nyholm\Psr7\Response(200, ['Content-Type' => 'application/pdf'], '%PDF-audit'));

        self::assertSame('%PDF-audit', (string) $this->client()->agreements()->auditTrail('agr-1'));
        self::assertSame(self::API . '/agreements/agr-1/auditTrail', (string) $this->request(1)->getUri());
    }

    public function test_all_walks_cursor_pages_lazily(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreements_page_1');
        $this->queue(200, 'agreements_page_2');

        $generator = $this->client()->agreements()->all(pageSize: 2);
        self::assertInstanceOf(\Generator::class, $generator);
        self::assertCount(0, $this->requests(), 'nothing is fetched until iteration starts');

        $first = $generator->current();
        self::assertInstanceOf(AgreementSummary::class, $first);
        self::assertSame('agr-1', $first->id);
        self::assertCount(2, $this->requests(), 'only the first page fetched so far');

        $ids = [$first->id];
        for ($generator->next(); $generator->valid(); $generator->next()) {
            $ids[] = $generator->current()->id;
        }

        self::assertSame(['agr-1', 'agr-2', 'agr-3'], $ids);
        self::assertSame(self::API . '/agreements?pageSize=2', (string) $this->request(1)->getUri());
        self::assertSame(self::API . '/agreements?cursor=cursor-page-2&pageSize=2', (string) $this->request(2)->getUri());
    }
}
