<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Liste mit Synonymen die in Organisationseinheiten übernomen werden können.Diese werden nicht referenziert.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OrganisationalUnitSynonym
 */
readonly class OrganisationalUnitSynonym
{
    public string $id;

    public string $name;

    public \DateTimeImmutable $lastUpdated;

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->lastUpdated = new \DateTimeImmutable($data->lastUpdated);
    }
}
