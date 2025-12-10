<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OrganisationalUnitResultEntry
 */
readonly class OrganisationalUnitResultEntry
{
    /** @var float Wertigkeit des Suchtreffers */
    public float $score;

    public OrganisationalUnit $organisationalUnit;

    public function __construct(\stdClass $object)
    {
        $this->score = $object->score;
        $this->organisationalUnit = new OrganisationalUnit($object->object);
    }
}
