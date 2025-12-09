<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * @object-type DTO
 */
readonly class OuCompetence
{
    /** @var NamedReference[] */
    public array $areas;

    /** @var NamedReference[] */
    public array $publicServiceTypes;

    public NamedReference $organisationalUnit;

    public function __construct(\stdClass $object)
    {
        $this->areas = array_map(fn (\stdClass $area) => new NamedReference($area), $object->areas);
        $this->publicServiceTypes = array_map(fn (\stdClass $publicServiceType) => new NamedReference($publicServiceType), $object->publicServiceTypes);
        $this->organisationalUnit = new NamedReference($object->organisationalUnit);
    }
}
