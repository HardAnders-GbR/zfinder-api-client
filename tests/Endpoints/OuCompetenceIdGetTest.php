<?php

declare(strict_types=1);

namespace Tests\Endpoints;

use Hardanders\ZfinderApiClient\Request\Organisationseinheit\OuCompetenceIdGetRequest;

class OuCompetenceIdGetTest extends BaseEndpointTest
{
    public function testOuCompetenceIdGetTest(): void
    {
        $request = new OuCompetenceIdGetRequest($_ENV['TEST_ORGANISATION_ID']);
        $this->apiClient->ouCompetenceIdGet($request);

        $this->assertTrue(true);
    }
}
