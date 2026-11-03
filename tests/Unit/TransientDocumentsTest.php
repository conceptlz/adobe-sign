<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Tests\TestCase;

final class TransientDocumentsTest extends TestCase
{
    public function test_uploads_file_from_path_as_multipart(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'transient_document');

        $id = $this->client()->transientDocuments()->upload(self::fixturePath('sample.pdf'));

        self::assertSame(self::fixture('transient_document')['transientDocumentId'], $id);

        $request = $this->request(1);
        self::assertSame('POST', $request->getMethod());
        self::assertSame(self::API . '/transientDocuments', (string) $request->getUri());
        self::assertMatchesRegularExpression('#^multipart/form-data; boundary=(\S+)$#', $request->getHeaderLine('Content-Type'));

        preg_match('#boundary=(\S+)#', $request->getHeaderLine('Content-Type'), $m);
        $boundary = $m[1];
        $body = (string) $request->getBody();
        $pdf = (string) file_get_contents(self::fixturePath('sample.pdf'));

        self::assertStringContainsString("--$boundary\r\nContent-Disposition: form-data; name=\"File-Name\"\r\n\r\nsample.pdf\r\n", $body);
        self::assertStringContainsString(
            "--$boundary\r\nContent-Disposition: form-data; name=\"File\"; filename=\"sample.pdf\"\r\nContent-Type: application/octet-stream\r\n\r\n$pdf\r\n",
            $body,
        );
        self::assertStringEndsWith("--$boundary--\r\n", $body);
        self::assertStringNotContainsString('Mime-Type', $body, 'Mime-Type is optional; Adobe infers it from File-Name');
    }

    public function test_upload_from_stream_with_explicit_name_and_mime_type(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'transient_document');

        $stream = $this->psr17->createStream('%PDF-1.4 tiny');
        $this->client()->transientDocuments()->upload($stream, 'contract "v2".pdf', 'application/pdf');

        $body = (string) $this->request(1)->getBody();
        self::assertStringContainsString("name=\"Mime-Type\"\r\n\r\napplication/pdf\r\n", $body);
        self::assertStringContainsString('filename="contract %22v2%22.pdf"', $body, 'quotes are escaped in the header');
        self::assertStringContainsString("Content-Type: application/pdf\r\n\r\n%PDF-1.4 tiny\r\n", $body);
    }

    public function test_stream_upload_requires_file_name(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->client()->transientDocuments()->upload($this->psr17->createStream('x'));
    }

    public function test_missing_file_is_rejected_before_any_request(): void
    {
        try {
            $this->client()->transientDocuments()->upload('/nope/missing.pdf');
            self::fail('Expected InvalidArgumentException');
        } catch (InvalidArgumentException) {
            self::assertSame([], $this->requests());
        }
    }
}
