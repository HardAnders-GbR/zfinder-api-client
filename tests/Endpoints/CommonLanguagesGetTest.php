<?php

declare(strict_types=1);

namespace Tests\Endpoints;

use Hardanders\ZfinderApiClient\Model\Language;

class CommonLanguagesGetTest extends BaseEndpointTest
{
    public function testCommonLanguagesGet(): void
    {
        $response = $this->apiClient->commonLanguagesGet();

        foreach ($response as $language) {
            $this->assertInstanceOf(Language::class, $language);
        }
    }
}
