<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Live;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Builder\FileInfo;
use Conceptlz\AdobeSign\Builder\ParticipantInfo;
use Conceptlz\AdobeSign\Builder\ParticipantSetInfo;
use Conceptlz\AdobeSign\Builder\Verification;
use Conceptlz\AdobeSign\Enum\SignatureLevel;
use Conceptlz\AdobeSign\Exception\AccountCapabilityException;

/**
 * Signature levels and identity checks against the real API. Completing an AES/QES signature needs a
 * person with a digital ID, so these tests check what is requested and stored, not the signing itself.
 *
 * Optional: ADOBE_SIGN_SIGNED_AGREEMENT_ID=<an agreement your signers completed> to check evidence on it.
 */
final class SignatureLevelTest extends LiveTestCase
{
    public function test_aes_request_is_stored_and_reported_by_evidence(): void
    {
        [$signer] = self::signers(1);

        $id = self::track(self::$sign->agreements()->create(
            AgreementInfo::create('SDK live test: AES requested')
                ->file(FileInfo::transientDocument(self::uploadTestPdf()))
                ->participantSet(ParticipantSetInfo::signer($signer))
                ->signatureLevel(SignatureLevel::AES)
                ->message('Automated SDK test. You can ignore this email; it will be cancelled.'),
        ));
        self::waitForStatus($id, ['OUT_FOR_SIGNATURE']);

        $set = self::$sign->agreements()->members($id)['participantSets'][0];
        self::assertTrue($set['isDigitalSignatureRequired'] ?? false, 'Adobe stored the digital-signature requirement');

        $evidence = self::$sign->agreements()->signatureEvidence($id);
        self::assertCount(1, $evidence->signers);
        self::assertTrue($evidence->signers[0]->digitalSignatureRequired);
        self::assertFalse($evidence->signers[0]->signed);
        self::assertSame([strtolower($signer) . ' has not signed yet.'], array_map('strtolower', $evidence->shortfalls(SignatureLevel::AES)));
        self::report("AES requested and stored on $id");
    }

    public function test_email_otp_verification_is_stored(): void
    {
        [$signer] = self::signers(1);

        $id = self::track(self::$sign->agreements()->create(
            AgreementInfo::create('SDK live test: email OTP')
                ->file(FileInfo::transientDocument(self::uploadTestPdf()))
                ->participantSet(ParticipantSetInfo::signer(ParticipantInfo::email($signer)->verifyWith(Verification::emailOtp())))
                ->message('Automated SDK test. You can ignore this email; it will be cancelled.'),
        ));
        self::waitForStatus($id, ['OUT_FOR_SIGNATURE']);

        self::assertSame('EMAIL_OTP', self::$sign->agreements()->signatureEvidence($id)->signers[0]->verification);
        self::report("EMAIL_OTP stored on $id");
    }

    public function test_identity_method_the_account_does_not_allow_is_an_account_capability_error(): void
    {
        [$signer] = self::signers(1);

        try {
            $id = self::track(self::$sign->agreements()->create(
                AgreementInfo::create('SDK live test: eID gateway')
                    ->file(FileInfo::transientDocument(self::uploadTestPdf()))
                    ->participantSet(ParticipantSetInfo::signer(ParticipantInfo::email($signer)->verifyWith(Verification::digitalIdentity('not-a-configured-provider')))),
            ));
            self::report("this account accepts DIG_ID ($id); nothing to assert");
            self::assertNotSame('', $id);
        } catch (AccountCapabilityException $e) {
            self::report(sprintf('DIG_ID refused: HTTP %d [%s] -> AccountCapabilityException', $e->statusCode, $e->errorCode));
            self::assertContains($e->statusCode, [400, 403]);
        }
    }

    public function test_evidence_on_a_completed_agreement(): void
    {
        $id = self::env('ADOBE_SIGN_SIGNED_AGREEMENT_ID');
        if ($id === '') {
            self::markTestSkipped('Set ADOBE_SIGN_SIGNED_AGREEMENT_ID to an agreement your test signers completed.');
        }

        $evidence = self::$sign->agreements()->signatureEvidence($id);

        self::assertSame('SIGNED', $evidence->status);
        self::assertTrue($evidence->allSigned());
        foreach ($evidence->signers as $signer) {
            self::report(sprintf('%s: step %d, %s, %s, verification %s -> %s',
                $signer->email, $signer->order, $signer->signedAt, $signer->signatureInputType, $signer->verification, $signer->achievedLevel()?->value));
        }
        self::assertTrue($evidence->meets(SignatureLevel::SES));
    }
}
