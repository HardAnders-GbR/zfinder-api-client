<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class OuCompetenceResultEntry
{
    public float $score;

    public OuCompetence $object;

    public function __construct(
        \stdClass $object,
    ) {
        $this->score = $object->score;
        $this->object = new OuCompetence($object->object);
    }
}
