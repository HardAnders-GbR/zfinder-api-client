<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Mitarbeiter aus Verzeichnis.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#DirectoryPerson
 */
readonly class DirectoryPerson
{
    public string $id;

    /** @var string Nachname */
    public string $lastName;

    /** @var string Vorname */
    public string $firstName;

    /** @var string Zusatz */
    public string $nameAddition;

    /** @var string Anrede */
    public string $title;

    /** @var string Position */
    public string $position;

    /** @var string Funktion */
    public string $function;

    /** @var string Bereich */
    public string $department;

    /** @var string Raum */
    public string $room;

    public string $comment;

    /** @var Address[] Adressen */
    public array $addresses;

    /** @var Communication[] Kommunikationsdaten */
    public array $communication;

    /** @var Image[] Bilder */
    public array $image;

    public \DateTimeImmutable $lastUpdated;

    /** @var bool Mitarbeiter-Daten anonymisieren */
    public bool $anonymize;

    /** @var bool Mitarbeiter ist sichtbar */
    public bool $visible;

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->lastName = $data->lastName;
        $this->firstName = $data->firstName;
        $this->nameAddition = $data->nameAddition;
        $this->title = $data->title;
        $this->position = $data->position;
        $this->function = $data->function;
        $this->department = $data->department;
        $this->room = $data->room;
        $this->comment = $data->comment;
        $this->addresses = array_map(fn (\stdClass $address) => new Address($address), $data->addresses);
        $this->communication = array_map(fn (\stdClass $communication) => new Communication($communication), $data->communication);
        $this->image = array_map(fn (\stdClass $image) => new Image($image), $data->image);
        $this->lastUpdated = $data->lastUpdated;
        $this->anonymize = $data->anonymize;
        $this->visible = $data->visible;
    }
}
