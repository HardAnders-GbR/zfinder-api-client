<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Formular.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#Form
 */
readonly class Form
{
    /** @var string Id des Objektes */
    public string $id;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string Beschreibung */
    public string $description;

    /** @var FormLink[] Downloadlinks zu den Formularen */
    public array $links;

    /** @var \DateTimeImmutable Letzte Aktualisierung des Objektes. */
    public \DateTimeImmutable $lastUpdated;

    /** @var NamedReference[] Leistungen */
    public array $publicServiceTypes;

    /** @var NamedReference[] Organisationseinheiten */
    public array $organisationalUnits;

    /** @var bool lokales Formular */
    public bool $localForm;

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->description = $data->description ?? '';
        $this->links = array_map(fn (\stdClass $link) => new FormLink($link), $data->links);
        $this->lastUpdated = new \DateTimeImmutable($data->lastUpdated);
        $this->publicServiceTypes = array_map(fn (\stdClass $publicServiceType) => new NamedReference($publicServiceType), $data->publicServiceTypes);
        $this->organisationalUnits = array_map(fn (\stdClass $organisationalUnit) => new NamedReference($organisationalUnit), $data->organisationalUnits);
        $this->localForm = $data->localForm;
    }
}
