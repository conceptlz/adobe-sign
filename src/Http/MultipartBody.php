<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Http;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Streams a multipart/form-data body into php://temp, which spills to disk past 2 MB,
 * so uploading a large PDF never holds the whole file in memory.
 *
 * @internal Used by TransientDocuments::upload().
 */
final class MultipartBody
{
    private const CHUNK = 65536;

    /** Part delimiter; random unless given, so it cannot collide with file contents in practice. */
    public readonly string $boundary;

    /** @var list<array{name: string, value: string|StreamInterface, filename: ?string, contentType: ?string}> */
    private array $parts = [];

    /**
     * @param string|null $boundary fixed boundary for reproducible output; random when null
     */
    public function __construct(?string $boundary = null)
    {
        $this->boundary = $boundary ?? 'adobesign-' . bin2hex(random_bytes(16));
    }

    /** Add a plain text part. */
    public function addField(string $name, string $value): self
    {
        $this->parts[] = ['name' => $name, 'value' => $value, 'filename' => null, 'contentType' => null];

        return $this;
    }

    /**
     * Add a file part; the stream is copied in build(), not now.
     *
     * @param string|null $contentType defaults to application/octet-stream
     */
    public function addFile(string $name, StreamInterface $file, string $filename, ?string $contentType = null): self
    {
        $this->parts[] = ['name' => $name, 'value' => $file, 'filename' => $filename, 'contentType' => $contentType];

        return $this;
    }

    /** The Content-Type header value, including the boundary. */
    public function contentType(): string
    {
        return 'multipart/form-data; boundary=' . $this->boundary;
    }

    /**
     * Write all parts to a temp stream, rewound and ready to send.
     *
     * @throws \RuntimeException when php://temp cannot be opened
     */
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

    /** Make a name safe inside a quoted Content-Disposition parameter. */
    private static function quote(string $value): string
    {
        return str_replace(['"', "\r", "\n"], ['%22', '', ''], $value);
    }
}
