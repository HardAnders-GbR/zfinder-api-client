<?php

declare(strict_types=1);

namespace Tests\Endpoints;

use Hardanders\ZfinderApiClient\ZfinderApiClient;
use PHPUnit\Framework\TestCase;

class BaseEndpointTest extends TestCase
{
    protected ZfinderApiClient $apiClient;

    protected string $organisationId;

    public function __construct(string $name)
    {
        $apiKey = $_ENV['TEST_API_KEY'];
        $baseUrl = $_ENV['TEST_BASE_URL'];
        $this->organisationId = $_ENV['TEST_ORGANISATION_ID'];
        $this->apiClient = new ZfinderApiClient($baseUrl, $apiKey);

        parent::__construct($name);
    }

    public function testZfinderApiClientObject(): void
    {
        $this->assertTrue(true);
    }
}
