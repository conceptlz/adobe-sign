<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Builder\WebhookInfo;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Exception\WebhookException;
use Conceptlz\AdobeSign\Generated\Model\WebhookInfo as WebhookInfoModel;
use Conceptlz\AdobeSign\Hydration\ModelMapper;
use Conceptlz\AdobeSign\Tests\TestCase;
use Conceptlz\AdobeSign\Webhook\AgreementEvent;
use Conceptlz\AdobeSign\Webhook\EventType;
use Conceptlz\AdobeSign\Webhook\MegaSignEvent;
use Conceptlz\AdobeSign\Webhook\UnknownEvent;
use Conceptlz\AdobeSign\Webhook\WebhookEvent;
use Conceptlz\AdobeSign\Webhook\WebhookHandler;
use Nyholm\Psr7\ServerRequest;

final class WebhookHandlerTest extends TestCase
{
    private const CLIENT_ID = 'CBJCHBCAABAAclientid';

    private WebhookHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = new WebhookHandler([self::CLIENT_ID]);
    }

    public function test_verification_get_echoes_client_id_in_header_and_body(): void
    {
        // Adobe sends the header upper-cased; PSR-7 header lookup is case-insensitive.
        $result = $this->handle(new ServerRequest('GET', '/adobe/webhook', ['X-ADOBESIGN-CLIENTID' => self::CLIENT_ID]));

        self::assertTrue($result->isAccepted());
        self::assertTrue($result->isVerification);
        self::assertNull($result->event);
        self::assertSame(200, $result->response->getStatusCode());
        self::assertSame(self::CLIENT_ID, $result->response->getHeaderLine('X-AdobeSign-ClientId'));
        self::assertSame(['xAdobeSignClientId' => self::CLIENT_ID], json_decode((string) $result->response->getBody(), true));
        self::assertSame('application/json', $result->response->getHeaderLine('Content-Type'));
    }

    public function test_notification_post_returns_typed_event_and_echo(): void
    {
        $result = $this->handle($this->post(self::fixtureBody()));

        self::assertTrue($result->isAccepted());
        self::assertSame(self::CLIENT_ID, $result->response->getHeaderLine('X-AdobeSign-ClientId'), 'every notification needs the echo');

        $event = $result->event;
        self::assertInstanceOf(AgreementEvent::class, $event);
        self::assertTrue($event->isWorkflowCompleted());
        self::assertTrue($event->is(EventType::AGREEMENT_WORKFLOW_COMPLETED));
        self::assertSame('CBJCHBCAABAAx1aFQyYF-aGrLsBZtVqaT9gPh6Xw42kK', $event->agreementId());
        self::assertSame('SIGNED', $event->resourceStatus());
        self::assertSame('CBJCHBCAABAAnotif1', $event->notificationId);
        self::assertSame('jane@example.com', $event->actingUserEmail);
        self::assertNull($event->subEvent, 'empty strings become null');
        self::assertSame('SENDER', $event->applicableUsers[0]['role']);
        self::assertSame('COMPLETED', $event->agreement()['participantSetsInfo']['participantSets'][0]['status']);
    }

    public function test_unknown_client_id_is_rejected_without_echo(): void
    {
        $result = $this->handle(new ServerRequest('POST', '/adobe/webhook', ['X-AdobeSign-ClientId' => 'someone-else'], self::fixtureBody()));

        self::assertFalse($result->isAccepted());
        self::assertSame(403, $result->response->getStatusCode());
        self::assertFalse($result->response->hasHeader('X-AdobeSign-ClientId'));
        self::assertNull($result->event);
        self::assertInstanceOf(WebhookException::class, $result->error);
    }

    public function test_missing_client_id_is_rejected(): void
    {
        $result = $this->handle(new ServerRequest('POST', '/adobe/webhook', [], self::fixtureBody()));

        self::assertSame(403, $result->response->getStatusCode());
        self::assertStringContainsString('Missing', $result->error?->getMessage() ?? '');
    }

    public function test_unreadable_body_gets_4xx_so_adobe_retries(): void
    {
        $result = $this->handle($this->post('{not json'));

        self::assertSame(400, $result->response->getStatusCode());
        self::assertFalse($result->response->hasHeader('X-AdobeSign-ClientId'));
    }

    public function test_other_methods_are_rejected(): void
    {
        self::assertSame(405, $this->handle(new ServerRequest('PUT', '/', ['X-AdobeSign-ClientId' => self::CLIENT_ID]))->response->getStatusCode());
    }

    public function test_event_class_follows_event_prefix(): void
    {
        $megaSign = WebhookEvent::fromArray(['event' => 'MEGASIGN_CREATED', 'megaSign' => ['id' => 'ms-1', 'status' => 'IN_PROCESS']]);
        $unknown = WebhookEvent::fromArray(['event' => 'SOMETHING_NEW', 'thing' => ['id' => 'x']]);

        self::assertInstanceOf(MegaSignEvent::class, $megaSign);
        self::assertSame('ms-1', $megaSign->megaSignId());
        self::assertInstanceOf(UnknownEvent::class, $unknown);
        self::assertSame([], $unknown->resource());
        self::assertSame(['id' => 'x'], $unknown->raw['thing']);
    }

    public function test_plain_php_helpers(): void
    {
        $id = $this->handler->verifyClientId(self::CLIENT_ID);

        self::assertSame(['X-AdobeSign-ClientId' => self::CLIENT_ID, 'Content-Type' => 'application/json'], $this->handler->acknowledgementHeaders($id));
        self::assertSame('{"xAdobeSignClientId":"CBJCHBCAABAAclientid"}', $this->handler->acknowledgementBody($id));
        self::assertInstanceOf(AgreementEvent::class, $this->handler->parse(self::fixtureBody()));
    }

    public function test_handler_requires_an_allowlist(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new WebhookHandler(['', ' ']);
    }

    public function test_webhook_builder_matches_spec_model(): void
    {
        $payload = WebhookInfo::forAccount('All agreements', 'https://app.example.com/hook')
            ->events(EventType::AGREEMENT_ALL, EventType::AGREEMENT_ALL)
            ->notifyOnProblems('ops@example.com')
            ->toArray();

        self::assertSame(['AGREEMENT_ALL'], $payload['webhookSubscriptionEvents'], 'deduplicated');
        self::assertEquals($payload, ModelMapper::toArray(ModelMapper::hydrate(WebhookInfoModel::class, $payload)), 'every field exists in the spec');
    }

    public function test_webhook_builder_validation(): void
    {
        foreach ([
            static fn () => WebhookInfo::forUser('x', 'http://insecure.example.com'),
            static fn () => WebhookInfo::forUser('x', 'https://ok.example.com')->toArray(), // no events
            static fn () => WebhookInfo::forResource('x', 'https://ok.example.com', 'AGREEMENT', ''),
        ] as $i => $build) {
            try {
                $build();
                self::fail("Case $i should throw");
            } catch (InvalidArgumentException) {
                self::addToAssertionCount(1);
            }
        }
    }

    private function handle(ServerRequest $request): \Conceptlz\AdobeSign\Webhook\WebhookResult
    {
        return $this->handler->handle($request, $this->psr17, $this->psr17);
    }

    private function post(string $body): ServerRequest
    {
        return new ServerRequest('POST', '/adobe/webhook', ['X-AdobeSign-ClientId' => self::CLIENT_ID, 'Content-Type' => 'application/json'], $body);
    }

    private static function fixtureBody(): string
    {
        return (string) file_get_contents(self::fixturePath('webhook_agreement_workflow_completed.json'));
    }
}
