# conceptlz/adobe-sign (core)

Framework-agnostic core of the SDK. Read the monorepo root `CLAUDE.md` first: it has the commands,
hard rules, architecture and the list of real-API quirks.

## Layout

| Path | Contents |
| --- | --- |
| `src/AdobeSign.php` | Client entry point and `VERSION`; resource accessors; `asUser()` |
| `src/ClientOptions.php` | Retries, base-URI TTL, auto-ETag, user agent, default signature level |
| `src/Auth`, `src/BaseUri` | Token providers and stores, OAuth client, data-center discovery |
| `src/Http` | `Transport`, `Pipeline`, middleware (retry, ETag, user agent), multipart |
| `src/Resource` | One class per API area; `AbstractResource` holds the shared helpers |
| `src/Builder` | Fluent request builders that validate before sending |
| `src/Model` | Hand-written result models (`Agreement`, `SignatureEvidence`, `SignerEvidence`, ...) |
| `src/Generated` | Generated models. **Do not edit**; run `composer generate` from the root |
| `src/Exception` | Typed exceptions + `ErrorMapper` |
| `src/Webhook` | `WebhookHandler`, typed events, `EventType` |
| `spec/` | Adobe's v6 spec (`adobe-sign-v6.json`) and `normalize.php` (spec fixes) |
| `examples/` | Runnable scripts: `send-agreement.php`, `live-lifecycle.php`, `oauth-server.php`, `webhook-receiver.php` |
| `tests/Unit`, `tests/Scenario` | Mocked-HTTP tests, spec-validated |
| `tests/Live` | Opt-in tests against a real account (`composer test:live`) |
| `tests/Fixtures` | Canned JSON responses and `live-test.pdf` |

## Adding or changing an endpoint

1. Find the operation in `spec/adobe-sign-v6.json` (path, parameters, request/response schema names).
2. Add a method to the matching `src/Resource/*` class. Use the `AbstractResource` helpers rather than
   `Transport` directly:
   - `fetch(Model::class, $path, $query)`: GET → generated model.
   - `paginate($path, $query, $itemsKey, Item::class)`: cursor pagination as a `\Generator`.
   - `createResource($path, $payload)`: POST that returns an id.
   - `postFor(Model::class, $path, $payload)`, `put($path, $payload)`.
   - `download($path, $query)`: binary → PSR-7 stream.
   - `self::path('agreements', $id, 'members')`: encodes ids and rejects empty ones.
3. Docblock: first line is the endpoint (`GET /agreements/{agreementId}/members`), then only what a caller
   needs (non-obvious behaviour, the specific exceptions this method throws). The common exceptions are
   documented once on `AbstractResource`.
4. Accept both the generated model and an array for payloads (`WidgetInfo|array $info`).
5. Test in `tests/Unit` using `TestCase`:
   `queueBaseUris()`, `queue($status, 'fixture_name' | '{"json":...}', $headers)`, then call
   `$this->client()->...` and assert on `$this->request($i)` / `self::jsonBody(...)`. The spec contract is
   checked automatically after each test.
6. If the live API disagrees with the spec, keep the spec-shaped path working, accept the real shape too,
   add a fixture with the real shape, and note it in the root `CLAUDE.md` quirks list.

## Conventions

- `declare(strict_types=1)`, `final` classes, readonly promoted properties, named arguments where they
  help readability.
- Validation errors from the caller → `Exception\InvalidArgumentException`, thrown before any HTTP call.
- No new runtime dependencies beyond PSR packages and php-http/discovery (`ArchitectureTest` enforces it).
- Time comes from PSR-20 (`ClockInterface`), sleeping from `Http\Sleeper`; tests use `FrozenClock` and
  `FakeSleeper`, so tests never really wait.
- Mark anything callers shouldn't construct as `@internal`.
- Keep the README section for a feature in step with the code; the README is the user documentation.

## Signature-level code paths

- `Enum\SignatureLevel`: `SES`, `AES`, `QES`; `requiresDigitalSignature()`, `satisfies()`.
- `Builder\AgreementInfo::toArray($defaultLevel)` applies the level to each signer set and rejects
  impossible combinations (written signatures with a digital level, a level with no signer).
- `Builder\ParticipantSetInfo::signatureLevel()` is allowed for signers only.
- `Resource\Agreements::signatureEvidence()` joins members (requested level, identity check) with
  events (`ACTION_COMPLETED*` or `DIGSIGNED`, `digitalSignatureInfo`) into `Model\SignatureEvidence`.
