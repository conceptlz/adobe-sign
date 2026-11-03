<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Builder;

use Conceptlz\AdobeSign\Enum\AgreementState;
use Conceptlz\AdobeSign\Enum\ReminderFrequency;
use Conceptlz\AdobeSign\Enum\SignatureType;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Generated\Model\AgreementCreationInfo;
use Conceptlz\AdobeSign\Hydration\ModelMapper;

/**
 * Fluent builder for POST /agreements. Serialises to the spec's AgreementCreationInfo
 * (required: fileInfos, name, participantSetsInfo, signatureType, state).
 *
 *     AgreementInfo::create('NDA')
 *         ->file(FileInfo::transientDocument($id))
 *         ->participantSet(ParticipantSetInfo::signer('jane@example.com'))
 *         ->message('Please sign');
 *
 * signatureType defaults to ESIGN and state to IN_PROCESS (send now).
 */
final class AgreementInfo
{
    /** @var list<FileInfo> */
    private array $files = [];

    /** @var list<ParticipantSetInfo> */
    private array $participantSets = [];

    /** @var list<string> */
    private array $ccs = [];

    private string $signatureType = 'ESIGN';

    private string $state = 'IN_PROCESS';

    private ?string $message = null;

    private ?string $externalId = null;

    private ?string $reminderFrequency = null;

    private ?\DateTimeInterface $expirationTime = null;

    private ?string $locale = null;

    /** @var array<string, mixed> */
    private array $extra = [];

    private function __construct(private readonly string $name)
    {
        if (trim($name) === '') {
            throw new InvalidArgumentException('Agreement name must not be empty.');
        }
    }

    public static function create(string $name): self
    {
        return new self($name);
    }

    /**
     * @param FileInfo|string $file a string is treated as a transientDocumentId
     */
    public function file(FileInfo|string $file): self
    {
        $this->files[] = is_string($file) ? FileInfo::transientDocument($file) : $file;

        return $this;
    }

    public function participantSet(ParticipantSetInfo $set): self
    {
        $this->participantSets[] = $set;

        return $this;
    }

    /**
     * Shortcut: add one signer set per email, signing in the given sequence.
     */
    public function signers(string ...$emails): self
    {
        foreach ($emails as $email) {
            $this->participantSet(ParticipantSetInfo::signer($email));
        }

        return $this;
    }

    public function cc(string ...$emails): self
    {
        foreach ($emails as $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                throw new InvalidArgumentException(sprintf('"%s" is not a valid CC email.', $email));
            }
            $this->ccs[] = $email;
        }

        return $this;
    }

    public function signatureType(SignatureType|string $type): self
    {
        $this->signatureType = $type instanceof SignatureType ? $type->value : $type;

        return $this;
    }

    public function state(AgreementState|string $state): self
    {
        $this->state = $state instanceof AgreementState ? $state->value : $state;

        return $this;
    }

    public function message(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Your own identifier for the agreement; searchable via GET /agreements?externalId=.
     */
    public function externalId(string $id): self
    {
        $this->externalId = $id;

        return $this;
    }

    public function reminderFrequency(ReminderFrequency|string $frequency): self
    {
        $this->reminderFrequency = $frequency instanceof ReminderFrequency ? $frequency->value : $frequency;

        return $this;
    }

    public function expiresAt(\DateTimeInterface $at): self
    {
        $this->expirationTime = $at;

        return $this;
    }

    public function locale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Raw AgreementCreationInfo fields this builder doesn't model (e.g. emailOption,
     * securityOption, postSignOption). Merged last, so it can also override.
     *
     * @param array<string, mixed> $fields
     */
    public function with(array $fields): self
    {
        $this->extra = array_replace($this->extra, $fields);

        return $this;
    }

    /**
     * The same payload as the generated model, e.g. to tweak fields the builder doesn't cover.
     */
    public function toModel(): AgreementCreationInfo
    {
        return ModelMapper::hydrate(AgreementCreationInfo::class, $this->toArray());
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        if ($this->files === []) {
            throw new InvalidArgumentException('An agreement needs at least one file.');
        }
        if ($this->participantSets === []) {
            throw new InvalidArgumentException('An agreement needs at least one participant set.');
        }

        $sets = [];
        $next = 1;
        foreach ($this->participantSets as $set) {
            $sets[] = $set->toArray($next);
            $next = ($set->getOrder() ?? $next) + 1;
        }

        $data = array_filter([
            'name' => $this->name,
            'fileInfos' => array_map(static fn (FileInfo $f) => $f->toArray(), $this->files),
            'participantSetsInfo' => $sets,
            'signatureType' => $this->signatureType,
            'state' => $this->state,
            'message' => $this->message,
            'externalId' => $this->externalId !== null ? ['id' => $this->externalId] : null,
            'ccs' => $this->ccs !== [] ? array_map(static fn (string $e) => ['email' => $e], $this->ccs) : null,
            'reminderFrequency' => $this->reminderFrequency,
            // Spec: yyyy-MM-dd'T'HH:mm:ssZ, e.g. 2016-02-25T18:46:19Z
            'expirationTime' => $this->expirationTime !== null
                ? \DateTimeImmutable::createFromInterface($this->expirationTime)
                    ->setTimezone(new \DateTimeZone('UTC'))->format('Y-m-d\TH:i:s\Z')
                : null,
            'locale' => $this->locale,
        ], static fn ($v) => $v !== null);

        return array_replace($data, $this->extra);
    }
}
