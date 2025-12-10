<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OrganisationalUnitResult
 */
readonly class OrganisationalUnitResult
{
    /**
     * @var OrganisationalUnitResultEntry[]
     */
    public array $organisationalUnitResultEntries;

    public function __construct(\stdClass $object)
    {
        $this->organisationalUnitResultEntries = array_map(fn (\stdClass $result) => new OrganisationalUnitResultEntry($result), $object->results);
    }

    /**
     * @return OrganisationalUnit[]
     */
    public function getOrganisationalUnits(): array
    {
        return array_map(fn (OrganisationalUnitResultEntry $entry) => $entry->organisationalUnit, $this->organisationalUnitResultEntries);
    }
}
