<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Builder\FileInfo;
use Conceptlz\AdobeSign\Builder\ParticipantInfo;
use Conceptlz\AdobeSign\Builder\ParticipantSetInfo;
use Conceptlz\AdobeSign\Enum\AgreementState;
use Conceptlz\AdobeSign\Enum\ParticipantRole;
use Conceptlz\AdobeSign\Enum\ReminderFrequency;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class AgreementInfoBuilderTest extends TestCase
{
    public function test_full_payload(): void
    {
        $payload = AgreementInfo::create('Services Agreement')
            ->file(FileInfo::transientDocument('tdoc-1')->label('main'))
            ->file(FileInfo::libraryDocument('lib-1'))
            ->file(FileInfo::url('https://example.com/a.pdf', 'a.pdf'))
            ->participantSet(ParticipantSetInfo::approver(ParticipantInfo::email('boss@example.com', 'The Boss')))
            ->participantSet(
                ParticipantSetInfo::signer('jane@example.com', 'jane.alt@example.com')
                    ->name('Client')
                    ->privateMessage('Either of you may sign'),
            )
            ->cc('legal@example.com')
            ->state(AgreementState::DRAFT)
            ->externalId('crm-42')
            ->reminderFrequency(ReminderFrequency::DAILY_UNTIL_SIGNED)
            ->expiresAt(new \DateTimeImmutable('2026-12-01 18:00:00', new \DateTimeZone('Asia/Dubai')))
            ->with(['emailOption' => ['sendOptions' => ['initEmails' => 'NONE']]])
            ->toArray();

        self::assertSame([
            'name' => 'Services Agreement',
            'fileInfos' => [
                ['transientDocumentId' => 'tdoc-1', 'label' => 'main'],
                ['libraryDocumentId' => 'lib-1'],
                ['urlFileInfo' => ['url' => 'https://example.com/a.pdf', 'name' => 'a.pdf', 'mimeType' => 'application/pdf']],
            ],
            'participantSetsInfo' => [
                ['role' => 'APPROVER', 'order' => 1, 'memberInfos' => [['email' => 'boss@example.com', 'name' => 'The Boss']]],
                [
                    'role' => 'SIGNER',
                    'order' => 2,
                    'memberInfos' => [['email' => 'jane@example.com'], ['email' => 'jane.alt@example.com']],
                    'name' => 'Client',
                    'privateMessage' => 'Either of you may sign',
                ],
            ],
            'signatureType' => 'ESIGN',
            'state' => 'DRAFT',
            'externalId' => ['id' => 'crm-42'],
            'ccs' => [['email' => 'legal@example.com']],
            'reminderFrequency' => 'DAILY_UNTIL_SIGNED',
            'expirationTime' => '2026-12-01T14:00:00Z',
            'emailOption' => ['sendOptions' => ['initEmails' => 'NONE']],
        ], $payload);
    }

    public function test_explicit_orders_allow_parallel_sets(): void
    {
        $sets = AgreementInfo::create('x')
            ->file('tdoc')
            ->participantSet(ParticipantSetInfo::signer('a@example.com')->order(1))
            ->participantSet(ParticipantSetInfo::signer('b@example.com')->order(1))
            ->participantSet(ParticipantSetInfo::signer('c@example.com'))
            ->toArray()['participantSetsInfo'];

        self::assertSame([1, 1, 2], array_column($sets, 'order'));
    }

    public function test_signers_shortcut_and_string_roles(): void
    {
        $data = AgreementInfo::create('x')
            ->file('tdoc')
            ->signers('a@example.com', 'b@example.com')
            ->participantSet(ParticipantSetInfo::role('SOME_FUTURE_ROLE', 'c@example.com'))
            ->participantSet(ParticipantSetInfo::role(ParticipantRole::FORM_FILLER, 'd@example.com'))
            ->toArray();

        self::assertSame(['SIGNER', 'SIGNER', 'SOME_FUTURE_ROLE', 'FORM_FILLER'], array_column($data['participantSetsInfo'], 'role'));
        self::assertSame([1, 2, 3, 4], array_column($data['participantSetsInfo'], 'order'));
    }

    public function test_password_security_option(): void
    {
        $member = ParticipantInfo::email('a@example.com')->password('s3cret')->toArray();

        self::assertSame(['authenticationMethod' => 'PASSWORD', 'password' => 's3cret'], $member['securityOption']);
    }

    public function test_requires_files(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('at least one file');

        AgreementInfo::create('x')->signers('a@example.com')->toArray();
    }

    public function test_requires_participants(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('at least one participant set');

        AgreementInfo::create('x')->file('tdoc')->toArray();
    }

    public function test_rejects_invalid_email(): void
    {
        $this->expectException(InvalidArgumentException::class);

        ParticipantSetInfo::signer('not-an-email');
    }
}
