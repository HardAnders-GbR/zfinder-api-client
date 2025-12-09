<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

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
