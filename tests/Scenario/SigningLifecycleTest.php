<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Scenario;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Builder\FileInfo;
use Conceptlz\AdobeSign\Builder\ParticipantInfo;
use Conceptlz\AdobeSign\Builder\ParticipantSetInfo;
use Conceptlz\AdobeSign\Builder\WebhookInfo;
use Conceptlz\AdobeSign\Enum\AgreementState;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Tests\TestCase;
use Conceptlz\AdobeSign\Webhook\AgreementEvent;
use Conceptlz\AdobeSign\Webhook\EventType;
use Conceptlz\AdobeSign\Webhook\WebhookHandler;
use Nyholm\Psr7\Response;
use Nyholm\Psr7\ServerRequest;

/**
 * The whole job an application needs done, through the public API only:
 * upload a PDF, send it with a signing order, follow signing via webhooks, save the signed PDF.
 *
 * Every request the SDK sends and every canned response here is checked against Adobe's
 * published v6 spec by the contract-checking HTTP client (see TestCase), so this is the
 * strongest verification possible without a live Acrobat Sign account.
 */
final class SigningLifecycleTest extends TestCase
{
    private const CLIENT_ID = 'CBJCHBCAABAAclientid';

    private string $saveDir;

    protected function setUp(): void
    {
        parent::setUp();
        $this->saveDir = sys_get_temp_dir() . '/adobe-sign-scenario-' . bin2hex(random_bytes(4));
        mkdir($this->saveDir);
    }

    protected function tearDown(): void
    {
        array_map('unlink', glob($this->saveDir . '/*') ?: []);
        rmdir($this->saveDir);
        parent::tearDown();
    }

    public function test_upload_send_in_order_follow_webhooks_and_save_signed_pdf(): void
    {
        $pdf = (string) file_get_contents(self::fixturePath('sample.pdf'));
        $sign = $this->client();

        // 1. Upload the PDF -------------------------------------------------------------
        $this->queueBaseUris();
        $this->queue(200, 'transient_document');

        $documentId = $sign->transientDocuments()->upload(self::fixturePath('sample.pdf'), mimeType: 'application/pdf');

        $upload = $this->request(1);
        self::assertSame('POST', $upload->getMethod());
        self::assertStringEndsWith('/transientDocuments', $upload->getUri()->getPath());
        self::assertStringContainsString($pdf, (string) $upload->getBody(), 'the PDF bytes are sent unmodified');

        // 2 + 3. Create with a signing order and send for signing ---------------------------
        // Order 1: Jane signs. Order 2: Legal approves AND the CFO signs, in parallel. Order 3: CEO signs.
        $this->queue(200, 'agreement_created');

        $agreementId = $sign->agreements()->create(
            AgreementInfo::create('Master Services Agreement')
                ->file(FileInfo::transientDocument($documentId))
                ->participantSet(ParticipantSetInfo::signer(ParticipantInfo::email('jane@client.example', 'Jane Client'))->order(1))
                ->participantSet(ParticipantSetInfo::approver('legal@vendor.example')->order(2))
                ->participantSet(ParticipantSetInfo::signer('cfo@vendor.example')->order(2))
                ->participantSet(ParticipantSetInfo::signer('ceo@vendor.example')->order(3))
                ->message('Please review and sign.')
                ->state(AgreementState::IN_PROCESS), // IN_PROCESS = send now (the default)
        );

        $create = self::jsonBody($this->request(2));
        self::assertSame('IN_PROCESS', $create['state'], 'sent for signing on creation');
        self::assertSame([['transientDocumentId' => $documentId]], $create['fileInfos'], 'uses the uploaded PDF');
        self::assertSame(
            [
                ['SIGNER', 1, 'jane@client.example'],
                ['APPROVER', 2, 'legal@vendor.example'],
                ['SIGNER', 2, 'cfo@vendor.example'],
                ['SIGNER', 3, 'ceo@vendor.example'],
            ],
            array_map(static fn (array $set) => [$set['role'], $set['order'], $set['memberInfos'][0]['email']], $create['participantSetsInfo']),
            'signing order: 1, then 2 in parallel, then 3',
        );

        // 4. Subscribe to this agreement's events -----------------------------------------
        $this->queue(200, '{"id":"CBJCHBCAABAAwebhook1"}');

        $webhookId = $sign->webhooks()->create(
            WebhookInfo::forAgreement('Agreement sync', 'https://app.example.com/adobe-sign/webhook', $agreementId)
                ->events(EventType::AGREEMENT_ALL)
                ->agreementPayload(participants: true),
        );

        self::assertSame('CBJCHBCAABAAwebhook1', $webhookId);
        $hook = self::jsonBody($this->request(3));
        self::assertSame(['RESOURCE', 'AGREEMENT', $agreementId], [$hook['scope'], $hook['resourceType'], $hook['resourceId']]);

        // 5. Adobe calls the webhook: verification, then events as people sign ------------
        $handler = new WebhookHandler([self::CLIENT_ID]);

        $verification = $handler->handle(new ServerRequest('GET', '/adobe-sign/webhook', ['X-ADOBESIGN-CLIENTID' => self::CLIENT_ID]), $this->psr17, $this->psr17);
        self::assertTrue($verification->isVerification);
        self::assertSame(self::CLIENT_ID, $verification->response->getHeaderLine('X-AdobeSign-ClientId'), 'registration succeeds only with the echo');

        $received = [];
        foreach (['webhook_agreement_created', 'webhook_agreement_action_completed', 'webhook_agreement_workflow_completed'] as $fixture) {
            $result = $handler->handle(
                new ServerRequest('POST', '/adobe-sign/webhook', ['X-ADOBESIGN-CLIENTID' => self::CLIENT_ID, 'Content-Type' => 'application/json'], (string) file_get_contents(self::fixturePath($fixture . '.json'))),
                $this->psr17,
                $this->psr17,
            );
            self::assertSame(200, $result->response->getStatusCode());
            self::assertSame(self::CLIENT_ID, $result->response->getHeaderLine('X-AdobeSign-ClientId'), 'every delivery is acknowledged');
            self::assertInstanceOf(AgreementEvent::class, $result->event);
            self::assertSame($agreementId, $result->event->agreementId());
            $received[] = $result->event->event;
        }

        self::assertSame(
            [EventType::AGREEMENT_CREATED, EventType::AGREEMENT_ACTION_COMPLETED, EventType::AGREEMENT_WORKFLOW_COMPLETED],
            $received,
        );
        self::assertTrue($result->event->isWorkflowCompleted());

        // 6. On completion: confirm with the API, download, save into the project --------
        $this->queue(200, 'agreement_signed');
        $this->http->addResponse(new Response(200, ['Content-Type' => 'application/pdf'], $pdf));

        self::assertTrue($sign->agreements()->get($agreementId)->isSigned(), "don't trust the payload alone");

        $target = $this->saveDir . '/' . $agreementId . '.pdf';
        $stream = $sign->agreements()->combinedDocument($agreementId, attachAuditReport: true);
        $out = fopen($target, 'wb');
        while (!$stream->eof()) {
            fwrite($out, $stream->read(65536));
        }
        fclose($out);

        self::assertFileExists($target);
        self::assertSame($pdf, file_get_contents($target), 'saved byte-for-byte');
        self::assertStringStartsWith('%PDF-', (string) file_get_contents($target));
        self::assertStringEndsWith('/agreements/' . $agreementId . '/combinedDocument', $this->request(5)->getUri()->getPath());
        self::assertSame('attachAuditReport=true', $this->request(5)->getUri()->getQuery());
    }

