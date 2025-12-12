<?php

declare(strict_types=1);

namespace Tests\Endpoints;

use Hardanders\ZfinderApiClient\Request\Leistung\PstIdGetRequest;

class PstIdGetTest extends BaseEndpointTest
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function testPstIdGetTest(): void
    {
        $request = new PstIdGetRequest($_ENV['TEST_PST_ID']);
        $response = $this->apiClient->pstIdGet($request);

        $this->assertSame($_ENV['TEST_PST_ID'], $response->id);
    }
}
