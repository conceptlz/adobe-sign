<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Builder\ParticipantInfo;
use Conceptlz\AdobeSign\Builder\ParticipantSetInfo;
use Conceptlz\AdobeSign\Builder\Verification;
use Conceptlz\AdobeSign\ClientOptions;
use Conceptlz\AdobeSign\Enum\SignatureLevel;
use Conceptlz\AdobeSign\Enum\SignatureType;
use Conceptlz\AdobeSign\Exception\AccountCapabilityException;
use Conceptlz\AdobeSign\Exception\ErrorMapper;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Exception\ValidationException;
use Conceptlz\AdobeSign\Tests\TestCase;
use Nyholm\Psr7\Request;
use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;

final class SignatureLevelTest extends TestCase
{
    // --- the level itself ---------------------------------------------------

    public function test_levels_order_and_digital_requirement(): void
    {
        self::assertFalse(SignatureLevel::SES->requiresDigitalSignature());
        self::assertTrue(SignatureLevel::AES->requiresDigitalSignature());
        self::assertTrue(SignatureLevel::QES->requiresDigitalSignature());

        self::assertTrue(SignatureLevel::QES->satisfies(SignatureLevel::AES));
        self::assertTrue(SignatureLevel::AES->satisfies(SignatureLevel::AES));
        self::assertFalse(SignatureLevel::SES->satisfies(SignatureLevel::AES));
        self::assertFalse(SignatureLevel::AES->satisfies(SignatureLevel::QES));
    }

    // --- requesting a level -------------------------------------------------

    public function test_qes_agreement_requires_digital_signature_from_signers_only(): void
    {
        $payload = AgreementInfo::create('Employment contract')
            ->file('tdoc')
            ->participantSet(ParticipantSetInfo::signer('employee@example.com')->order(1))
            ->participantSet(ParticipantSetInfo::approver('hr@example.com')->order(2))
            ->participantSet(ParticipantSetInfo::signer('ceo@example.com')->order(3))
            ->signatureLevel(SignatureLevel::QES)
            ->toArray();

        self::assertSame([true, null, true], array_map(
            static fn (array $set) => $set['isDigitalSignatureRequired'] ?? null,
            $payload['participantSetsInfo'],
        ), 'approvers do not sign, so no digital signature is asked of them');
    }

    public function test_per_signer_level_overrides_the_agreement_both_ways(): void
    {
        $sets = AgreementInfo::create('x')
            ->file('tdoc')
            ->participantSet(ParticipantSetInfo::signer('customer@example.com')->signatureLevel(SignatureLevel::SES))
            ->participantSet(ParticipantSetInfo::signer('director@example.com'))
            ->signatureLevel(SignatureLevel::AES)
            ->toArray()['participantSetsInfo'];

        self::assertArrayNotHasKey('isDigitalSignatureRequired', $sets[0]);
        self::assertTrue($sets[1]['isDigitalSignatureRequired']);

        $sets = AgreementInfo::create('x')
            ->file('tdoc')
            ->participantSet(ParticipantSetInfo::signer('director@example.com')->signatureLevel(SignatureLevel::QES))
            ->participantSet(ParticipantSetInfo::signer('customer@example.com'))
            ->toArray()['participantSetsInfo'];

        self::assertTrue($sets[0]['isDigitalSignatureRequired']);
        self::assertArrayNotHasKey('isDigitalSignatureRequired', $sets[1], 'default stays SES');
    }

    public function test_ses_default_leaves_the_payload_untouched(): void
    {
        $payload = AgreementInfo::create('x')->file('tdoc')->signers('a@example.com')->toArray();

        self::assertArrayNotHasKey('isDigitalSignatureRequired', $payload['participantSetsInfo'][0]);
    }

    public function test_approver_cannot_be_held_to_a_digital_level(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('A APPROVER set does not sign');

        ParticipantSetInfo::approver('boss@example.com')->signatureLevel(SignatureLevel::QES);
    }

    public function test_digital_level_with_written_signatures_is_rejected(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('signatureType WRITTEN');

        AgreementInfo::create('x')->file('tdoc')->signers('a@example.com')
            ->signatureType(SignatureType::WRITTEN)
            ->signatureLevel(SignatureLevel::AES)
            ->toArray();
    }

