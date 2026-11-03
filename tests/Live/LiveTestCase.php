<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Live;

use Conceptlz\AdobeSign\AdobeSign;
use Conceptlz\AdobeSign\Cache\InMemoryCache;
use Conceptlz\AdobeSign\Exception\AdobeSignException;
use Conceptlz\AdobeSign\Exception\PreconditionFailedException;
use PHPUnit\Framework\TestCase;

/**
 * Base for tests against a real Acrobat Sign account. Opt-in only:
 *
 *     composer test:live
 *
 * Reads from .env (monorepo root or this package), never from the command line:
 *     ADOBE_SIGN_INTEGRATION_KEY=...                 required
 *     ADOBE_SIGN_TEST_SIGNERS=a@example.com,b@...    addresses you control; they get real emails
 *     ADOBE_SIGN_LIVE_DEBUG=1                        optional: log method/path/status to stderr
 *
 * Every agreement a test creates is cancelled afterwards, even when the test fails.
 */
abstract class LiveTestCase extends TestCase
{
    protected static AdobeSign $sign;

    /** Hosts the SDK actually called, in order (records data-center routing). */
    protected static RecordingMiddleware $recorder;

    /** @var list<string> */
    private static array $created = [];

    /** @var array<string, string>|null */
    private static ?array $env = null;

    public static function setUpBeforeClass(): void
    {
        $key = self::env('ADOBE_SIGN_INTEGRATION_KEY');
        if ($key === '') {
            self::markTestSkipped('Set ADOBE_SIGN_INTEGRATION_KEY in .env to run live tests.');
        }

        self::$recorder = new RecordingMiddleware();
        self::$sign = AdobeSign::withIntegrationKey(
            $key,
            cache: new InMemoryCache(),
            logger: self::env('ADOBE_SIGN_LIVE_DEBUG') === '1' ? new StderrLogger() : null,
            middleware: [self::$recorder],
        );
        self::$created = [];
    }

    public static function tearDownAfterClass(): void
    {
        foreach (self::$created as $id) {
            try {
                $status = self::$sign->agreements()->status($id);
                if (!in_array($status, ['CANCELLED', 'SIGNED', 'EXPIRED', 'ARCHIVED', 'AUTHORING', 'DRAFT'], true)) {
                    self::cancel($id, 'Cleanup after SDK live test');
                }
            } catch (AdobeSignException $e) {
                fwrite(STDERR, "  cleanup of $id failed: {$e->getMessage()}\n");
            }
        }
    }

    /**
     * Cancel, retrying once on 412. Right after an agreement is sent, Adobe keeps updating it in the
     * background for a moment, so an ETag read in that window can already be stale (seen live).
     */
    protected static function cancel(string $agreementId, string $comment): void
    {
        try {
            self::$sign->agreements()->cancel($agreementId, $comment, notifyOthers: false);
        } catch (PreconditionFailedException) {
            sleep(3);
            self::$sign->agreements()->get($agreementId); // fresh ETag
            self::$sign->agreements()->cancel($agreementId, $comment, notifyOthers: false);
        }
    }

    /**
     * Remember an agreement so it is cancelled after the test class.
     */
    protected static function track(string $agreementId): string
    {
        self::$created[] = $agreementId;

        return $agreementId;
    }

    /**
     * @return list<string> test signer addresses; skips the test when fewer than $count are configured
     */
    protected static function signers(int $count): array
    {
        $signers = array_values(array_filter(array_map('trim', explode(',', self::env('ADOBE_SIGN_TEST_SIGNERS')))));
        if (count($signers) < $count) {
            self::markTestSkipped("Needs $count addresses in ADOBE_SIGN_TEST_SIGNERS (comma-separated).");
        }

        return array_slice($signers, 0, $count);
    }

    protected static function uploadTestPdf(): string
    {
        return self::$sign->transientDocuments()->upload(dirname(__DIR__) . '/Fixtures/live-test.pdf', mimeType: 'application/pdf');
    }

    /**
     * Poll until the agreement reaches one of $statuses. Adobe processes documents asynchronously after create.
     *
     * @param list<string> $statuses
     */
    protected static function waitForStatus(string $agreementId, array $statuses, int $timeoutSeconds = 90): string
    {
        $deadline = time() + $timeoutSeconds;
        do {
            $status = self::$sign->agreements()->status($agreementId);
            if (in_array($status, $statuses, true)) {
                return $status;
            }
            sleep(2);
        } while (time() < $deadline);

        self::fail(sprintf('Agreement %s stayed %s; expected %s within %ds.', $agreementId, $status, implode('/', $statuses), $timeoutSeconds));
    }

    /**
     * Members of an agreement once Adobe has caught up. Right after the status flips to
     * OUT_FOR_SIGNATURE, participant sets can still read NOT_YET_VISIBLE for a moment (seen live).
     *
     * @return array<mixed> MembersInfo including nextParticipantSets
     */
    protected static function settledMembers(string $agreementId, int $timeoutSeconds = 30): array
    {
        $deadline = time() + $timeoutSeconds;
        do {
            $members = self::$sign->agreements()->members($agreementId, includeNextParticipantSet: true);
            if (($members['nextParticipantSets'] ?? []) !== []) {
                return $members;
            }
            sleep(2);
        } while (time() < $deadline);

        return $members;
    }

    /**
     * Print a line to the test output so a live run shows what really happened.
     */
    protected static function report(string $line): void
    {
        fwrite(STDERR, "  · $line\n");
    }

    protected static function env(string $name): string
    {
        if (self::$env === null) {
            self::$env = [];
            $root = dirname(__DIR__, 4);
            foreach ([$root . '/.env', dirname(__DIR__, 2) . '/.env'] as $file) {
                if (!is_file($file)) {
                    continue;
                }
                foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
                    if (preg_match('/^\s*([A-Z0-9_]+)\s*=\s*(.*?)\s*$/', $line, $m) && !str_starts_with(trim($line), '#')) {
                        self::$env[$m[1]] = trim($m[2], "\"'");
                    }
                }
            }
        }

        $value = getenv($name);

        return is_string($value) && $value !== '' ? $value : (self::$env[$name] ?? '');
    }
}

