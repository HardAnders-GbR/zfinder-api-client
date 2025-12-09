<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * todo: set all properiteis
 * https://restapi-v4-rp.infodienste.de/doc/index.html#OrganisationalUnit.
 */
#[\AllowDynamicProperties]
class OrganisationalUnit
{
    public readonly string $id;

    public function __construct(\stdClass $object)
    {
        $this->id = $object->id;

        foreach ((array) $object as $key => $value) {
            if ('id' !== $key) {
                $this->$key = $value;
            }
        }
    }
}
