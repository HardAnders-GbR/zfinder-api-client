<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#DirectoryPersonResultEntry
 */
readonly class DirectoryPersonResultEntry
{
    /** @var float Wertigkeit des Suchtreffers */
    public float $score;

    public DirectoryPerson $object;

    public function __construct(\stdClass $data)
    {
        $this->score = $data->score;
        $this->object = new DirectoryPerson($data->object);
    }
}
