<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Adresse.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#Address
 */
readonly class Address
{
    /** @var string Strasse */
    public string $street;

    /** @var string Hausnummer */
    public string $houseNumber;

    public NamedReference $area;

    /** @var string Postfach */
    public string $mailbox;

    /** @var string Postleitzahl */
    public string $zipcode;

    /** @var string Bemerkungen */
    public string $comment;

    public ?GeoLocation $geoLocation;

    public Type $type;

    public ?AddressDescriptionLink $addressDescriptionLink;

    /** @var PublicTransportationStop[] Haltestellen */
    public array $transportationStops;

    /** @var ParkingLot[] Parkplätze */
    public array $parkingLots;

    /** @var bool|null Fahrstuhl vorhanden */
    public ?bool $elevator;

    /** @var bool|null Barrierefreier Zugang */
    public ?bool $wheelchairAccessible;

    /** @var string Zusätzliche Angaben zu Barrierefrei */
    public string $accessibleInfo;

    public function __construct(\stdClass $data)
    {
        $this->street = $data->street;
        $this->houseNumber = $data->houseNumber;
        $this->area = new NamedReference($data->area);
        $this->mailbox = $data->mailbox ?? '';
        $this->zipcode = $data->zipcode;
        $this->comment = $data->comment ?? '';
        $this->geoLocation = property_exists($data, 'geoLocation') ? new GeoLocation($data->geoLocation) : null;
        $this->type = new Type($data->type);
        $this->addressDescriptionLink = property_exists($data, 'addressDescriptionLink') ? new AddressDescriptionLink($data->addressDescriptionLink) : null;
        $this->transportationStops = array_map(fn (\stdClass $transportationStop) => new PublicTransportationStop($transportationStop), $data->transportationStops);
        $this->parkingLots = array_map(fn (\stdClass $parkingLot) => new ParkingLot($parkingLot), $data->parkingLots);
        $this->elevator = $data->elevator ?? null;
        $this->wheelchairAccessible = $data->wheelchairAccessible ?? null;
        $this->accessibleInfo = $data->accessibleInfo ?? '';
    }
}
