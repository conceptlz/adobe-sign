# conceptlz/adobe-sign

A PHP SDK for the [Adobe Acrobat Sign REST API v6](https://secure.na1.adobesign.com/public/docs/restapi/v6).
Upload documents, send them for e-signature in any signing order, follow progress through webhooks,
and download the signed PDF. It works in any PHP 8.2+ project.

- **Framework-agnostic.** Depends only on PSR interfaces (HTTP client, factories, cache, logger, clock).
  Using Laravel? Install [`conceptlz/adobe-sign-laravel`](https://github.com/conceptlz/adobe-sign-laravel) on top.
- **Both auth methods.** Integration Key, or OAuth 2.0 (authorization code with automatic refresh).
- **Production details handled.** Data-center routing, retries on rate limits, ETags, streaming
  uploads/downloads, typed exceptions, and webhook verification.
- **Checked against Adobe's spec.** Every request in the test suite is validated against Adobe's
  published OpenAPI schemas, and 313 response models are generated from them.

## Contents

- [Installation](#installation)
- [The whole flow in one example](#the-whole-flow-in-one-example)
- [Authentication](#authentication)
- [Uploading documents](#uploading-documents)
- [Creating agreements and signing order](#creating-agreements-and-signing-order)
- [Managing agreements](#managing-agreements)
- [Downloading signed documents](#downloading-signed-documents)
- [Webhooks](#webhooks)
- [Other resources](#other-resources)
- [Errors](#errors)
- [Configuration](#configuration)
- [Generated models](#generated-models)
- [Testing your integration](#testing-your-integration)
- [Examples](#examples)

## Installation

```bash
composer require conceptlz/adobe-sign
```

The SDK needs any [PSR-18](https://www.php-fig.org/psr/psr-18/) HTTP client and
[PSR-17](https://www.php-fig.org/psr/psr-17/) factories, and finds them automatically. If your
project has neither yet:

```bash
composer require symfony/http-client nyholm/psr7
```

Guzzle 7+ works too, and is already installed in every Laravel app.

**Requirements:** PHP 8.2+, an Acrobat Sign account, and API credentials. A
[free developer account](https://developer.adobe.com/acrobat-sign/docs/overview/developer_guide/gstarted) is enough for development.

## The whole flow in one example

```php
use Conceptlz\AdobeSign\AdobeSign;
use Conceptlz\AdobeSign\Builder\{AgreementInfo, FileInfo, ParticipantSetInfo, WebhookInfo};
use Conceptlz\AdobeSign\Webhook\EventType;

$sign = AdobeSign::withIntegrationKey(getenv('ADOBE_SIGN_INTEGRATION_KEY'));

// 1. Upload the PDF
$documentId = $sign->transientDocuments()->upload('/path/to/contract.pdf');

// 2. Create the agreement with a signing order, and send it (state IN_PROCESS is the default)
$agreementId = $sign->agreements()->create(
    AgreementInfo::create('Master Services Agreement')
        ->file(FileInfo::transientDocument($documentId))
        ->participantSet(ParticipantSetInfo::signer('client@example.com')->order(1))
        ->participantSet(ParticipantSetInfo::approver('legal@example.com')->order(2)) // order 2: these two
        ->participantSet(ParticipantSetInfo::signer('cfo@example.com')->order(2))     // act in parallel
        ->participantSet(ParticipantSetInfo::signer('ceo@example.com')->order(3))
        ->message('Please review and sign.'),
);

// 3. Get notified as people sign (see "Webhooks" for the receiving side)
$sign->webhooks()->create(
    WebhookInfo::forAgreement('Contract sync', 'https://app.example.com/adobe-sign/webhook', $agreementId)
        ->events(EventType::AGREEMENT_ALL),
);

// 4. Once everyone has signed: download the signed PDF and save it
if ($sign->agreements()->get($agreementId)->isSigned()) {
    $pdf = $sign->agreements()->combinedDocument($agreementId, attachAuditReport: true);
    file_put_contents("storage/agreements/$agreementId.pdf", $pdf->detach());
}
```

To run this exact flow against your own account, use
[`examples/live-lifecycle.php`](examples/live-lifecycle.php).

## Authentication

### Integration Key

An Integration Key is a non-expiring key for one Acrobat Sign account. Create one in Acrobat Sign
under *Account → Acrobat Sign API → API Information → Integration Key*.

```php
$sign = AdobeSign::withIntegrationKey(getenv('ADOBE_SIGN_INTEGRATION_KEY'));
```

### OAuth 2.0

Use OAuth when users connect their *own* Acrobat Sign accounts to your application. Create an API
application in Acrobat Sign, then configure its redirect URI and scopes.

```php
use Conceptlz\AdobeSign\Auth\{OAuthClient, OAuthConfig, InMemoryTokenStore};

$oauth = new OAuthClient(new OAuthConfig($clientId, $clientSecret, 'https://app.example.com/adobe/callback'));

// 1. Send the user to Adobe (keep $state in their session)
$state = OAuthClient::generateState();
header('Location: ' . $oauth->authorizationUrl(['user_login:self', 'agreement_read:self', 'agreement_write:self', 'agreement_send:self'], $state));

// 2. On your redirect URI: check the state and exchange the code (valid for 5 minutes)
$token = $oauth->handleCallback($_GET, $state);
$tokenStore->put($userId, $token);

// 3. Any time later. Tokens refresh automatically 60s before expiry, or after a 401.
$sign = AdobeSign::withOAuth($oauth, $tokenStore, $userId);
```

- **Token storage.** `TokenStore` has two methods, `get(string $key)` and `put(string $key, AccessToken $token)`.
  `InMemoryTokenStore` ships for scripts and tests; implement it on your database for real apps,
  and store tokens encrypted. `AccessToken::toArray()` and `fromArray()` make that easy.
- **Data center.** The token carries the account's `api_access_point`, so OAuth clients never call
  `GET /baseUris`.
- **Security checks.** An `api_access_point` arriving in the callback query string is only used if it
  is HTTPS on `adobesign.com`, `echosign.com` or `adobesigngov.us`. This stops a forged callback from
  receiving your client secret.
- **Expired or revoked access.** Refresh tokens expire after 60 days without use. A dead refresh
  token raises `OAuthException`, and the user has to authorize again.
- **Revoking.** `$oauth->revoke($token)` revokes the access/refresh token pair.

Runnable demo: [`examples/oauth-server.php`](examples/oauth-server.php) (`php -S localhost:8080 examples/oauth-server.php`).

### Acting as another user

An account-admin token can act on behalf of any user in the account:

```php
$sign->asUser('jane@example.com')->agreements()->all();   // sends x-api-user: email:jane@example.com
$sign->asUser('CBJCHBCAABAA...')->agreements()->all();    // a user id becomes userid:...
```

`asUser()` returns a new client; the original is unchanged.

## Uploading documents

```php
$id = $sign->transientDocuments()->upload('/path/contract.pdf');                       // from a path
$id = $sign->transientDocuments()->upload(new SplFileInfo($path));                    // SplFileInfo
$id = $sign->transientDocuments()->upload(fopen($path, 'rb'), 'contract.pdf');        // stream resource
$id = $sign->transientDocuments()->upload($psr7Stream, 'contract.pdf', 'application/pdf'); // PSR-7 stream
```

- The upload is streamed, so large PDFs aren't loaded into memory.
- Transient documents expire **7 days** after upload. Use the id in an agreement before then.
- To reuse a document many times, store it as a library template (`libraryDocuments()->create()`),
  then reference it with `FileInfo::libraryDocument($id)`.
- Adobe can also fetch a document itself: `FileInfo::url('https://…/contract.pdf', 'contract.pdf')`.

## Creating agreements and signing order

`AgreementInfo` builds the `POST /agreements` payload. Its defaults are e-signature (`ESIGN`) and
**send immediately** (`IN_PROCESS`).

```php
use Conceptlz\AdobeSign\Builder\{AgreementInfo, FileInfo, ParticipantInfo, ParticipantSetInfo};
use Conceptlz\AdobeSign\Enum\{AgreementState, ParticipantRole, ReminderFrequency};

$info = AgreementInfo::create('NDA')
    ->file($documentId)                                        // a transientDocumentId
    ->participantSet(ParticipantSetInfo::signer(ParticipantInfo::email('jane@example.com', 'Jane Doe')))
    ->participantSet(ParticipantSetInfo::role(ParticipantRole::APPROVER, 'boss@example.com'))
    ->cc('legal@example.com')
    ->message('Please sign by Friday.')
    ->externalId('crm-deal-42')                                // your own reference
    ->reminderFrequency(ReminderFrequency::DAILY_UNTIL_SIGNED)
    ->expiresAt(new DateTimeImmutable('+14 days'));

$agreementId = $sign->agreements()->create($info);
```

### Signing order

Each `ParticipantSetInfo` is one step in the signing order. **Sets with the same order number act in
parallel.** Leave `order()` out and sets are numbered in the order you add them.

| You want | Do |
| --- | --- |
| A, then B, then C | `->signers('a@x.com', 'b@x.com', 'c@x.com')` |
| A, then B **and** C (any order), then D | `->order(1)` for A, `->order(2)` for B and C, `->order(3)` for D |
| Anyone in a group can sign for it | `ParticipantSetInfo::signer('a@x.com', 'b@x.com')`: one set, two members |
| Approve before signing | `ParticipantSetInfo::approver(...)->order(1)`, then signers from `order(2)` |

Adobe requires the order numbers to run from 1 with no gaps (`1, 1, 2` is fine; `1, 3` is not). The
builder checks this locally and throws `InvalidArgumentException`, so a bad order never reaches the API.

**Account setting for mixed orders.** Purely sequential (`1, 2, 3`) and purely parallel (`1, 1, 1`)
orders always work. Mixing them, e.g. `1` then `2 + 2` then `3`, is called **hybrid routing** and is
an Acrobat Sign account setting. When it's off, Adobe answers `403 HYBRID_ROUTING_NOT_ALLOWED`
(an `ApiException`); an account admin can enable it in the account's send settings.

Available roles (`ParticipantRole`): `SIGNER`, `APPROVER`, `ACCEPTOR`, `CERTIFIED_RECIPIENT`, `FORM_FILLER`,
`DELEGATE_TO_*`, `NOTARY_SIGNER`, `ELECTRONIC_SEALER`, `WITNESS`, `HOST`, `IN_PERSON_SIGNER`.

### Sending: now, or draft first

```php
$info->state(AgreementState::IN_PROCESS);    // default: sent to the first signer(s) on create
$info->state(AgreementState::AUTHORING);     // create without sending, e.g. to place fields in Adobe's UI

$sign->agreements()->updateState($agreementId, 'IN_PROCESS');   // send a draft later
```

### Anything the builder doesn't cover

`with()` merges raw fields from the spec's `AgreementCreationInfo` into the payload. For full typing,
start from the generated model:

```php
$info->with(['emailOption' => ['sendOptions' => ['initEmails' => 'NONE']]]);

$model = $info->toModel();               // Conceptlz\AdobeSign\Generated\Model\AgreementCreationInfo
$model->setFirstReminderDelay(24);
$sign->agreements()->create($model);     // create() accepts the builder, the model, or a raw array
```

## Managing agreements

```php
$agreement = $sign->agreements()->get($agreementId);   // Model\Agreement: id, name, status, etag, raw...
$agreement->status;                                    // OUT_FOR_SIGNATURE, SIGNED, CANCELLED, ...
$agreement->details();                                 // full generated FetchedAgreementInfo

$sign->agreements()->status($agreementId);            // shortcut
foreach ($sign->agreements()->all() as $summary) {}   // every agreement, pages fetched lazily

$sign->agreements()->sendReminder($agreementId);       // remind whoever's turn it is
$sign->agreements()->cancel($agreementId, 'Sent to the wrong person');
$copyId = $sign->agreements()->copy($agreementId);    // new DRAFT, same documents and people

// Embedded signing: a link for one signer, when it's their turn
$url = $sign->agreements()->signingUrlFor($agreementId, 'jane@example.com');
```

**Updating.** Fetch the agreement, change it, and send it back:

```php
$details = $sign->agreements()->get($agreementId)->details();
$details->setMessage('Updated instructions');
$sign->agreements()->update($agreementId, $details);   // If-Match is sent automatically
```

If someone else changed the agreement in between, the update throws `PreconditionFailedException`.
Fetch it again and retry. This can also happen in the first few seconds after sending: Adobe keeps
updating the agreement in the background while it delivers emails, so an ETag read in that window can
already be stale.

**Whose turn is it?** `members($id, includeNextParticipantSet: true)` adds `nextParticipantSets`.
Adobe leaves that key out unless asked, even though the spec lists it. Every participant set also has a
`status` such as `WAITING_FOR_MY_SIGNATURE` or `NOT_YET_VISIBLE`.

**Developer accounts.** On a free developer account, Adobe prefixes every agreement name with
`[DEMO USE ONLY]`.

**Not signable yet.** Right after `create()`, Adobe processes the document asynchronously. Until it
finishes, `status` is `DOCUMENTS_NOT_YET_PROCESSED` and `signingUrls()` throws `NotFoundException`
(`AGREEMENT_NOT_EXPOSED` or `AGREEMENT_NOT_SIGNABLE`). Even once the status reads `OUT_FOR_SIGNATURE`,
the participant data can lag for a moment. Retry after a few seconds.

All agreement methods: `create`, `get`, `status`, `all`, `update`, `updateState`, `cancel`, `copy`, `members`,
`sendReminder`, `reminders`, `signingUrls`, `signingUrlFor`, `views`, `documents`, `document`, `combinedDocument`,
`combinedDocumentUrl`, `auditTrail`, `formData`, `formFields`, `events`.

## Downloading signed documents

Binary endpoints return a [PSR-7 stream](https://www.php-fig.org/psr/psr-7/), so files of any size can
go straight to disk, cloud storage, or the browser without being loaded into memory:

```php
$pdf = $sign->agreements()->combinedDocument($agreementId, attachAuditReport: true);

// To a file, in chunks
$out = fopen("/var/app/agreements/$agreementId.pdf", 'wb');
while (!$pdf->eof()) {
    fwrite($out, $pdf->read(65536));
}
fclose($out);

// Or hand the underlying resource to anything that accepts one (Flysystem, Laravel Storage, S3 SDK...)
$filesystem->writeStream("agreements/$agreementId.pdf", $pdf->detach());
```

| Method | Returns |
| --- | --- |
| `combinedDocument($id, attachAuditReport: true)` | every document merged into one PDF, optionally with the audit report |
| `auditTrail($id)` | the audit report PDF on its own |
| `document($id, $documentId)` | one original document (ids from `documents($id)`) |
| `combinedDocumentUrl($id)` | a short-lived download URL instead of the bytes |
| `formData($id)` | CSV of the values signers entered |

## Webhooks

Webhooks let Adobe tell you when something happens (sent, viewed, signed, declined, completed)
instead of you polling.

### Subscribe

```php
use Conceptlz\AdobeSign\Builder\WebhookInfo;
use Conceptlz\AdobeSign\Webhook\EventType;

$sign->webhooks()->create(
    WebhookInfo::forAgreement('Contract sync', 'https://app.example.com/adobe-sign/webhook', $agreementId)
        ->events(EventType::AGREEMENT_ALL)
        ->agreementPayload(participants: true),      // what the payload should include
);
```

There are also `forAccount()`, `forGroup()`, `forUser()` and `forResource()` variants.

Adobe recommends **one webhook per agreement** over one account-wide webhook. If deliveries to a
webhook keep failing, Adobe stops it, so with one webhook per agreement a failure only affects that
agreement.

### Receive

Adobe's rules (the handler implements all of them):

1. **Verification.** On creation, Adobe sends a `GET` with an `X-AdobeSign-ClientId` header. You must
   answer 2xx and echo that value, otherwise the webhook isn't created.
2. **Every notification.** Each `POST` needs the same echo within **5 seconds**. Without it, Adobe
   retries with growing intervals for **72 hours**, then disables the webhook.
3. **No signature.** Payloads aren't signed. The handler only accepts allowlisted client ids. Treat
   payload content as a hint and confirm with the API before acting on it.

```php
use Conceptlz\AdobeSign\Webhook\{WebhookHandler, AgreementEvent};

$handler = new WebhookHandler([$yourClientId]);

// PSR-7 (Slim, Mezzio, Symfony with the PSR bridge, ...)
$result = $handler->handle($serverRequest, $responseFactory, $streamFactory);
if ($result->event instanceof AgreementEvent && $result->event->isWorkflowCompleted()) {
    $queue->push(['download', $result->event->agreementId()]);    // do slow work later
}
return $result->response;                                          // carries the echo

// Plain PHP
$clientId = $handler->verifyClientId($_SERVER['HTTP_X_ADOBESIGN_CLIENTID'] ?? null);
foreach ($handler->acknowledgementHeaders($clientId) as $name => $value) {
    header("$name: $value");
}
echo $handler->acknowledgementBody($clientId);
$event = $_SERVER['REQUEST_METHOD'] === 'POST' ? $handler->parse(file_get_contents('php://input')) : null;
```

- **Event classes.** Events come back as `AgreementEvent`, `MegaSignEvent`, `WidgetEvent`,
  `LibraryDocumentEvent`, or `UnknownEvent` for event types Adobe adds later. They're returned to
  you, never dispatched.
- **Event fields.** Useful ones include `$event->event` (compare with `EventType::*`), `notificationId`
  (use it to drop retried duplicates), `actingUserEmail`, `participantUserEmail` and `eventDate`.
  `resource()` holds the payload's agreement, web form, etc.
- **Testing locally.** Adobe only calls public HTTPS URLs, so use a tunnel such as `ngrok` or
  `cloudflared`. A complete receiver is in [`examples/webhook-receiver.php`](examples/webhook-receiver.php).

## Other resources

| Accessor | What it is | Operations |
| --- | --- | --- |
| `libraryDocuments()` | reusable templates | `all`, `get`, `create`, `update`, `updateState`, `documents`, `document`, `combinedDocument`, `auditTrail`, `formFields`, `members`, `events` |
| `widgets()` | web forms (public signing links) | `all`, `get`, `create`, `update`, `updateState`, `agreements`, `documents`, `members`, `formFields`, `events`, `formData`, `combinedDocument`, `auditTrail` |
| `megaSigns()` | Send in Bulk | `all`, `get`, `create`, `updateState`, `cancel`, `agreements`, `sendReminder`, `members`, `events`, `formData`, `combinedDocument`, `errorReport` |
| `users()` | account users | `all`, `get`, `me`, `create`, `update`, `groups`, `updateState`, `events` |
| `webhooks()` | webhook subscriptions | `all`, `get`, `create`, `update`, `updateState`, `delete` |

- **Lists** (`all()`, `agreements()`, `events()` on users) are generators: pages are fetched only as you iterate.
- **Return values** are typed generated models.
- **`create()` and `update()`** accept a generated model or a raw array.

## Errors

Every exception implements `Conceptlz\AdobeSign\Exception\AdobeSignException`. API errors carry
`$statusCode`, Adobe's `$errorCode` (e.g. `INVALID_AGREEMENT_ID`), and the response.

| Exception | When |
| --- | --- |
| `AuthenticationException` | 401: bad or expired key/token, invalid `x-api-user` |
| `OAuthException` (extends the above) | OAuth denied, state mismatch, dead refresh token: re-authorize |
| `NotFoundException` | 404: unknown id, deleted resource, `AGREEMENT_NOT_SIGNABLE` |
| `ValidationException` | 400/415: invalid payload or parameters |
| `RateLimitException` | 429 after retries; `$retryAfter` says how long to wait |
| `PreconditionFailedException` | 412: stale ETag; fetch the resource again and retry |
| `ApiException` | any other API error (403 `PERMISSION_DENIED`, 5xx, ...), or a reply the SDK can't read (invalid JSON) |
| `TransportException` | no response at all: network, DNS, TLS |
| `InvalidArgumentException` | rejected locally before sending: bad email, signing-order gap, missing file |
| `WebhookException` | inbound webhook rejected (unknown client id, unreadable body) |

```php
use Conceptlz\AdobeSign\Exception\{AdobeSignException, NotFoundException, RateLimitException};

try {
    $sign->agreements()->get($id);
} catch (NotFoundException $e) {
    // $e->errorCode: INVALID_AGREEMENT_ID, AGREEMENT_DELETED, ...
} catch (RateLimitException $e) {
    // retry in $e->retryAfter seconds
} catch (AdobeSignException $e) {
    // anything else from the SDK
}
```

Exceptions never contain your token: the stored request's `Authorization` header is replaced with
`Bearer ***`.

## Configuration

Every collaborator is optional and can be injected:

```php
use Conceptlz\AdobeSign\{AdobeSign, ClientOptions};

$sign = new AdobeSign(
    $tokenProvider,             // IntegrationKeyTokenProvider, OAuthTokenProvider, or your own TokenProvider
    httpClient: $psr18Client,   // default: auto-discovered
    requestFactory: $psr17,
    streamFactory: $psr17,
    cache: $psr16Cache,         // caches the account's data center; default: in-process only
    logger: $psr3Logger,        // method, path, status, duration; never headers or bodies
    options: new ClientOptions(maxRetries: 5),
);
```

| `ClientOptions` | Default | Meaning |
| --- | --- | --- |
| `bootstrapUrl` | `https://api.adobesign.com` | host used only for `GET /baseUris`; change for Gov Cloud |
| `baseUriTtl` | `86400` | seconds to cache the discovered data center |
| `maxRetries` | `3` | retries for 429/503 before `RateLimitException` |
| `retryBaseDelay` | `1.0` | base seconds for exponential backoff when Adobe gives no `Retry-After` |
| `maxRetryDelay` | `60.0` | never wait longer than this per retry; a longer `Retry-After` fails fast |
| `autoEtag` | `true` | send `If-Match` on updates using the ETag from the last `get()` |
| `userAgent` | `conceptlz-adobe-sign-php/<version>` | |

**How the SDK behaves:**
- **Data centers.** Acrobat Sign accounts live on different data centers ("shards"). The SDK looks
  yours up with `GET /baseUris` and caches it (use a shared PSR-16 cache in production). If the
  account moves, the API answers `403 INVALID_API_ACCESS_POINT`; the SDK then looks the data center
  up again, once.
- **Rate limits.** Retries follow `Retry-After` (in seconds or as an HTTP date), or the "try again
  in N seconds" text in Adobe's error message, or else exponential backoff with jitter.

## Generated models

`Conceptlz\AdobeSign\Generated\Model` holds 313 classes generated from Adobe's spec (`spec/adobe-sign-v6.json`).
They're plain PHP with getters and setters and no runtime dependencies. Resources return them
directly, and `Hydration\ModelMapper` converts between them and arrays:

```php
use Conceptlz\AdobeSign\Hydration\ModelMapper;
use Conceptlz\AdobeSign\Generated\Model\FetchedAgreementInfo;

$model = ModelMapper::hydrate(FetchedAgreementInfo::class, $array);
$array = ModelMapper::toArray($model);    // only fields that were set
```

Fields Adobe adds later are ignored, not fatal. Status and enum values are plain strings, because
Adobe adds new values without a version change.

## Testing your integration

Inject a mock PSR-18 client, for example
[`php-http/mock-client`](https://github.com/php-http/mock-client), and queue the responses:

```php
$http = new Http\Mock\Client();
$http->addResponse(new Nyholm\Psr7\Response(200, ['Content-Type' => 'application/json'],
    '{"apiAccessPoint":"https://api.na1.adobesign.com/","webAccessPoint":"https://secure.na1.adobesign.com/"}'));
$http->addResponse(new Nyholm\Psr7\Response(200, ['Content-Type' => 'application/json'], '{"id":"agr-1"}'));

$sign = AdobeSign::withIntegrationKey('test', httpClient: $http);
$sign->agreements()->create($info);

$sent = $http->getRequests()[1];    // assert on what was sent
```

The first request a fresh client sends is always `GET /baseUris`. To skip it, share a PSR-16 cache
that already holds the data center, or use an OAuth token, which carries its own.

## Examples

| File | What it shows |
| --- | --- |
| [`examples/send-agreement.php`](examples/send-agreement.php) | upload, create, status, reminder, download (`--dry-run` works offline) |
| [`examples/live-lifecycle.php`](examples/live-lifecycle.php) | the full flow against a real account: signing order, wait for signatures, save the signed PDF |
| [`examples/webhook-receiver.php`](examples/webhook-receiver.php) | a webhook endpoint in plain PHP |
| [`examples/oauth-server.php`](examples/oauth-server.php) | OAuth connect, refresh and revoke with PHP's built-in server |

## License

MIT. See [LICENSE](LICENSE).
