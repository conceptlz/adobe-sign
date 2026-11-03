<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Resource;

use Conceptlz\AdobeSign\Exception\ApiException;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Http\MultipartBody;
use Psr\Http\Message\StreamInterface;

/**
 * POST /transientDocuments: upload a file once, reference it from an agreement within 7 days.
 *
 * Every method that calls the API throws ApiException (or a subclass) on an error response and
 * TransportException on a network failure; see AbstractResource.
 */
final class TransientDocuments extends AbstractResource
{
    /**
     * POST /transientDocuments (multipart). The body is streamed through a temp file, so large
     * PDFs are not held in memory.
     *
     * @param string|resource|StreamInterface|\SplFileInfo $file a path, open stream resource or PSR-7 stream
     * @param string|null $fileName required unless $file is a path/SplFileInfo (max 255 chars)
     * @param string|null $mimeType optional; Adobe infers it from the file name extension otherwise
     * @return string transientDocumentId
     * @throws InvalidArgumentException for an unreadable path, an unsupported $file, or a missing
     *                                  or over-long file name
     */
    public function upload(mixed $file, ?string $fileName = null, ?string $mimeType = null, ?string $groupId = null): string
    {
        [$stream, $defaultName] = $this->open($file);

        $fileName ??= $defaultName;
        if ($fileName === null || $fileName === '') {
            throw new InvalidArgumentException('A file name is required when uploading from a stream.');
        }
        if (mb_strlen($fileName) > 255) {
            throw new InvalidArgumentException('File-Name is limited to 255 characters.');
        }

        // Part names per the v6 spec's multipart/form-data schema.
        $multipart = (new MultipartBody())->addField('File-Name', $fileName);
        if ($mimeType !== null) {
            $multipart->addField('Mime-Type', $mimeType);
        }
        if ($groupId !== null) {
            $multipart->addField('groupId', $groupId);
        }
        $multipart->addFile('File', $stream, $fileName, $mimeType);

        $response = $this->transport->send(
            'POST',
            'transientDocuments',
            headers: ['Content-Type' => $multipart->contentType(), 'Accept' => 'application/json'],
            body: $multipart->build($this->transport->streams()),
        );

        $data = json_decode((string) $response->getBody(), true);
        if (!is_array($data) || !isset($data['transientDocumentId'])) {
            throw new ApiException('Upload response has no transientDocumentId.', $response->getStatusCode(), null, null, $response);
        }

        return (string) $data['transientDocumentId'];
    }

    /**
     * @return array{0: StreamInterface, 1: ?string}
     */
    private function open(mixed $file): array
    {
        $streams = $this->transport->streams();

        if ($file instanceof StreamInterface) {
            return [$file, null];
        }

        if (is_resource($file)) {
            $meta = stream_get_meta_data($file);
            $name = isset($meta['uri']) && is_file($meta['uri']) ? basename($meta['uri']) : null;

            return [$streams->createStreamFromResource($file), $name];
        }

        if ($file instanceof \SplFileInfo) {
            $file = $file->getPathname();
        }

        if (is_string($file)) {
            if (!is_file($file) || !is_readable($file)) {
                throw new InvalidArgumentException(sprintf('File "%s" does not exist or is not readable.', $file));
            }

            return [$streams->createStreamFromFile($file, 'rb'), basename($file)];
        }

        throw new InvalidArgumentException('upload() expects a path, SplFileInfo, stream resource or PSR-7 stream.');
    }
}
