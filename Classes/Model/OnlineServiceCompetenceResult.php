<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineServiceCompetenceResult
 */
readonly class OnlineServiceCompetenceResult
{
    /** @var int Anzahl Suchtreffer */
    public int $count;

    /** @var int Gesamtanzahl der Suchtreffer */
    public int $totalCount;

    /** @var OnlineServiceCompetenceResultEntry[] */
    public array $results;

    public function __construct(\stdClass $data)
    {
        $this->count = $data->count;
        $this->totalCount = $data->totalCount;
        $this->results = array_map(fn (\stdClass $result) => new OnlineServiceCompetenceResultEntry($result), $data->results);
    }
}
