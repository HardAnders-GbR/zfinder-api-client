<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient;

use Hardanders\ZfinderApiClient\Request\FormFindGetRequest;
use Hardanders\ZfinderApiClient\Request\OsFindByCompetenceGetRequest;
use Hardanders\ZfinderApiClient\Request\OuCompetenceIdGetRequest;
use Hardanders\ZfinderApiClient\Request\OuFindGetRequest;
use Hardanders\ZfinderApiClient\Request\OuIdGetRequest;
use Hardanders\ZfinderApiClient\Request\PstIdGetRequest;
use Hardanders\ZfinderApiClient\ValueObject\FormResult;
use Hardanders\ZfinderApiClient\ValueObject\OnlineServiceResult;
use Hardanders\ZfinderApiClient\ValueObject\OrganisationalUnit;
use Hardanders\ZfinderApiClient\ValueObject\OrganisationalUnitResult;
use Hardanders\ZfinderApiClient\ValueObject\OuCompetenceResult;
use Hardanders\ZfinderApiClient\ValueObject\PublicServiceType;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ZfinderApiClient
{
    private HttpClientInterface $client;

    private string $baseUrl;

    /**
     * @var string[]
     */
    private array $additionalHeaders;

    public function __construct(
        string $federalState,
        string $apiKey,
    ) {
        $this->client = HttpClient::create();

        $this->baseUrl = $this->getBaseUrl($federalState);

        $this->additionalHeaders = [
            sprintf('api_key: %s', $apiKey),
            'Accept: application/json',
            'Accept-Language: de_DE',
        ];
    }

    /**
     * Ermittelt eine Organisationseinheit anhand seiner Id.
     *
     * GET /ou/{id}
     */
    public function ouIdGet(OuIdGetRequest $request): OrganisationalUnit
    {
        $resource = sprintf('ou/%s', $request->id);
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
            ['selectAttributes' => $request->selectAttributes],
            $this->additionalHeaders
        );

        return new OrganisationalUnit($response);
    }

    /**
     * Benutzen Sie diese Funktion, um die Zuständigkeiten einer Organisationseinheit zu ermitteln.
     *
     * GET /ouCompetence/{id}
     */
    public function ouCompetenceIdGet(OuCompetenceIdGetRequest $request): ?OuCompetenceResult
    {
        $resource = sprintf('ouCompetence/%s', $request->id);
        $endpoint = sprintf('%s%s', $this->baseUrl, $resource);

        $response = $this->request(
            $endpoint,
            $request->getQueryParameters(),
            $this->additionalHeaders
        );

        return new OuCompetenceResult($response);
    }

    /**
     * Benutzen Sie diese Funktion um Organisationseinheiten anhand von Suchbegriffen zu finden.
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
            $this->additionalHeaders
        );

        return new OrganisationalUnitResult($response);
    }

    /**
     * Benutzen Sie diese Funktion um Formulare zu finden.
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
            $this->additionalHeaders
        );

        return new FormResult($response);
    }

    /**
     * Ermittelt eine Leistung anhand der Id.
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
            $this->additionalHeaders
        );

        if (null === $response) {
            return null;
        }

        return new PublicServiceType($response);
    }

    /**
     * Benutzen Sie diese Funktion, um Onlinedienste anhand ihrer Zuständigkeit für eine Gebiet zu finden.
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
            $this->additionalHeaders
        );

        if (null === $response) {
            return null;
        }

        return new OnlineServiceResult($response);
    }

    /**
     * @throws \LogicException
     */
    public function getBaseUrl(string $federalStateAbbreviation): string
    {
        if (!\array_key_exists($federalStateAbbreviation, self::getSupportedFederalStates())) {
            throw new \LogicException(sprintf('No endpoint matching for "%s" in %s', $federalStateAbbreviation, __METHOD__));
        }

        return self::getSupportedFederalStates()[$federalStateAbbreviation];
    }

    /**
     * @return string[]
     */
    public static function getSupportedFederalStates(): array
    {
        return [
            'SH' => 'https://restapi-v4-sh.infodienste.de/',
            'HE' => 'https://restapi-v4-he.infodienste.de/',
            'MV' => 'https://restapi-v4-mv.infodienste.de/',
            'NI' => 'https://restapi-v4-ni.infodienste.de/',
            'RP' => 'https://restapi-v4-rp.infodienste.de/',
            'ST' => 'https://restapi-v4-st.infodienste.de/',
            'TH' => 'https://restapi-v4-th.infodienste.de/',
        ];
    }

    /**
     * @param array<string, mixed> $queryParams
     * @param mixed[]              $additionalHeaders
     */
    public function request(
        string $url,
        array $queryParams = [],
        array $additionalHeaders = [],
        string $method = 'GET',
        bool $returnArray = false,
    ): mixed {
        if ($queryParams) {
            $url .= sprintf('?%s', http_build_query($queryParams));
        }

        $response = $this->client->request($method, $url, [
            'headers' => $additionalHeaders,
        ]);

        if (200 !== $response->getStatusCode()) {
            return null;
        }

        return json_decode($response->getContent(), $returnArray);
    }
}
