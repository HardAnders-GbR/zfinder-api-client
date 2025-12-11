<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Linie (z.B. Buslinie).
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#PublicTransportationLine
 */
readonly class PublicTransportationLine
{
    /** @var string Bezeichnung */
    public string $name;

    public Type $type;

    public function __construct(\stdClass $data)
    {
        $this->name = $data->name;
        $this->type = new Type($data->type);
    }
}
