# conceptlz/adobe-sign

Framework-agnostic PHP 8.1+ SDK for the Adobe Acrobat Sign REST API v6.
Depends only on PSR interfaces (PSR-18/17/7, PSR-3, PSR-16) plus `php-http/discovery`.

```bash
composer require conceptlz/adobe-sign symfony/http-client nyholm/psr7
```

## Quick start

```php
use Conceptlz\AdobeSign\AdobeSign;
use Conceptlz\AdobeSign\Builder\{AgreementInfo, FileInfo, ParticipantSetInfo};

$sign = AdobeSign::withIntegrationKey(getenv('ADOBE_SIGN_INTEGRATION_KEY'));

$docId = $sign->transientDocuments()->upload('/path/contract.pdf');

$agreementId = $sign->agreements()->create(
    AgreementInfo::create('Mutual NDA')
        ->file(FileInfo::transientDocument($docId))
        ->participantSet(ParticipantSetInfo::signer('jane@example.com'))
        ->message('Please sign'),
);

$sign->agreements()->status($agreementId);          // "OUT_FOR_SIGNATURE"
$sign->agreements()->sendReminder($agreementId);    // everyone whose turn it is
$sign->agreements()->signingUrlFor($agreementId, 'jane@example.com'); // embedded signing link
$sign->agreements()->cancel($agreementId, 'Sent to the wrong person');
$pdf = $sign->agreements()->combinedDocument($agreementId); // PSR-7 stream

foreach ($sign->agreements()->all() as $summary) {  // lazy cursor pagination
    echo $summary->id, ' ', $summary->status, PHP_EOL;
}

$sign->asUser('ops@example.com')->agreements()->get($agreementId); // x-api-user
```

Every collaborator is optional and injectable:

```php
new AdobeSign(
    $tokenProvider,
    httpClient: $psr18, requestFactory: $psr17, streamFactory: $psr17,
    cache: $psr16,      // caches the discovered shard; defaults to in-process
    logger: $psr3,      // never logs headers or bodies
    options: new ClientOptions(maxRetries: 5),
);
```

## Resources

| Accessor | Operations | Returns |
| --- | --- | --- |
| `agreements()` | create, get, status, all, update, updateState, cancel, copy, signingUrls, signingUrlFor, views, members, sendReminder, reminders, documents, document, combinedDocument, combinedDocumentUrl, auditTrail, formData (CSV), formFields, events | hand-written `Agreement` (`->details()` for the full model), generated models / streams |
| `transientDocuments()` | upload | id |
| `libraryDocuments()` | all, get, create, update, updateState, documents, document, combinedDocument, auditTrail, formFields, members, events | generated models / streams |
| `users()` | all, get, me, create, update, groups, updateState, events | generated models |
| `widgets()` (web forms) | all, get, create, update, updateState, agreements, documents, members, formFields, events, formData (CSV), combinedDocument, auditTrail | generated models / streams |
| `megaSigns()` (Send in Bulk) | all, get, create, updateState, cancel, agreements, sendReminder, members, events, formData (CSV), combinedDocument, errorReport | generated models / streams |
| `webhooks()` | all, get, create, update, updateState, delete | generated models |

`all()` and other lists are lazy generators. `create()`/`update()` take a builder, a generated
model, or a raw array. Fetch with `get()` before `update()`/`delete()` and If-Match is sent for you.

## Webhooks

```php
use Conceptlz\AdobeSign\Builder\WebhookInfo;
use Conceptlz\AdobeSign\Webhook\{EventType, WebhookHandler, AgreementEvent};

// Subscribe (Adobe recommends one webhook per agreement)
$sign->webhooks()->create(
    WebhookInfo::forAgreement('Status sync', 'https://app.example.com/adobe/webhook', $agreementId)
        ->events(EventType::AGREEMENT_ALL)
        ->agreementPayload(participants: true),
);

// Receive (PSR-7); events are returned, never dispatched
$result = (new WebhookHandler([$clientId]))->handle($request, $psr17, $psr17);
if ($result->event instanceof AgreementEvent && $result->event->isWorkflowCompleted()) {
    $queue->push($result->event->agreementId());
}
return $result->response; // carries the X-AdobeSign-ClientId echo
```

