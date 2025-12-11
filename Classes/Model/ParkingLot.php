<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Parkplatz.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#ParkingLot
 */
readonly class ParkingLot
{
    /** @var string Bezeichnung */
    public string $name;

    public Type $type;

    /** @var int|null Anzahl */
    public ?int $count;

    /** @var bool Kostenpflichtig */
    public bool $feeApply;

    public function __construct(\stdClass $data)
    {
        $this->name = $data->name;
        $this->type = new Type($data->type);
        $this->count = $data->count ?? null;
        $this->feeApply = $data->feeApply;
    }
}
