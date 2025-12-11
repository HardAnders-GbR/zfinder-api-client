<?php

declare(strict_types=1);

namespace Tests\Integration;

use Hardanders\ZfinderApiClient\Model\OrganisationalUnit;
use Hardanders\ZfinderApiClient\Model\PublicServiceType;
use Hardanders\ZfinderApiClient\Request\Form\FormFindGetRequest;
use Hardanders\ZfinderApiClient\Request\Leistung\PstIdGetRequest;
use Hardanders\ZfinderApiClient\Request\Onlinedienst\OsFindByCompetenceGetRequest;
use Hardanders\ZfinderApiClient\Request\Organisationseinheit\OuCompetenceIdGetRequest;
use Hardanders\ZfinderApiClient\Request\Organisationseinheit\OuFindGetRequest;
use Hardanders\ZfinderApiClient\Request\Organisationseinheit\OuIdGetRequest;
use Hardanders\ZfinderApiClient\ZfinderApiClient;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class GetAllPstTest extends TestCase
{
    private ZfinderApiClient $apiClient;

    #[DataProvider('dataProvider')]
    public function testGetAllPst(ZfinderApiClient $apiClient, string $organisationId): array
    {
        $this->apiClient = $apiClient;

        $areaId = $this->getAreaId($organisationId);

        $organizationalUnit = $apiClient->ouIdGet(new OuIdGetRequest($organisationId));
        $organizations = $this->getOrganisationsRecursive($organizationalUnit);

        $return = [];

        foreach ($organizations as $organization) {
            $organizationId = $organization->id;
            $ouCompetenceResult = $apiClient->ouCompetenceIdGet(new OuCompetenceIdGetRequest($organizationId));

            if ($ouCompetenceResult === null) {
                continue;
            }

            foreach ($ouCompetenceResult->getOuCompetences() as $competence) {
                foreach ($competence->publicServiceTypes as $publicServiceTypes) {
                    $service = $apiClient->pstIdGet(new PstIdGetRequest($publicServiceTypes->id, $areaId));

                    if ($service === null) {
                        continue;
                    }

                    $this->assertInstanceOf(PublicServiceType::class, $service);

                    $return[(string)$service->id] = [
                        'service' => $service,
                        'forms' => [],
                        'onlineServices' => [],
                    ];

                    if ($areaId !== null) {
                        $forms = $apiClient->formFindGet(new FormFindGetRequest(
                            pstId: $service->id,
                            ouId: $organizationId,
                            includeLocalForms: true,
                            areaId: $areaId,
                        ))->getForms();

                        $return[(string)$service->id]['forms'] = $forms;
                    }

                    $onlineServicesResult = $apiClient->osFindByCompetenceGet(new OsFindByCompetenceGetRequest($service->id, $areaId));

                    if ($onlineServicesResult !== null) {
                        $onlineServices = $onlineServicesResult->getOnlineServices();
                        $return[(string)$service->id]['onlineServices'] = $onlineServices;
                    }
                }
            }
        }

        return $return;
    }

    public static function dataProvider(): array
    {
        $prefix = 'TEST_GETALLPST_';

        $return = [];

        foreach ($_ENV as $key => $value) {
            if (str_starts_with($key, $prefix)) {
                $credentials = explode('::', $value);

                $return[] = [new ZfinderApiClient($credentials[0], $credentials[1]), $credentials[2]];
            }
        }

        return $return;
    }

    /**
     * @param OrganisationalUnit[] $organizations
     *
     * @return OrganisationalUnit[]
     */
    private function getOrganisationsRecursive(OrganisationalUnit $organisationalUnit, array &$organizations = []): array
    {
        $organizations[] = $organisationalUnit;

        $organisationalUnitResult = $this->apiClient->ouFindGet(new OuFindGetRequest(
            parentId: $organisationalUnit->id,
        ));

        foreach ($organisationalUnitResult->getOrganisationalUnits() as $subOrganisation) {
            $organizations[] = $subOrganisation;

            $this->getOrganisationsRecursive($subOrganisation, $organizations);
        }

        return $organizations;
    }

    private function getAreaId(string $ouId): ?string
    {
        $response = $this->apiClient->ouCompetenceIdGet(new OuCompetenceIdGetRequest($ouId));

        if ($response->getOuCompetences() === []) {
            return null;
        }

        $areas = $response->getOuCompetences()[0]->areas;

        if ($areas === []) {
            return null;
        }

        return $areas[0]->id;
    }
}
