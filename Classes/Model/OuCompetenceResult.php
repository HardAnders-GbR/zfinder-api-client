<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OuCompetenceResult
 */
readonly class OuCompetenceResult
{
    /** @var int Anzahl Suchtreffer */
    public int $count;

    /** @var int Gesamtanzahl der Suchtreffer */
    public int $totalCount;

    /** @var OuCompetenceResultEntry[] */
    public array $results;

    public function __construct(\stdClass $data)
    {
        $this->count = $data->count;
        $this->totalCount = $data->totalCount;
        $this->results = array_map(fn (\stdClass $result) => new OuCompetenceResultEntry($result), $data->results ?? []);
    }

    /**
     * @return OuCompetence[]
     */
    public function getOuCompetences(): array
    {
        return array_map(fn (OuCompetenceResultEntry $entry) => $entry->object, $this->results);
    }
}
