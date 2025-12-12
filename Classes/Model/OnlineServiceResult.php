<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineServiceResult
 */
readonly class OnlineServiceResult
{
    /** @var int Anzahl Suchtreffer */
    public int $count;

    /** @var int Gesamtanzahl der Suchtreffer */
    public int $totalCount;

    /**
     * @var OnlineServiceResultEntry[]
     */
    public array $results;

    public function __construct(\stdClass $data)
    {
        $this->count = $data->count ?? 0;
        $this->totalCount = $data->totalCount ?? 0;
        $this->results = array_map(fn (\stdClass $result) => new OnlineServiceResultEntry($result), $data->results ?? []);
    }

    /**
     * @return OnlineService[]
     */
    public function getOnlineServices(): array
    {
        return array_map(fn (OnlineServiceResultEntry $result) => $result->object, $this->results);
    }
}
