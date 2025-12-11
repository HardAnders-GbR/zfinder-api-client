<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Konfigurationsparameter für den OnlineService.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#ConfigParameter
 */
readonly class ConfigParameter
{
    /** @var string Parameter-Name */
    public string $parameter;

    /** @var string Fester Wert */
    public string $value;

    /** @var string[] Eine von mehreren Auswahloptionen */
    public array $selection;

    /** @var bool Gibt an, ob der Wert gesetzt sein muss */
    public bool $mandatory;

    /** @var bool Gibt an, ob der Wert gesetzt sein muss */
    public bool $useInUrl;

    /** @var string Eine Beschreibung des Parameters (Ausfüll-Hilfe) */
    public string $help;

    /** @var Type Der Typ des Konfigurationsparameters: Text, Auswahl oder dynamisch(Leistungs-ID, Gebiets-ID, OE-ID, LeiKa-Schlüssel) */
    public Type $type;

    public function __construct(\stdClass $data)
    {
        $this->parameter = $data->parameter;
        $this->value = $data->value;
        $this->selection = $data->selection;
        $this->mandatory = $data->mandatory;
        $this->useInUrl = $data->useInUrl;
        $this->help = $data->help;
        $this->type = new Type($data->type);
    }
}
