<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * ID und Name eines Objektes.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#NamedReference
 */
readonly class NamedReference
{
    /** @var string ID */
    public string $id;

    /** @var string Bezeichnung */
    public string $name;

    public function __construct(\stdClass $object)
    {
        $this->id = $object->id;
        $this->name = $object->name;
    }
}
