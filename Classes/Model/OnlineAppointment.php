<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Online-Terminvereinbarung.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineAppointment
 */
readonly class OnlineAppointment
{
    /** @var string Link zur Online-Terminvereinbarung */
    public string $link;

    /** @var ConfigParameter[] Konfigurationsparameter */
    public array $configurationParameters;

    public function __construct(\stdClass $data)
    {
        $this->link = $data->link;
        $this->configurationParameters = array_map(fn (\stdClass $configurationParameter) => new ConfigParameter($configurationParameter), $data->configurationParameters);
    }
}
