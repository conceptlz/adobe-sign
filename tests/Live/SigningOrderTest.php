<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Live;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Builder\FileInfo;
use Conceptlz\AdobeSign\Builder\ParticipantSetInfo;
use Conceptlz\AdobeSign\Exception\ApiException;

/**
 * Does Adobe actually enforce the signing order the SDK sends? Checked server-side through
 * GET /members (whose turn it is) and GET /signingUrls (who can sign right now).
 * Sends real emails to ADOBE_SIGN_TEST_SIGNERS; agreements are cancelled afterwards.
 */
final class SigningOrderTest extends LiveTestCase
{
    public function test_sequential_order_only_the_first_signer_can_sign(): void
    {
        [$first, $second] = self::signers(2);

        $id = self::track(self::$sign->agreements()->create(
            AgreementInfo::create('SDK live test: sequential order')
                ->file(FileInfo::transientDocument(self::uploadTestPdf()))
                ->participantSet(ParticipantSetInfo::signer($first)->order(1))
                ->participantSet(ParticipantSetInfo::signer($second)->order(2))
                ->message('Automated SDK test. You can ignore this email; it will be cancelled.'),
        ));
        self::report("created $id");
        self::assertSame('OUT_FOR_SIGNATURE', self::waitForStatus($id, ['OUT_FOR_SIGNATURE']));

        $members = self::settledMembers($id);
        self::assertSame(
            [[1, strtolower($first)], [2, strtolower($second)]],
            self::orderedEmails($members['participantSets'] ?? []),
            'Adobe stored the order as sent',
        );
        self::assertSame([strtolower($first)], self::emails($members['nextParticipantSets'] ?? []), "only step 1 is someone's turn");

        $canSign = self::signingEmails($id);
        self::assertSame([strtolower($first)], $canSign, 'only the first signer gets a signing link');
        self::report('turn: ' . implode(', ', $canSign));
    }

    public function test_parallel_order_both_signers_can_sign_at_once(): void
    {
        [$a, $b] = self::signers(2);

        $id = self::track(self::$sign->agreements()->create(
            AgreementInfo::create('SDK live test: parallel order')
                ->file(FileInfo::transientDocument(self::uploadTestPdf()))
                ->participantSet(ParticipantSetInfo::signer($a)->order(1))
                ->participantSet(ParticipantSetInfo::signer($b)->order(1))
                ->message('Automated SDK test. You can ignore this email; it will be cancelled.'),
        ));
        self::report("created $id");
        self::waitForStatus($id, ['OUT_FOR_SIGNATURE']);

        $next = self::emails(self::settledMembers($id)['nextParticipantSets'] ?? []);
        sort($next);
        $expected = [strtolower($a), strtolower($b)];
        sort($expected);

        self::assertSame($expected, $next, 'both are up at the same time');
        $canSign = self::signingEmails($id);
        sort($canSign);
        self::assertSame($expected, $canSign, 'both get a signing link now');
        self::report('turn: ' . implode(', ', $canSign));
    }

    public function test_mixed_order_one_then_two_in_parallel_then_one(): void
    {
        [$first, $parallelA, $parallelB, $last] = self::signers(4);

        try {
            $created = self::$sign->agreements()->create(
                AgreementInfo::create('SDK live test: mixed order')
                    ->file(FileInfo::transientDocument(self::uploadTestPdf()))
                    ->participantSet(ParticipantSetInfo::signer($first)->order(1))
                    ->participantSet(ParticipantSetInfo::signer($parallelA)->order(2))
                    ->participantSet(ParticipantSetInfo::approver($parallelB)->order(2))
                    ->participantSet(ParticipantSetInfo::signer($last)->order(3))
                    ->message('Automated SDK test. You can ignore this email; it will be cancelled.'),
            );
        } catch (ApiException $e) {
            if ($e->errorCode === 'HYBRID_ROUTING_NOT_ALLOWED') {
                self::markTestSkipped('Account setting: mixing sequential and parallel steps ("hybrid routing") is off for this user. Enable it in Acrobat Sign admin to run this test.');
            }
            throw $e;
        }
        $id = self::track($created);
        self::report("created $id");
        self::waitForStatus($id, ['OUT_FOR_SIGNATURE']);

        $members = self::settledMembers($id);
        self::assertSame(
            self::sortedWithinOrder([[1, strtolower($first)], [2, strtolower($parallelA)], [2, strtolower($parallelB)], [3, strtolower($last)]]),
            self::sortedWithinOrder(self::orderedEmails($members['participantSets'] ?? [])),
            'Adobe stored 1 / 2+2 / 3 as sent, including the approver role',
        );
        self::assertSame([strtolower($first)], self::emails($members['nextParticipantSets'] ?? []));
        self::assertSame([strtolower($first)], self::signingEmails($id));

        $roles = array_map(static fn (array $s) => $s['role'] ?? '', $members['participantSets'] ?? []);
        self::assertContains('APPROVER', $roles);
        self::report('order stored as 1 / 2+2 / 3; turn: ' . strtolower($first));
    }

    /**
     * @param list<array{0: int, 1: string}> $pairs
     * @return list<array{0: int, 1: string}>
     */
    private static function sortedWithinOrder(array $pairs): array
    {
        usort($pairs, static fn (array $x, array $y) => [$x[0], $x[1]] <=> [$y[0], $y[1]]);

        return $pairs;
    }

    /**
     * @param array<mixed> $sets
     * @return list<array{0: int, 1: string}>
     */
    private static function orderedEmails(array $sets): array
    {
        $out = [];
        foreach ($sets as $set) {
            foreach ($set['memberInfos'] ?? [] as $member) {
                $out[] = [(int) ($set['order'] ?? 0), strtolower((string) ($member['email'] ?? ''))];
            }
        }
        usort($out, static fn (array $x, array $y) => $x[0] <=> $y[0]);

        return $out;
    }

    /**
     * @param array<mixed> $sets
     * @return list<string>
     */
    private static function emails(array $sets): array
    {
        return array_map(static fn (array $p) => $p[1], self::orderedEmails($sets));
    }

    /** @return list<string> */
    private static function signingEmails(string $agreementId): array
    {
        $emails = [];
        foreach (self::$sign->agreements()->signingUrls($agreementId)->getSigningUrlSetInfos() ?? [] as $set) {
            foreach ($set->getSigningUrls() ?? [] as $url) {
                self::assertStringStartsWith('https://', (string) $url->getEsignUrl());
                $emails[] = strtolower((string) $url->getEmail());
            }
        }

        return $emails;
    }
}
