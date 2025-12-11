<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineServiceCompetenceResultEntry
 */
readonly class OnlineServiceCompetenceResultEntry
{
    public float $score;

    public OnlineServiceCompetence $object;

    public function __construct(\stdClass $data)
    {
        $this->score = $data->score;
        $this->object = new OnlineServiceCompetence($data->object);
    }
}
