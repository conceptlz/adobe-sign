<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Tests\TestCase;

final class AsUserTest extends TestCase
{
    public function test_sends_x_api_user_only_on_the_scoped_client(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement');
        $this->queue(200, 'agreement');

        $sign = $this->client();
        $sign->asUser('jane@example.com')->agreements()->get('agr-1');
        $sign->agreements()->get('agr-1');

        self::assertSame('email:jane@example.com', $this->request(1)->getHeaderLine('x-api-user'));
        self::assertFalse($this->request(2)->hasHeader('x-api-user'), 'original client is untouched');
        self::assertFalse($this->request(0)->hasHeader('x-api-user'), 'baseUris discovery is account-level');
    }

    public function test_prefixes(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement');
        $this->queue(200, 'agreement');

        $sign = $this->client();
        $sign->asUser('CBJCHBCAABAAuser')->agreements()->get('a');
        $sign->asUser('email:ops@example.com')->agreements()->get('a');

        self::assertSame('userid:CBJCHBCAABAAuser', $this->request(1)->getHeaderLine('x-api-user'));
        self::assertSame('email:ops@example.com', $this->request(2)->getHeaderLine('x-api-user'));
    }
}
