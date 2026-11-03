<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Streams a multipart/form-data body into php://temp, which spills to disk past 2 MB,
 * so uploading a large PDF never holds the whole file in memory.
 */
final class MultipartBody
{
    private const CHUNK = 65536;

    public readonly string $boundary;

    /** @var list<array{name: string, value: string|StreamInterface, filename: ?string, contentType: ?string}> */
    private array $parts = [];

    public function __construct(?string $boundary = null)
    {
        $this->boundary = $boundary ?? 'adobesign-' . bin2hex(random_bytes(16));
    }

    public function addField(string $name, string $value): self
    {
        $this->parts[] = ['name' => $name, 'value' => $value, 'filename' => null, 'contentType' => null];

        return $this;
    }

    public function addFile(string $name, StreamInterface $file, string $filename, ?string $contentType = null): self
    {
        $this->parts[] = ['name' => $name, 'value' => $file, 'filename' => $filename, 'contentType' => $contentType];

        return $this;
    }

    public function contentType(): string
    {
        return 'multipart/form-data; boundary=' . $this->boundary;
    }

    public function build(StreamFactoryInterface $streams): StreamInterface
    {
        $out = fopen('php://temp', 'w+b');
        if ($out === false) {
            throw new \RuntimeException('Unable to open php://temp for multipart body.');
        }

        foreach ($this->parts as $part) {
            $disposition = sprintf('form-data; name="%s"', self::quote($part['name']));
            if ($part['filename'] !== null) {
                $disposition .= sprintf('; filename="%s"', self::quote($part['filename']));
            }

            fwrite($out, "--{$this->boundary}\r\nContent-Disposition: {$disposition}\r\n");
            if ($part['filename'] !== null) {
                fwrite($out, 'Content-Type: ' . ($part['contentType'] ?? 'application/octet-stream') . "\r\n");
            }
            fwrite($out, "\r\n");

            $value = $part['value'];
            if ($value instanceof StreamInterface) {
                if ($value->isSeekable()) {
                    $value->rewind();
                }
                while (!$value->eof()) {
                    fwrite($out, $value->read(self::CHUNK));
                }
            } else {
                fwrite($out, $value);
            }
            fwrite($out, "\r\n");
        }

        fwrite($out, "--{$this->boundary}--\r\n");
        rewind($out);

        return $streams->createStreamFromResource($out);
    }

    private static function quote(string $value): string
    {
        return str_replace(['"', "\r", "\n"], ['%22', '', ''], $value);
    }
}
