<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Support;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Wraps the mock HTTP client and records every spec violation in the traffic that passes through.
 */
final class ContractCheckingClient implements ClientInterface
{
    /** @var list<string> */
    public array $violations = [];

    public function __construct(private readonly ClientInterface $inner)
    {
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $request->getBody()->rewind();
        array_push($this->violations, ...SpecContract::checkRequest($request));
        $request->getBody()->rewind();

        $response = $this->inner->sendRequest($request);
        array_push($this->violations, ...SpecContract::checkResponse($request, $response));

        return $response;
    }
}
