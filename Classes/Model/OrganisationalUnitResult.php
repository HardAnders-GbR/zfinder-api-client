<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OrganisationalUnitResult
 */
readonly class OrganisationalUnitResult
{
    /**
     * @var OrganisationalUnitResultEntry[]
     */
    public array $organisationalUnitResultEntries;

    public function __construct(\stdClass $data)
    {
        $this->organisationalUnitResultEntries = array_map(fn (\stdClass $result) => new OrganisationalUnitResultEntry($result), $data->results);
    }

    /**
     * @return OrganisationalUnit[]
     */
    public function getOrganisationalUnits(): array
    {
        return array_map(fn (OrganisationalUnitResultEntry $entry) => $entry->organisationalUnit, $this->organisationalUnitResultEntries);
    }
}
