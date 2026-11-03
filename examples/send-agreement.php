<?php

/**
 * Plain-PHP walkthrough of Milestone 1: no framework, just Composer's autoloader.
 *
 * Live (sends a real agreement):
 *   ADOBE_SIGN_INTEGRATION_KEY=xxx php examples/send-agreement.php contract.pdf signer@example.com
 *
 * Dry run (canned responses, no network, needs dev dependencies):
 *   php examples/send-agreement.php --dry-run
 */

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Conceptlz\AdobeSign\AdobeSign;
use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Builder\FileInfo;
use Conceptlz\AdobeSign\Builder\ParticipantSetInfo;
use Conceptlz\AdobeSign\Exception\AdobeSignException;

$dryRun = in_array('--dry-run', $argv, true);
$args = array_values(array_filter(array_slice($argv, 1), static fn ($a) => !str_starts_with($a, '--')));

if ($dryRun) {
    [$sign, $mock] = dryRunClient();
    $pdf = __DIR__ . '/../tests/Fixtures/sample.pdf';
    $signer = 'jane@example.com';
} else {
    $key = getenv('ADOBE_SIGN_INTEGRATION_KEY') ?: null;
    if ($key === null || count($args) < 2) {
        fwrite(STDERR, "Usage: ADOBE_SIGN_INTEGRATION_KEY=xxx php {$argv[0]} <file.pdf> <signer-email>\n       php {$argv[0]} --dry-run\n");
        exit(1);
    }
    // PSR-18 client + PSR-17 factories are auto-discovered (symfony/http-client, guzzle, ...).
    $logger = new class extends \Psr\Log\AbstractLogger {
        public function log($level, string|\Stringable $message, array $context = []): void
        {
            fwrite(STDERR, sprintf("[%s] %s %s\n", $level, $message, json_encode($context)));
        }
    };
    $sign = AdobeSign::withIntegrationKey($key, logger: $logger);
    [$pdf, $signer] = $args;
}

try {
    $documentId = $sign->transientDocuments()->upload($pdf);
    echo "1. Uploaded transient document: $documentId\n";

    $agreementId = $sign->agreements()->create(
        AgreementInfo::create('SDK example: ' . basename($pdf))
            ->file(FileInfo::transientDocument($documentId))
            ->participantSet(ParticipantSetInfo::signer($signer))
            ->message('Sent from the conceptlz/adobe-sign example script.'),
    );
    echo "2. Created agreement: $agreementId\n";

    // Adobe processes documents asynchronously; wait until it's actually out for signature.
    $status = $sign->agreements()->status($agreementId);
    for ($i = 0; $status === 'DOCUMENTS_NOT_YET_PROCESSED' && $i < 10; $i++) {
        sleep(2);
        $status = $sign->agreements()->status($agreementId);
    }
    echo "3. Status: $status\n";

    $reminder = $sign->agreements()->sendReminder($agreementId, note: 'Friendly reminder to sign.');
    echo "4. Reminder sent: {$reminder->id}\n";

    $target = sys_get_temp_dir() . "/agreement-$agreementId.pdf";
    $stream = $sign->agreements()->combinedDocument($agreementId);
    $out = fopen($target, 'wb');
    while (!$stream->eof()) {
        fwrite($out, $stream->read(65536));
    }
    fclose($out);
    echo "5. Combined PDF saved: $target (" . filesize($target) . " bytes)\n";
} catch (AdobeSignException $e) {
    fwrite(STDERR, get_class($e) . ': ' . $e->getMessage() . "\n");
    exit(2);
}

if ($dryRun) {
    echo "\nRequests sent:\n";
    foreach ($mock->getRequests() as $n => $request) {
        printf("  %d. %-4s %s%s\n", $n + 1, $request->getMethod(), $request->getUri(),
            $request->hasHeader('If-Match') ? ' [If-Match ' . $request->getHeaderLine('If-Match') . ']' : '');
    }
}

/**
 * @return array{0: AdobeSign, 1: \Http\Mock\Client}
 */
function dryRunClient(): array
{
    if (!class_exists(\Http\Mock\Client::class)) {
        fwrite(STDERR, "--dry-run needs dev dependencies: composer install\n");
        exit(1);
    }

    $fixtures = __DIR__ . '/../tests/Fixtures/';
    $json = static fn (string $name, int $status = 200) => new \Nyholm\Psr7\Response(
        $status,
        ['Content-Type' => 'application/json'],
        (string) file_get_contents($fixtures . $name . '.json'),
    );

    $mock = new \Http\Mock\Client();
    $mock->addResponse($json('base_uris'));
    $mock->addResponse($json('transient_document'));
    $mock->addResponse($json('agreement_created'));
    $mock->addResponse($json('agreement'));
    $mock->addResponse($json('members'));
    $mock->addResponse($json('reminder_created', 201));
    $mock->addResponse(new \Nyholm\Psr7\Response(200, ['Content-Type' => 'application/pdf'], (string) file_get_contents($fixtures . 'sample.pdf')));

    return [AdobeSign::withIntegrationKey('dry-run-key', httpClient: $mock), $mock];
}
