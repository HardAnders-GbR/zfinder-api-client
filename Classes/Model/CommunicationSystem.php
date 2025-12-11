<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Kommunikations-System.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#CommunicationSystem
 */
readonly class CommunicationSystem
{
    /** @var string Kennung */
    public string $identification;

    /** @var string Zusatz */
    public string $identificationAddon;

    public Type $type;

    public function __construct(\stdClass $data)
    {
        $this->identification = $data->identification;
        $this->identificationAddon = $data->identificationAddon;
        $this->type = new Type($data->type);
    }
}
