<?php

/**
 * Live end-to-end check against a real Acrobat Sign account (a free developer account works):
 * upload a PDF, send it with a signing order, wait while people sign, save the signed PDF.
 *
 *   ADOBE_SIGN_INTEGRATION_KEY=... php examples/live-lifecycle.php contract.pdf "a@x.com,b@x.com+c@x.com,d@x.com"
 *
 * Signers: commas separate steps, "+" puts people in the same step (they sign in parallel).
 * The example above means: a signs first, then b and c (either order), then d.
 *
 * Options (environment variables):
 *   WEBHOOK_URL=https://...      also register a webhook for the agreement (run webhook-receiver.php there)
 *   WAIT_MINUTES=30              how long to wait for everyone to sign (default 30; 0 = don't wait)
 *   OUTPUT_DIR=.                 where to save the signed PDF
 */

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Conceptlz\AdobeSign\AdobeSign;
use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Builder\FileInfo;
use Conceptlz\AdobeSign\Builder\ParticipantSetInfo;
use Conceptlz\AdobeSign\Builder\WebhookInfo;
use Conceptlz\AdobeSign\Exception\AdobeSignException;
use Conceptlz\AdobeSign\Exception\NotFoundException;
use Conceptlz\AdobeSign\Webhook\EventType;

$key = getenv('ADOBE_SIGN_INTEGRATION_KEY') ?: '';
[$pdf, $signerSpec] = [$argv[1] ?? '', $argv[2] ?? ''];
if ($key === '' || !is_file($pdf) || $signerSpec === '') {
    fwrite(STDERR, "Usage: ADOBE_SIGN_INTEGRATION_KEY=... php {$argv[0]} <file.pdf> \"a@x.com,b@x.com+c@x.com\"\n");
    exit(1);
}

$waitMinutes = (int) (getenv('WAIT_MINUTES') !== false ? getenv('WAIT_MINUTES') : 30);
$outputDir = rtrim(getenv('OUTPUT_DIR') ?: '.', '/');
$step = static fn (string $text) => print("\n== $text\n");

try {
    $sign = AdobeSign::withIntegrationKey($key);

    $step('1. Upload ' . basename($pdf));
    $documentId = $sign->transientDocuments()->upload($pdf, mimeType: 'application/pdf');
    echo "transientDocumentId: $documentId\n";

    $step('2. Create with signing order and send');
    $agreement = AgreementInfo::create('SDK live check: ' . basename($pdf) . ' ' . date('Y-m-d H:i'))
        ->file(FileInfo::transientDocument($documentId))
        ->message('Live end-to-end check of the conceptlz/adobe-sign SDK. Please sign.');
    foreach (explode(',', $signerSpec) as $i => $group) {
        foreach (explode('+', $group) as $email) {
            $agreement->participantSet(ParticipantSetInfo::signer(trim($email))->order($i + 1));
            echo '  order ' . ($i + 1) . ': ' . trim($email) . "\n";
        }
    }
    $agreementId = $sign->agreements()->create($agreement); // state IN_PROCESS = sent now
    echo "agreementId: $agreementId\n";

    $status = $sign->agreements()->status($agreementId);
    for ($i = 0; $status === 'DOCUMENTS_NOT_YET_PROCESSED' && $i < 15; $i++) {
        sleep(2); // Adobe converts the PDF asynchronously right after creation
        $status = $sign->agreements()->status($agreementId);
    }
    echo "status: $status\n";

    if ($url = getenv('WEBHOOK_URL') ?: null) {
        $step('3. Register webhook');
        $webhookId = $sign->webhooks()->create(
            WebhookInfo::forAgreement('SDK live check', $url, $agreementId)->events(EventType::AGREEMENT_ALL),
        );
        echo "webhookId: $webhookId (events go to $url)\n";
    }

    $step('4. Who signs now');
    $lastTurn = showTurn($sign, $agreementId, null);
    echo "Signers also get an email from Adobe.\n";

    if ($waitMinutes === 0) {
        exit(0);
    }

    $step("5. Waiting up to {$waitMinutes} min while people sign (Ctrl+C to stop)");
    $deadline = time() + $waitMinutes * 60;
    while (($status = $sign->agreements()->status($agreementId)) !== 'SIGNED') {
        if (in_array($status, ['CANCELLED', 'EXPIRED', 'ARCHIVED'], true) || time() > $deadline) {
            echo "Stopped waiting: status is $status.\n";
            exit(2);
        }
        $lastTurn = showTurn($sign, $agreementId, $lastTurn); // prints only when the turn moves on
        sleep(10);
    }
    echo '  ' . date('H:i:s') . " everyone has signed: SIGNED\n";

    $step('6. Download the signed PDF (with audit report)');
    $target = "$outputDir/signed-$agreementId.pdf";
    $stream = $sign->agreements()->combinedDocument($agreementId, attachAuditReport: true);
    $out = fopen($target, 'wb');
    while (!$stream->eof()) {
        fwrite($out, $stream->read(65536));
    }
    fclose($out);
    printf("saved %s (%d bytes)\n", $target, filesize($target));

    $step('7. What happened (agreement events)');
    foreach ($sign->agreements()->events($agreementId)->getEvents() ?? [] as $event) {
        printf("  %s  %-24s %s\n", $event->getDate(), $event->getType(), $event->getParticipantEmail());
    }
} catch (AdobeSignException $e) {
    fwrite(STDERR, get_class($e) . ': ' . $e->getMessage() . "\n");
    exit(1);
}

/**
 * Print whose turn it is and their signing links, when it differs from $previous.
 *
 * @return string the current turn, to pass back in next time
 */
function showTurn(AdobeSign $sign, string $agreementId, ?string $previous): string
{
    $members = $sign->agreements()->members($agreementId, includeNextParticipantSet: true);
    $emails = [];
    foreach ($members['nextParticipantSets'] ?? [] as $set) {
        foreach ($set['memberInfos'] ?? [] as $member) {
            $emails[] = (string) ($member['email'] ?? '?');
        }
    }
    $turn = $emails === [] ? '(Adobe is still processing)' : implode(' + ', $emails);
    if ($turn === $previous) {
        return $turn;
    }

    echo '  ' . date('H:i:s') . " now waiting for: $turn\n";
    try {
        foreach ($sign->agreements()->signingUrls($agreementId)->getSigningUrlSetInfos() ?? [] as $set) {
            foreach ($set->getSigningUrls() ?? [] as $url) {
                echo "    sign as {$url->getEmail()}: {$url->getEsignUrl()}\n";
            }
        }
    } catch (NotFoundException) {
        // not signable yet (AGREEMENT_NOT_EXPOSED while processing); the next poll shows the links
    }

    return $turn;
}
