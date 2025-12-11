<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Zuständigkeit eines Onlinedienstes.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineServiceCompetence
 */
readonly class OnlineServiceCompetence
{
    public NamedReference $onlineService;

    /** @var NamedReference[] Gebiete */
    public array $areas;

    /** @var NamedReference[] Leistungen */
    public array $publicServiceTypes;

    public function __construct(\stdClass $data)
    {
        $this->onlineService = new NamedReference($data->onlineService);
        $this->areas = array_map(fn (\stdClass $area) => new NamedReference($area), $data->areas);
        $this->publicServiceTypes = array_map(fn (\stdClass $publicServiceType) => new NamedReference($publicServiceType), $data->publicServiceTypes);
    }
}
