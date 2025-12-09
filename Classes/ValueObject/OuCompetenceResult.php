<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class OuCompetenceResult
{
    public int $count;

    public int $totalCount;

    /** @var OuCompetenceResultEntry[] */
    public array $results;

    public function __construct(\stdClass $object)
    {
        $this->count = $object->count;
        $this->totalCount = $object->totalCount;
        $this->results = array_map(fn (\stdClass $result) => new OuCompetenceResultEntry($result), $object->results);
    }

    /**
     * @return OuCompetence[]
     */
    public function getOuCompetences(): array
    {
        return array_map(fn (OuCompetenceResultEntry $entry) => $entry->object, $this->results);
    }
}
