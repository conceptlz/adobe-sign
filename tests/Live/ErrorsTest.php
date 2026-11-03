<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Live;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Exception\ApiException;
use Conceptlz\AdobeSign\Exception\NotFoundException;

/**
 * Real error responses map to the documented exceptions, with Adobe's code attached.
 */
final class ErrorsTest extends LiveTestCase
{
    public function test_unknown_agreement_is_not_found(): void
    {
        try {
            self::$sign->agreements()->get('CBJCHBCAABAAdoesnotexist0000000000000000');
            self::fail('Expected NotFoundException');
        } catch (NotFoundException $e) {
            self::assertSame(404, $e->statusCode);
            self::assertNotNull($e->errorCode);
            self::report("404 -> NotFoundException [{$e->errorCode}]");
        }
    }

    public function test_bogus_transient_document_is_rejected_with_a_code(): void
    {
        [$signer] = self::signers(1);

        try {
            self::$sign->agreements()->create(
                AgreementInfo::create('SDK live test: should be rejected')->file('not-a-real-transient-document-id')->signers($signer),
            );
            self::fail('Expected ApiException');
        } catch (ApiException $e) {
            self::assertNotNull($e->errorCode);
            self::assertSame('Bearer ***', $e->request?->getHeaderLine('Authorization'), 'the key is not in the exception');
            self::report(sprintf('HTTP %d -> %s [%s]', $e->statusCode, (new \ReflectionClass($e))->getShortName(), $e->errorCode));
        }
    }
}