    public function test_requested_level_without_any_signer_is_rejected(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('QES was requested but the agreement has no signer');

        AgreementInfo::create('x')->file('tdoc')
            ->participantSet(ParticipantSetInfo::approver('a@example.com'))
            ->signatureLevel(SignatureLevel::QES)
            ->toArray();
    }

    public function test_client_default_level_applies_to_builder_payloads_only(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement_created');
        $this->queue(200, 'agreement_created');
        $this->queue(200, 'agreement_created');

        $sign = $this->client(new ClientOptions(defaultSignatureLevel: SignatureLevel::AES));

        $sign->agreements()->create(AgreementInfo::create('x')->file('tdoc')->signers('a@example.com'));
        $sign->agreements()->create(AgreementInfo::create('x')->file('tdoc')->signers('a@example.com')->signatureLevel(SignatureLevel::SES));
        $raw = ['name' => 'raw', 'fileInfos' => [['transientDocumentId' => 'tdoc']], 'participantSetsInfo' => [['role' => 'SIGNER', 'order' => 1, 'memberInfos' => [['email' => 'a@example.com']]]], 'signatureType' => 'ESIGN', 'state' => 'IN_PROCESS'];
        $sign->agreements()->create($raw);

        self::assertTrue(self::jsonBody($this->request(1))['participantSetsInfo'][0]['isDigitalSignatureRequired'], 'project default AES');
        self::assertArrayNotHasKey('isDigitalSignatureRequired', self::jsonBody($this->request(2))['participantSetsInfo'][0], 'agreement chose SES');
        self::assertSame($raw, self::jsonBody($this->request(3)), 'raw payloads are sent as given');
    }

    // --- identity verification ---------------------------------------------

    public function test_every_verification_method_produces_a_spec_valid_payload(): void
    {
        $methods = [
            Verification::none(),
            Verification::emailOtp(),
            Verification::password('s3cret'),
            Verification::phone('50 123-4567', '+971', 'ae'),
            Verification::whatsApp('501234567', '971'),
            Verification::knowledgeBased(),
            Verification::governmentId(),
            Verification::digitalIdentity('itsme-provider-id', 'jane@example.com'),
            Verification::adobeAccount(),
        ];
        $info = AgreementInfo::create('x')->file('tdoc');
        foreach ($methods as $i => $verification) {
            $info->participantSet(ParticipantSetInfo::signer(ParticipantInfo::email("s$i@example.com")->verifyWith($verification)));
        }

        $this->queueBaseUris();
        $this->queue(200, 'agreement_created');
        $this->client()->agreements()->create($info); // the spec contract check validates every securityOption

        $options = array_map(static fn (array $set) => $set['memberInfos'][0]['securityOption'], self::jsonBody($this->request(1))['participantSetsInfo']);
        self::assertSame(['NONE', 'EMAIL_OTP', 'PASSWORD', 'PHONE', 'WHATSAPP', 'KBA', 'GOV_ID', 'DIG_ID', 'ADOBE_SIGN'], array_column($options, 'authenticationMethod'));
        self::assertSame(['phone' => '501234567', 'countryCode' => '971', 'countryIsoCode' => 'AE'], $options[3]['phoneInfo'], 'normalised');
        self::assertSame(['providerId' => 'itsme-provider-id', 'loginHint' => 'jane@example.com'], $options[7]['digAuthInfo']);
    }

    /** @return iterable<string, array{\Closure(): Verification}> */
    public static function invalidVerifications(): iterable
    {
        yield 'empty password' => [static fn () => Verification::password('')];
        yield 'letters in phone' => [static fn () => Verification::phone('call-me', '971')];
        yield 'bad country ISO' => [static fn () => Verification::phone('501234567', '971', 'UAE')];
        yield 'no eID provider' => [static fn () => Verification::digitalIdentity(' ')];
        yield 'long login hint' => [static fn () => Verification::digitalIdentity('p', str_repeat('x', 256))];
    }

    /** @param \Closure(): Verification $make */
    #[DataProvider('invalidVerifications')]
    public function test_invalid_verification_is_rejected_locally(\Closure $make): void
    {
        $this->expectException(InvalidArgumentException::class);

        $make();
    }

    // --- evidence after signing --------------------------------------------

