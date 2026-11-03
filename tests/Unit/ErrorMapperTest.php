<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Exception\AccountCapabilityException;
use Conceptlz\AdobeSign\Exception\ApiException;
use Conceptlz\AdobeSign\Exception\AuthenticationException;
use Conceptlz\AdobeSign\Exception\ErrorMapper;
use Conceptlz\AdobeSign\Exception\NotFoundException;
use Conceptlz\AdobeSign\Exception\PreconditionFailedException;
use Conceptlz\AdobeSign\Exception\RateLimitException;
use Conceptlz\AdobeSign\Exception\ValidationException;
use Nyholm\Psr7\Request;
use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ErrorMapperTest extends TestCase
{
    /** @return iterable<string, array{int, string, class-string, ?string}> */
    public static function cases(): iterable
    {
        yield 'auth by code' => [401, '{"code":"INVALID_ACCESS_TOKEN","message":"expired"}', AuthenticationException::class, 'INVALID_ACCESS_TOKEN'];
        yield 'auth code on a 400' => [400, '{"code":"INVALID_X_API_USER_HEADER","message":"bad"}', AuthenticationException::class, 'INVALID_X_API_USER_HEADER'];
        yield 'not found by status' => [404, '{"code":"AGREEMENT_DELETED","message":"gone"}', NotFoundException::class, 'AGREEMENT_DELETED'];
        yield 'rate limit by code' => [429, '{"code":"THROTTLING_TOO_MANY_REQUESTS","message":"slow down"}', RateLimitException::class, 'THROTTLING_TOO_MANY_REQUESTS'];
        yield 'validation by code' => [400, '{"code":"MISSING_REQUIRED_PARAM","message":"x"}', ValidationException::class, 'MISSING_REQUIRED_PARAM'];
        yield 'validation by status' => [400, '{"code":"SOMETHING_NEW","message":"x"}', ValidationException::class, 'SOMETHING_NEW'];
        yield 'unsupported media' => [415, '{"code":"UNSUPPORTED_MEDIA_TYPE","message":"x"}', ValidationException::class, 'UNSUPPORTED_MEDIA_TYPE'];
        yield 'stale etag' => [412, '{"code":"RESOURCE_MODIFIED","message":"x"}', PreconditionFailedException::class, 'RESOURCE_MODIFIED'];
        yield 'permission denied stays generic' => [403, '{"code":"PERMISSION_DENIED","message":"x"}', ApiException::class, 'PERMISSION_DENIED'];
        yield 'server error' => [500, '{"code":"MISC_SERVER_ERROR","message":"x"}', ApiException::class, 'MISC_SERVER_ERROR'];
        yield 'spec example "reason" format' => [404, '{"reason":"INVALID_AGREEMENT_ID: The Agreement ID specified is invalid.","status":404}', NotFoundException::class, 'INVALID_AGREEMENT_ID'];
        yield 'non-json body' => [502, '<html>Bad gateway</html>', ApiException::class, null];
        yield 'account restriction by message' => [400, '{"code":"BAD_REQUEST","message":"DIG_ID is not allowed by account settings"}', AccountCapabilityException::class, 'BAD_REQUEST'];
        yield 'quota code is not a validation error' => [400, '{"code":"WEBHOOK_LIMIT_EXCEEDED","message":"x"}', ValidationException::class, 'WEBHOOK_LIMIT_EXCEEDED'];

        // Account capability codes, with the status the spec gives them.
        foreach ([
            'HYBRID_ROUTING_NOT_ALLOWED' => 403,
            'GOV_ID_LIMIT_EXCEEDED' => 403,
            'KBA_LIMIT_EXCEEDED' => 403,
            'PHONE_LIMIT_EXCEEDED' => 403,
            'PHONE_AUTH_LIMIT_EXCEEDED' => 403,
            'AGREEMENT_PHONE_AUTH_LIMIT_EXCEEDED' => 403,
            'SEND_LIMIT_EXCEEDED' => 403,
            'ACCOUNT_LIMIT_EXCEEDED' => 400,
            'GROUP_LIMIT_EXCEEDED' => 403,
            'DIGITAL_SIGNATURE_ENFORCEMENT_PER_PARTICIPANT_NOT_ALLOWED' => 403,
            'DIGITAL_SIGNATURE_ENFORCEMENT_PER_PARTICIPANT_DISABLED' => 403,
            'SIGNER_AUTH_NOT_ALLOWED' => 403,
            'INTERNAL_SIGNER_AUTH_NOT_ALLOWED' => 403,
            'AUTH_METHOD_PROVIDED_IS_NOT_ALLOWED' => 403,
            'EXTERNAL_AUTH_METHOD_PROVIDED_IS_NOT_ALLOWED' => 403,
            'INTERNAL_AUTH_METHOD_PROVIDED_IS_NOT_ALLOWED' => 403,
            'WEBHOOK_CREATION_NOT_ALLOWED' => 403,
            'WEBHOOK_PROBLEM_NOTIFICATION_EMAILS_NOT_ENABLED' => 400,
            'PRIVATE_MESSAGES_NOT_ENABLED' => 403,
            'PAYMENT_INTEGRATION_DISABLED' => 403,
            'AGREEMENT_SHARING_DISABLED' => 403,
            'WIDGET_SHARING_DISABLED' => 403,
            'COPY_AGREEMENT_FEATURE_DISABLED' => 403,
            'DYNAMIC_DOCUMENT_EXPIRATION_NOT_ENABLED' => 412,
            'DOCUMENT_ORIGINAL_FORMAT_NOT_ALLOWED' => 403,
            'MESSAGE_TEMPLATES_NOT_ENABLED' => 403,
            'PHONE_TRANSACTION_REPORTING_DISABLED' => 403,
        ] as $code => $status) {
            yield "account capability $code" => [$status, sprintf('{"code":"%s","message":"x"}', $code), AccountCapabilityException::class, $code];
        }
    }

    /** @param class-string $expected */
    #[DataProvider('cases')]
    public function test_maps_error(int $status, string $body, string $expected, ?string $code): void
    {
        $e = ErrorMapper::fromResponse(
            new Request('GET', 'https://api.na4.adobesign.com/api/rest/v6/agreements/x'),
            new Response($status, [], $body),
        );

        self::assertSame($expected, $e::class);
        self::assertSame($code, $e->errorCode);
        self::assertSame($status, $e->statusCode);
        self::assertNotNull($e->response);
    }

    public function test_exception_never_carries_the_bearer_token(): void
    {
        $e = ErrorMapper::fromResponse(
            new Request('GET', 'https://api.na4.adobesign.com/api/rest/v6/agreements/x', ['Authorization' => 'Bearer live-secret-token']),
            new Response(404, [], '{"code":"INVALID_AGREEMENT_ID","message":"x"}'),
        );

        self::assertSame('Bearer ***', $e->request?->getHeaderLine('Authorization'));
        self::assertStringNotContainsString('live-secret-token', print_r($e->request, true));
    }

    public function test_parses_oauth_error_shape(): void
    {
        self::assertSame(
            ['invalid_request', 'Invalid grant_type parameter value'],
            ErrorMapper::parseBody('{"error_description":"Invalid grant_type parameter value","error":"invalid_request"}'),
        );
    }

    public function test_message_carries_method_path_code_and_text(): void
    {
        $e = ErrorMapper::fromResponse(
            new Request('POST', 'https://api.na4.adobesign.com/api/rest/v6/agreements'),
            new Response(400, [], '{"code":"INVALID_JSON","message":"Malformed body"}'),
        );

        self::assertSame('POST /api/rest/v6/agreements failed with HTTP 400 [INVALID_JSON]: Malformed body', $e->getMessage());
    }
}
