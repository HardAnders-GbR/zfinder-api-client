<?php

declare(strict_types=1);

namespace Tests\Endpoints;

use Hardanders\ZfinderApiClient\Request\Organisationseinheit\OuIdGetRequest;

class OuIdGetTest extends BaseEndpointTest
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function testOuIdGetTest(): void
    {
        $request = new OuIdGetRequest($_ENV['TEST_ORGANISATION_ID']);

        $response = $this->apiClient->ouIdGet($request);

        $this->assertSame($_ENV['TEST_ORGANISATION_ID'], $response->id);
    }
}
