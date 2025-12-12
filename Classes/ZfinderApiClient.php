<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient;

use Hardanders\ZfinderApiClient\Model\FormResult;
use Hardanders\ZfinderApiClient\Model\Language;
use Hardanders\ZfinderApiClient\Model\OnlineServiceResult;
use Hardanders\ZfinderApiClient\Model\OrganisationalUnit;
use Hardanders\ZfinderApiClient\Model\OrganisationalUnitResult;
use Hardanders\ZfinderApiClient\Model\OrganisationalUnitStructure;
use Hardanders\ZfinderApiClient\Model\OrganisationalUnitSynonym;
use Hardanders\ZfinderApiClient\Model\OuCompetenceResult;
use Hardanders\ZfinderApiClient\Model\PublicServiceType;
use Hardanders\ZfinderApiClient\Model\TextBlockExternalLink;
use Hardanders\ZfinderApiClient\Request\Allgemein\CommonOnlineApplicationLinkGetRequest;
use Hardanders\ZfinderApiClient\Request\Allgemein\CommonOustructureIdGetRequest;
use Hardanders\ZfinderApiClient\Request\Form\FormFindGetRequest;
use Hardanders\ZfinderApiClient\Request\Leistung\PstIdGetRequest;
use Hardanders\ZfinderApiClient\Request\Onlinedienst\OsFindByCompetenceGetRequest;
use Hardanders\ZfinderApiClient\Request\Organisationseinheit\OuCompetenceIdGetRequest;
use Hardanders\ZfinderApiClient\Request\Organisationseinheit\OuFindGetRequest;
use Hardanders\ZfinderApiClient\Request\Organisationseinheit\OuIdGetRequest;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ZfinderApiClient
{
    private HttpClientInterface $client;

    /**
     * @var string[]
     */
    private array $additionalHeaders;

    public function __construct(
        public string $baseUrl,
        public string $apiKey,
    ) {
        $this->client = HttpClient::create();

        $this->additionalHeaders = [
            sprintf('api_key: %s', $apiKey),
            'Accept: application/json',
            'Accept-Language: de_DE',
        ];
    }

    /**
     * Ermittelt eine Organisationseinheit anhand seiner Id.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_ouidaddressefalinksget
     *
     * GET /ou/{id}
     */
    public function ouIdGet(OuIdGetRequest $request): OrganisationalUnit
    {
        $resource = sprintf('ou/%s', $request->id);
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
            $request->getQueryParams(),
        );

        return new OrganisationalUnit($response);
    }

    /**
     * Benutzen Sie diese Funktion, um die Zuständigkeiten einer Organisationseinheit zu ermitteln.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_oucompetenceidGgt
     *
     * GET /ouCompetence/{id}
     */
    public function ouCompetenceIdGet(OuCompetenceIdGetRequest $request): OuCompetenceResult
    {
        $resource = sprintf('ouCompetence/%s', $request->id);
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
            $request->getQueryParameters(),
        );

        return new OuCompetenceResult($response);
    }

    /**
     * Benutzen Sie diese Funktion um Organisationseinheiten anhand von Suchbegriffen zu finden.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_oufindget
     *
     * GET /ou/find
     */
    public function ouFindGet(OuFindGetRequest $request): OrganisationalUnitResult
    {
        $resource = 'ou/find';
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
            $request->getQueryParameters(),
        );

        return new OrganisationalUnitResult($response);
    }

    /**
     * Benutzen Sie diese Funktion um Formulare zu finden.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_formfindget
     *
     * GET /form/find
     */
    public function formFindGet(FormFindGetRequest $request): FormResult
    {
        $resource = 'form/find';
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
            $request->getQueryParameters(),
        );

        return new FormResult($response);
    }

    /**
     * Ermittelt eine Leistung anhand der Id.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_pstidget
     *
     * GET /pst/{id}
     */
    public function pstIdGet(PstIdGetRequest $request): ?PublicServiceType
    {
        $resource = sprintf('pst/%s', $request->id);
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
            $request->getQueryParameters(),
        );

        if (null === $response) {
            return null;
        }

        return new PublicServiceType($response);
    }

    /**
     * Benutzen Sie diese Funktion, um Onlinedienste anhand ihrer Zuständigkeit für eine Gebiet zu finden.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_osfindbycompetenceget
     *
     * GET /os/findByCompetence
     */
    public function osFindByCompetenceGet(OsFindByCompetenceGetRequest $request): ?OnlineServiceResult
    {
        $resource = 'os/findByCompetence';
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
            $request->getQueryParameters(),
        );

        if (null === $response) {
            return null;
        }

        return new OnlineServiceResult($response);
    }

    /**
     * Gibt alle Sprachen zurück.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_commonlanguagesget
     *
     * GET /common/languages
     *
     * @return Language[]
     */
    public function commonLanguagesGet(): array
    {
        $resource = 'common/languages';
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
        );

        return array_map(fn (\stdClass $language) => new Language($language), $response);
    }

    /**
     * Gibt die Links zur elektronischen Antragstellung zurück.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_commononlineapplicationlinkget
     *
     * GET /common/onlineApplicationLink
     *
     * @return TextBlockExternalLink[]
     */
    public function commonOnlineApplicationLinkGet(CommonOnlineApplicationLinkGetRequest $request): array
    {
        $resource = 'common/onlineApplicationLink';
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
            $request->getQueryParams(),
        ) ?? [];

        return array_map(fn (\stdClass $data) => new TextBlockExternalLink($data), $response);
    }

    /**
     * Gibt alle, zusätzlich zur normalen Struktur, definiereten Hierarchien von Organisationseinheiten zurück.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_commonoustructureget
     *
     * GET /common/oustructure
     *
     * @return OrganisationalUnitStructure[]
     */
    public function commonOustructureGet(): array
    {
        $resource = 'common/oustructure';
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
        ) ?? [];

        return array_map(fn (\stdClass $data) => new OrganisationalUnitStructure($data), $response);
    }

    /**
     * Gibt eine, zusätzlich zur normalen Struktur, definierete Hierarchie für Organisationseinheiten zurück.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_commonoustructureidget
     *
     * GET /common/oustructure/{id}
     */
    public function commonOustructureIdGet(CommonOustructureIdGetRequest $request): ?OrganisationalUnitStructure
    {
        $resource = sprintf('common/oustructure/%s', $request->id);
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
        );

        if (null === $response) {
            return null;
        }

        return new OrganisationalUnitStructure($response);
    }

    /**
     * Gibt alle zentral gepflegten Synonyme für Organisationseinheiten zurück. Diese werden an Organisationseinheiten verwendet, jedoch nicht referenziert.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_commonousynonymget
     *
     * GET /common/ousynonym
     *
     * @return OrganisationalUnitSynonym[]
     */
    public function commonOusynonymGet(): array
    {
        $resource = 'common/ousynonym';
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
        );

        return array_map(fn (\stdClass $data) => new OrganisationalUnitSynonym($data), $response);
    }

    /**
     * Gibt den Link zum Portal zurück.
     *
     * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#_commonportallinkget
     *
     * GET /common/portalLink
     */
    public function commonPortalLinkGet(): ?string
    {
        $resource = 'common/portalLink';
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        return $this->request(
            $endpoint,
        );
    }

    /**
     * @param array<string, mixed> $queryParams
     *
     * @throws \Exception
     */
    private function request(
        string $url,
        array $queryParams = [],
    ): mixed {
        if ($queryParams) {
            $url .= sprintf('?%s', http_build_query($queryParams));
        }

        $response = $this->client->request('GET', $url, [
            'headers' => $this->additionalHeaders,
        ]);

        if (200 !== $response->getStatusCode()) {
            return new \stdClass();
        }

        return json_decode($response->getContent(), false);
    }
}
