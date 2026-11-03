<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Builder;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;

/**
 * One document of an agreement. Serialises to the spec's AgreementFileInfo:
 * exactly one of transientDocumentId, libraryDocumentId or urlFileInfo.
 */
final class FileInfo
{
    /** @param array<string, mixed> $source */
    private function __construct(
        private readonly array $source,
        private ?string $label = null,
    ) {
    }

    public static function transientDocument(string $transientDocumentId): self
    {
        return new self(['transientDocumentId' => self::nonEmpty($transientDocumentId, 'transientDocumentId')]);
    }

    public static function libraryDocument(string $libraryDocumentId): self
    {
        return new self(['libraryDocumentId' => self::nonEmpty($libraryDocumentId, 'libraryDocumentId')]);
    }

    /**
     * A document Adobe fetches itself from a public URL.
     */
    public static function url(string $url, string $name, string $mimeType = 'application/pdf'): self
    {
        return new self(['urlFileInfo' => [
            'url' => self::nonEmpty($url, 'url'),
            'name' => self::nonEmpty($name, 'name'),
            'mimeType' => $mimeType,
        ]]);
    }

    /**
     * Label used to reference this file from form field templates.
     */
    public function label(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return $this->source + array_filter(['label' => $this->label], static fn ($v) => $v !== null);
    }

    private static function nonEmpty(string $value, string $field): string
    {
        if (trim($value) === '') {
            throw new InvalidArgumentException("FileInfo $field must not be empty.");
        }

        return $value;
    }
}
