<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Auth\OAuthClient;
use Conceptlz\AdobeSign\Auth\OAuthConfig;
use Conceptlz\AdobeSign\Exception\AdobeSignException;
use Conceptlz\AdobeSign\Exception\ApiException;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Exception\OAuthException;
use Conceptlz\AdobeSign\Tests\TestCase;
use Nyholm\Psr7\Request;
use Nyholm\Psr7\Response;

/**
 * Exceptions are logged, dumped and shipped to error trackers. None of them may carry a credential,
 * and every failure must be catchable as AdobeSignException.
 */
final class CredentialSafetyTest extends TestCase
{
    private const SECRET = 'client-secret-do-not-leak';

    public function test_every_api_exception_redacts_the_authorization_header(): void
    {
        $e = new ApiException('x', 500, null, new Request('GET', 'https://api.example/x', ['Authorization' => 'Bearer live-token']));

        self::assertSame('Bearer ***', $e->request?->getHeaderLine('Authorization'));
    }

    public function test_base_uri_response_without_access_point_does_not_leak_the_key(): void
    {
        $this->queue(200, '{"webAccessPoint":"https://secure.na1.adobesign.com/"}');
        $this->checkSpecContract = false; // the point is a response the spec says can't happen

        try {
            $this->client()->agreements()->get('agr-1');
            self::fail('Expected ApiException');
        } catch (ApiException $e) {
            self::assertStringContainsString('no apiAccessPoint', $e->getMessage());
            self::assertSame('Bearer ***', $e->request?->getHeaderLine('Authorization'));
            self::assertStringNotContainsString(self::KEY, print_r($e->request, true));
        }
    }

    public function test_oauth_non_json_response_does_not_leak_the_client_secret(): void
    {
        $this->queue(200, '<html>maintenance</html>', ['Content-Type' => 'text/html']);
        $oauth = new OAuthClient(new OAuthConfig('client-id', self::SECRET, 'https://app.example.com/cb'), $this->http, $this->psr17, $this->psr17);

        try {
            $oauth->exchangeCode('auth-code');
            self::fail('Expected OAuthException');
        } catch (OAuthException $e) {
            self::assertSame('', (string) $e->request?->getBody(), 'the form body holds the secret and code');
            self::assertStringNotContainsString(self::SECRET, $e->getMessage());
        }
    }

    public function test_invalid_json_from_the_api_is_an_sdk_exception(): void
    {
        $this->queueBaseUris();
        $this->queue(200, '{"id": "agr-1", truncated');
        $this->checkSpecContract = false;

        try {
            $this->client()->agreements()->get('agr-1');
            self::fail('Expected ApiException');
        } catch (AdobeSignException $e) {
            self::assertInstanceOf(ApiException::class, $e);
            self::assertInstanceOf(\JsonException::class, $e->getPrevious());
        }
    }

    public function test_unencodable_payload_is_rejected_before_sending(): void
    {
        try {
            $this->client()->agreements()->create(['name' => "\xB1\x31 invalid UTF-8"]);
            self::fail('Expected InvalidArgumentException');
        } catch (InvalidArgumentException $e) {
            self::assertInstanceOf(AdobeSignException::class, $e);
        }

        self::assertSame([], $this->requests(), 'nothing is sent, not even the baseUris lookup');
    }
}
