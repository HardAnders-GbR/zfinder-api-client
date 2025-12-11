<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineServiceGroupResult
 */
readonly class OnlineServiceGroupResult
{
    public int $count;

    public int $totalCount;

    /** @var OnlineServiceGroupResultEntry[] */
    public array $results;

    public function __construct(\stdClass $data)
    {
        $this->count = $data->count;
        $this->totalCount = $data->totalCount;
        $this->results = array_map(fn (\stdClass $result) => new OnlineServiceGroupResultEntry($result), $data->results);
    }
}