- Adobe sends `X-AdobeSign-ClientId` on the verification GET and on every POST. Without a 2xx and the
  echo within 5 seconds it retries for 72 hours, then disables the webhook. Acknowledge, then queue the work.
- Payloads are not signed. The handler only accepts allowlisted client ids; account-level mutual TLS
  is available on top. Re-fetch the resource via the API before acting on payload contents.
- `notificationId` is unique per notification: use it to drop retried duplicates.
- Plain-PHP receiver: `examples/webhook-receiver.php`.

## OAuth (authorization code + refresh)

```php
use Conceptlz\AdobeSign\Auth\{OAuthClient, OAuthConfig};

$oauth = new OAuthClient(new OAuthConfig($clientId, $clientSecret, 'https://app.example.com/adobe/callback'));

// 1. Send the user to Adobe
$_SESSION['state'] = OAuthClient::generateState();
redirect($oauth->authorizationUrl(['user_login:self', 'agreement_write:account'], $_SESSION['state']));

// 2. On the callback: checks state, exchanges the code on the user's shard
$tokenStore->put($userId, $oauth->handleCallback($_GET, $_SESSION['state']));

// 3. Later: tokens refresh themselves (60s before expiry, or after a 401)
$sign = AdobeSign::withOAuth($oauth, $tokenStore, $userId);
```

- `TokenStore` is two methods (`get`/`put`); `InMemoryTokenStore` ships, persist to your DB for real use.
- The token carries `api_access_point`, so OAuth clients skip `GET /baseUris` entirely.
- An `api_access_point` from the callback query string is checked (HTTPS, `adobesign.com` / `echosign.com` /
  `adobesigngov.us`, configurable) before the client secret is sent to it.
- A dead refresh token (60 days unused, or revoked) raises `OAuthException` (an `AuthenticationException`): re-authorize.
- `$oauth->revoke($token)` revokes the access/refresh pair.
- Runnable demo: `php -S localhost:8080 examples/oauth-server.php`

## Behaviour

| Concern | How |
| --- | --- |
| Data center | `GET /baseUris` on `https://api.adobesign.com` (configurable), `apiAccessPoint` cached via PSR-16. A `403 INVALID_API_ACCESS_POINT` drops the cache and rediscovers once. Non-HTTPS access points are refused. |
| Throttling | 429/503 retried with `Retry-After` (seconds or HTTP-date), else the "try again in N seconds" message, else exponential backoff with jitter. A wait longer than `maxRetryDelay` fails fast with `RateLimitException::$retryAfter`. |
| ETags | ETags from GETs are replayed as `If-Match` on PUT/DELETE to the same resource or its sub-resources (e.g. `/agreements/{id}/state`). A stale one raises `PreconditionFailedException`. |
| Errors | Exceptions redact the `Authorization` header. Adobe `code` first, HTTP status second: `AuthenticationException`, `NotFoundException`, `RateLimitException`, `ValidationException`, `PreconditionFailedException`, else `ApiException`. All implement `AdobeSignException`. |

## Layout

- `src/Builder`: fluent request builders (hand-written)
- `src/Model`: small hand-written response objects (`Agreement`, `AgreementSummary`, ...)
- `src/Generated/Model`: 313 spec-complete models generated by Jane. Never edit by hand
- `src/Hydration/ModelMapper`: arrays <-> generated models (replaces Jane's Symfony-based normalizers)

The hand-written objects expose the generated ones when you need every field:

```php
$sign->agreements()->get($id)->details();      // Generated\Model\FetchedAgreementInfo
$model = AgreementInfo::create('NDA')->...->toModel();   // Generated\Model\AgreementCreationInfo
$model->setFirstReminderDelay(24);
$sign->agreements()->create($model);
```

## Development

```bash
composer install
composer test
php examples/send-agreement.php --dry-run
```
