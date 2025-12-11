<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Organisationseinheit.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OrganisationalUnit.
 *
 * todo: set all properties
 */
#[\AllowDynamicProperties]
class OrganisationalUnit
{
    /** @var string Id des Objektes */
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
