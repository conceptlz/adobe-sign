<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Live;

use Conceptlz\AdobeSign\Model\AgreementSummary;

/**
 * Read-only: is the key valid, which data center is the account on, does pagination work.
 */
final class ConnectionTest extends LiveTestCase
{
    public function test_key_is_valid_and_data_center_is_discovered(): void
    {
        $me = self::$sign->users()->me();

        self::assertNotEmpty($me->getEmail());
        self::report(sprintf('authenticated as %s (account admin: %s)', $me->getEmail(), $me->getIsAccountAdmin() ? 'yes' : 'no'));

        // First call: GET /baseUris on the shard-agnostic host. Second: /users/me on the account's own shard.
        self::assertMatchesRegularExpression('#^GET api\.adobesign\.com/api/rest/v6/baseUris$#', self::$recorder->calls[0]);
        self::assertMatchesRegularExpression('#^GET api\.[a-z0-9]+\.(adobesign\.com|echosign\.com|adobesigngov\.us)/api/rest/v6/users/me$#', self::$recorder->calls[1]);
        self::report('data center: ' . explode('/', explode(' ', self::$recorder->calls[1])[1])[0]);
    }

    public function test_agreement_list_pages_lazily(): void
    {
        $seen = 0;
        foreach (self::$sign->agreements()->all(pageSize: 5) as $summary) {
            self::assertInstanceOf(AgreementSummary::class, $summary);
            self::assertNotSame('', $summary->id);
            if (++$seen === 7) {
                break; // crosses a page boundary when the account has more than 5 agreements
            }
        }

        $pages = count(array_filter(self::$recorder->calls, static fn (string $c) => str_ends_with($c, '/api/rest/v6/agreements')));
        self::report("listed $seen agreement(s) over $pages page request(s)");
        self::assertGreaterThanOrEqual(1, $pages);
    }
}