    public function test_signature_evidence_reports_what_each_signer_reached(): void
    {
        $evidence = $this->evidence();

        self::assertSame('OUT_FOR_SIGNATURE', $evidence->status);
        self::assertSame(['Jane@Client.example', 'cfo@vendor.example', 'ceo@vendor.example'], array_map(static fn ($s) => $s->email, $evidence->signers), 'signers only, in order');

        [$jane, $cfo, $ceo] = $evidence->signers;
        self::assertTrue($jane->signed);
        self::assertSame('TYPED', $jane->signatureInputType);
        self::assertSame('EMAIL_OTP', $jane->verification);
        self::assertFalse($jane->digitallySigned);
        self::assertSame(SignatureLevel::SES, $jane->achievedLevel(['TrustPro']));

        self::assertTrue($cfo->digitallySigned);
        self::assertTrue($cfo->digitalSignatureRequired);
        self::assertSame('TrustPro', $cfo->signingProvider);
        self::assertSame('GOV_ID', $cfo->verification);
        self::assertSame(SignatureLevel::AES, $cfo->achievedLevel(), 'digital, but no qualified issuers given');
        self::assertSame(SignatureLevel::QES, $cfo->achievedLevel(['trustpro qtsp']), 'issuer matched case-insensitively');

        self::assertFalse($ceo->signed);
        self::assertNull($ceo->achievedLevel());
        self::assertFalse($evidence->allSigned());
        self::assertNull($evidence->lowestLevel());
    }

    public function test_signature_evidence_explains_shortfalls(): void
    {
        $evidence = $this->evidence();

        self::assertSame(
            [
                'Jane@Client.example signed with an electronic signature (TYPED), not a digital one: SES, QES required.',
                'ceo@vendor.example has not signed yet.',
            ],
            $evidence->shortfalls(SignatureLevel::QES, ['TrustPro']),
        );
        self::assertSame(
            ['cfo@vendor.example signed digitally, but the certificate issuer "CN=TrustPro QTSP Qualified CA 2026, O=TrustPro, C=EU" is not in your list of qualified issuers: AES, QES required.'],
            array_values(array_filter($evidence->shortfalls(SignatureLevel::QES, ['DigiCert']), static fn ($p) => str_starts_with($p, 'cfo'))),
        );
        self::assertFalse($evidence->meets(SignatureLevel::SES), 'the CEO has not signed');
    }

    public function test_qes_check_needs_qualified_issuers(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('qualified');

        $this->evidence()->meets(SignatureLevel::QES);
    }

    // --- account capability errors -----------------------------------------

    /** @return iterable<string, array{int, string, class-string}> */
    public static function capabilityErrors(): iterable
    {
        yield 'hybrid routing off' => [403, '{"code":"HYBRID_ROUTING_NOT_ALLOWED","message":"Hybrid routing is not enabled for this user"}', AccountCapabilityException::class];
        yield 'no gov ID quota' => [403, '{"code":"GOV_ID_LIMIT_EXCEEDED","message":"You cannot send new agreements requiring Government ID authentication"}', AccountCapabilityException::class];
        yield 'method off in settings' => [400, '{"code":"BAD_REQUEST","message":"Signer identity verification method not allowed by account settings."}', AccountCapabilityException::class];
        yield 'methods listed for account' => [400, '{"code":"BAD_REQUEST","message":"The two-factor authentication methods enabled for your account are: None, Password"}', AccountCapabilityException::class];
        yield 'ordinary bad request' => [400, '{"code":"BAD_REQUEST","message":"Request body is malformed."}', ValidationException::class];
    }

    /** @param class-string $expected */
    #[DataProvider('capabilityErrors')]
    public function test_account_restrictions_get_their_own_exception(int $status, string $body, string $expected): void
    {
        $e = ErrorMapper::fromResponse(new Request('POST', 'https://api.na4.adobesign.com/api/rest/v6/agreements'), new Response($status, [], $body));

        self::assertSame($expected, $e::class);
    }

    private function evidence(): \Conceptlz\AdobeSign\Model\SignatureEvidence
    {
        $this->queueBaseUris();
        $this->queue(200, '{"id":"agr-1","name":"x","status":"OUT_FOR_SIGNATURE","signatureType":"ESIGN","participantSetsInfo":[]}');
        $this->queue(200, 'evidence_members');
        $this->queue(200, 'evidence_events');

        return $this->client()->agreements()->signatureEvidence('agr-1');
    }
}
