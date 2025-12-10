<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineServiceResult
 */
readonly class OnlineServiceResult
{
    public int $count;

    /**
     * @var OnlineServiceResultEntry[]
     */
    public array $results;

    public function __construct(\stdClass $object)
    {
        $this->count = $object->count;
        $this->results = array_map(fn (\stdClass $result) => new OnlineServiceResultEntry($result), $object->results);
    }

    /**
     * @return OnlineService[]
     */
    public function getOnlineServices(): array
    {
        return array_map(fn (OnlineServiceResultEntry $result) => $result->object, $this->results);
    }
}
