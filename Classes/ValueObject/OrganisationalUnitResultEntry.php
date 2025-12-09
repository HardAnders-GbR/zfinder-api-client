<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class OrganisationalUnitResultEntry
{
    public float $score;

    public OrganisationalUnit $organisationalUnit;

    public function __construct(\stdClass $object)
    {
        $this->score = $object->score;
        $this->organisationalUnit = new OrganisationalUnit($object->object);
    }
}
