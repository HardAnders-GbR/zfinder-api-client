<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Geokoordinaten.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#GeoLocation
 */
readonly class GeoLocation
{
    /** @var float Als 'coordinate1' können in Abhängigkeit vom Koordinatensystem folgende Werte angegeben werden: Ostwert für UTM, Rechtswert für Gauß-Krüger-Koordinatensystem und Soldnerkoordinatensystem, geographische Länge für geographisches Koordinatensystem. */
    public float $coordinate1;

    /** @var float Als 'coordinate2' können in Abhängigkeit vom Koordinatensystem folgende Werte angegeben werden: Nordwert für UTM, Hochwert für Gauß-Krüger-Koordinatensystem und Soldnerkoordinatensystem, geographische Breite für geographisches Koordinatensystem. */
    public float $coordinate2;

    /** @var string Koordinatensystem der Geolokation. (EPSG:XXXXX) */
    public string $projection;

    public function __construct(\stdClass $data)
    {
        $this->coordinate1 = $data->coordinate1;
        $this->coordinate2 = $data->coordinate2;
        $this->projection = $data->projection;
    }
}
