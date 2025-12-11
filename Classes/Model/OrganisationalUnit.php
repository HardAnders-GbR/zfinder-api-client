<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Organisationseinheit.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OrganisationalUnit.
 */
readonly class OrganisationalUnit
{
    /** @var string Id des Objektes */
    public string $id;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string Optionale OE-Kennung aus dem Redaktionssystem */
    public string $optionalName;

    /** @var string[] Synonyme der Organisationseinheit */
    public array $synonyms;

    /** @var string Beschreibung */
    public string $description;

    /** @var string Kurzbeschreibung */
    public string $shortDescription;

    /** @var string Übergordnete Organisationseinheit */
    public string $parentId;

    /** @var string Ort */
    public string $placename;

    /** @var bool Generalisierte OE */
    public bool $generalized;

    /** @var string Ist gesetzt wenn 'generalized=true'. Hinweistext für eine Organisationseinheit die momentan nur von der Zentralredaktion angelegt wurde. 'Generalisiert' */
    public string $textgeneralized;

    /** @var string Öffnungszeiten */
    public string $openingHours;

    /** @var bool Gibt an, ob zum Vorsprechen ein Termin nötig ist */
    public bool $appointmentRequired;

    public ?OnlineAppointment $onlineAppointment;

    /** @var Address[] Adressen */
    public array $addresses;

    /** @var BankAccount[] Bankverbindungen */
    public array $bankaccounts;

    /** @var Communication[] */
    public array $communications;

    /** @var string Sonstige Angaben */
    public string $misc;

    /** @var Image[] Bilder. Das Hauptbild befindet sich an erster Stelle! */
    public array $images;

    public string $specialInfoServiceCenter;

    /** @var CommunicationSystem[] Kommunikationsmöglichkeiten */
    public array $communicationSystems;

    /** @var Type[] Zahlungsweisen */
    public array $paymentMethods;

    /** @var \DateTimeImmutable Letzte Aktualisierung des Objektes. */
    public \DateTimeImmutable $lastUpdated;

    /** @var int|null Position der OE innerhalb der Struktur. */
    public ?int $position;

    /** @var NamedReference[] Organisationseinheit-Strukturen denen die Oragnisationseinheit zugeordnet ist. */
    public array $organisationalUnitStructures;

    /** @var NamedReference[] Organisationseinheit-Kategorien denen die Oragnisationseinheit zugeordnet ist. */
    public array $organisationalUnitCategories;

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->optionalName = $data->optionalName ?? '';
        $this->synonyms = $data->synonyms;
        $this->description = $data->description ?? '';
        $this->shortDescription = $data->shortDescription ?? '';
        $this->parentId = $data->parentId ?? '';
        $this->placename = $data->placename;
        $this->generalized = $data->generalized;
        $this->textgeneralized = $data->textgeneralized ?? '';
        $this->openingHours = $data->openingHours ?? '';
        $this->appointmentRequired = $data->appointmentRequired;
        $this->onlineAppointment = property_exists($data, 'onlineAppointment') ? new OnlineAppointment($data->onlineAppointment) : null;
        $this->addresses = array_map(fn (\stdClass $address) => new Address($address), $data->addresses);
        $this->bankaccounts = array_map(fn (\stdClass $bankAccount) => new BankAccount($bankAccount), $data->bankaccounts);
        $this->communications = array_map(fn (\stdClass $communication) => new Communication($communication), $data->communications);
        $this->misc = $data->misc ?? '';
        $this->images = array_map(fn (\stdClass $image) => new Image($image), $data->images);
        $this->specialInfoServiceCenter = $data->specialInfoServiceCenter ?? '';
        $this->communicationSystems = array_map(fn (\stdClass $communicationSystem) => new CommunicationSystem($communicationSystem), $data->communicationSystems);
        $this->paymentMethods = array_map(fn (\stdClass $paymentMethod) => new Type($paymentMethod), $data->paymentMethods);
        $this->lastUpdated = new \DateTimeImmutable($data->lastUpdated);
        $this->position = $data->position ?? null;
        $this->organisationalUnitStructures = array_map(fn (\stdClass $organisationalUnitStructure) => new NamedReference($organisationalUnitStructure), $data->organisationalUnitStructures);
        $this->organisationalUnitCategories = array_map(fn (\stdClass $organisationalUnitCategory) => new NamedReference($organisationalUnitCategory), $data->organisationalUnitCategories);
    }
}