    public function test_draft_first_then_send(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement_created');
        $this->queue(200, 'agreement', ['ETag' => '"v1"']);
        $this->queue(200);

        $sign = $this->client();
        $id = $sign->agreements()->create(
            AgreementInfo::create('Draft NDA')->file('tdoc-1')->signers('a@example.com', 'b@example.com')->state(AgreementState::AUTHORING),
        );
        $sign->agreements()->get($id);
        $sign->agreements()->updateState($id, 'IN_PROCESS'); // send it

        self::assertSame('AUTHORING', self::jsonBody($this->request(1))['state']);
        self::assertSame([1, 2], array_column(self::jsonBody($this->request(1))['participantSetsInfo'], 'order'), 'signers() is sequential');
        self::assertSame(['state' => 'IN_PROCESS'], self::jsonBody($this->request(3)));
        self::assertSame('"v1"', $this->request(3)->getHeaderLine('If-Match'));
    }

    /** @return iterable<string, array{list<int>}> */
    public static function invalidOrders(): iterable
    {
        yield 'gap' => [[1, 3]];
        yield 'does not start at 1' => [[2, 3]];
        yield 'gap after parallel' => [[1, 1, 3]];
    }

    /** @param list<int> $orders */
    #[\PHPUnit\Framework\Attributes\DataProvider('invalidOrders')]
    public function test_invalid_signing_orders_are_rejected_before_sending(array $orders): void
    {
        $info = AgreementInfo::create('x')->file('tdoc');
        foreach ($orders as $i => $order) {
            $info->participantSet(ParticipantSetInfo::signer("s$i@example.com")->order($order));
        }

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Signing orders must run 1..n');

        $info->toArray();
    }
}
