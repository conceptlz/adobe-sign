<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Live;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Builder\FileInfo;
use Conceptlz\AdobeSign\Builder\ParticipantSetInfo;
use Conceptlz\AdobeSign\Enum\AgreementState;

/**
 * Upload, send, remind, download and save, inspect, cancel, and draft-then-send, against the real API.
 * Sends real emails to ADOBE_SIGN_TEST_SIGNERS; agreements are cancelled afterwards.
 */
final class AgreementOperationsTest extends LiveTestCase
{
    public function test_send_download_save_remind_inspect_and_cancel(): void
    {
        [$signer] = self::signers(1);

        $documentId = self::uploadTestPdf();
        self::report("uploaded live-test.pdf -> transient document " . substr($documentId, 0, 16) . '…');

        $id = self::track(self::$sign->agreements()->create(
            AgreementInfo::create('SDK live test: operations')
                ->file(FileInfo::transientDocument($documentId))
                ->participantSet(ParticipantSetInfo::signer($signer))
                ->message('Automated SDK test. You can ignore this email; it will be cancelled.'),
        ));
        self::report("created and sent $id");
        self::assertSame('OUT_FOR_SIGNATURE', self::waitForStatus($id, ['OUT_FOR_SIGNATURE']));

        // Documents: the PDF we uploaded, one page.
        $documents = self::$sign->agreements()->documents($id)->getDocuments() ?? [];
        self::assertCount(1, $documents);
        self::assertSame(1, $documents[0]->getNumPages());

        // Download and save into "the project" (a temp dir here).
        $dir = sys_get_temp_dir() . '/adobe-sign-live';
        @mkdir($dir);
        $target = "$dir/$id.pdf";
        $pdf = self::$sign->agreements()->combinedDocument($id, attachAuditReport: true);
        $out = fopen($target, 'wb');
        while (!$pdf->eof()) {
            fwrite($out, $pdf->read(65536));
        }
        fclose($out);
        self::assertStringStartsWith('%PDF-', (string) file_get_contents($target, length: 5));
        self::report(sprintf('saved combined PDF + audit report: %s (%d bytes)', $target, filesize($target)));

        $audit = (string) self::$sign->agreements()->auditTrail($id);
        self::assertStringStartsWith('%PDF-', $audit);

        // Embedded signing link for the signer.
        $url = self::$sign->agreements()->signingUrlFor($id, $signer);
        self::assertNotNull($url);
        self::assertStringStartsWith('https://', $url);

        // Reminder now.
        $reminder = self::$sign->agreements()->sendReminder($id, note: 'SDK live test reminder.');
        self::assertNotNull($reminder->id);
        self::report("reminder sent: {$reminder->id}");

        // History.
        $types = array_map(static fn ($e) => $e->getType(), self::$sign->agreements()->events($id)->getEvents() ?? []);
        self::assertContains('CREATED', $types);
        self::report('events: ' . implode(', ', array_unique($types)));

        // Cancel after get(): exercises If-Match with a real ETag.
        $agreement = self::$sign->agreements()->get($id);
        self::assertNotNull($agreement->etag, 'Adobe returns an ETag for agreements');
        self::cancel($id, 'SDK live test finished');
        self::assertSame('CANCELLED', self::waitForStatus($id, ['CANCELLED'], 30));
        self::report('cancelled with If-Match: ' . $agreement->etag);
    }

    public function test_draft_then_send(): void
    {
        [$signer] = self::signers(1);

        $id = self::track(self::$sign->agreements()->create(
            AgreementInfo::create('SDK live test: draft then send')
                ->file(FileInfo::transientDocument(self::uploadTestPdf()))
                ->participantSet(ParticipantSetInfo::signer($signer))
                ->state(AgreementState::AUTHORING),
        ));
        self::assertSame('AUTHORING', self::waitForStatus($id, ['AUTHORING']), 'nothing is sent yet');
        self::report("draft $id is AUTHORING");

        self::$sign->agreements()->get($id);
        self::$sign->agreements()->updateState($id, 'IN_PROCESS');

        // A real signer may act within seconds of the email (it happened during development), so SIGNED counts too.
        $status = self::waitForStatus($id, ['OUT_FOR_SIGNATURE', 'SIGNED']);
        self::report("sent: now $status");
    }
}
