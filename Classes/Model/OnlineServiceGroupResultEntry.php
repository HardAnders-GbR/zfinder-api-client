<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineServiceGroupResultEntry
 */
readonly class OnlineServiceGroupResultEntry
{
    /** @var float Wertigkeit des Suchtreffers */
    public float $score;

    public OnlineServiceGroup $object;

    public function __construct(\stdClass $data)
    {
        $this->score = $data->score;
        $this->object = new OnlineServiceGroup($data->object);
    }
}
