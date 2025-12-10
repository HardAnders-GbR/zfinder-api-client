<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OuCompetenceResultEntry
 */
readonly class OuCompetenceResultEntry
{
    /** @var float Wertigkeit des Suchtreffers */
    public float $score;

    public OuCompetence $object;

    public function __construct(\stdClass $object)
    {
        $this->score = $object->score;
        $this->object = new OuCompetence($object->object);
    }
}
