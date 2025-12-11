<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Haltestelle.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#PublicTransportationStop
 */
readonly class PublicTransportationStop
{
    /** @var string Bezeichnung */
    public string $name;

    /** @var PublicTransportationLine[] Linien (z.B. Buslinien) */
    public array $lines;

    public function __construct(\stdClass $data)
    {
        $this->name = $data->name;
        $this->lines = array_map(fn (\stdClass $line) => new PublicTransportationLine($line), $data->lines);
    }
}
