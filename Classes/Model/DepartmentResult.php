<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#DepartmentResult
 */
readonly class DepartmentResult
{
    public int $count;

    public int $totalCount;

    /** @var array|DepartmentResultEntry[] */
    public array $results;

    public function __construct(\stdClass $data)
    {
        $this->count = $data->count;
        $this->totalCount = $data->totalCount;

        $this->results = array_map(fn (\stdClass $result) => new DepartmentResultEntry($result), $data->results);
    }
}
