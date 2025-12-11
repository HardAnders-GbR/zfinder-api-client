<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Onlinedienstegruppe.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineServiceGroup
 */
readonly class OnlineServiceGroup
{
    public string $id;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string Beschreibung */
    public string $description;

    /** @var NamedReference[] Onlinedienste */
    public array $onlineServices;

    public \DateTimeImmutable $lastUpdated;

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->description = $data->description;
        $this->onlineServices = array_map(fn (\stdClass $onlineService) => new NamedReference($onlineService), $data->onlineServices);
        $this->lastUpdated = new \DateTimeImmutable($data->lastUpdated);
    }
}
