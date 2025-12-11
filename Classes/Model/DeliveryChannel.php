<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Zustellungskanal eines Online-Dienstes.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#DeliveryChannel
 */
readonly class DeliveryChannel
{
    /** @var string Freitext, falls kein Kontaktsystem angegeben werden kann */
    public string $channel;

    public CommunicationSystem $communicationSystem;

    public function __construct(\stdClass $data)
    {
        $this->channel = $data->channel;
        $this->communicationSystem = $data->communicationSystem;
    }
}
