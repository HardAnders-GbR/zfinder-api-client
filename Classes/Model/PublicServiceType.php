<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Leistung.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#PublicServiceType
 */
readonly class PublicServiceType
{
    /** @var string Id des Objektes */
    public string $id;

    /** @var string Leistungstyp (Leistungsobjekt (LO), Leistung mit Verrichtung (LOV), Leistung mit Verrichtung und Detail(LOVZ), Auskunft (A)) */
    public string $type;

    /** @var string[] Leikaschlüssel */
    public array $leikaKeys;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string Einleitungstext (Teiltext der gesamten Leistung) */
    public string $teaser;

    /** @var TextBlock[] Textblöcke */
    public array $textBlocks;

    /** @var Period[] Fristen */
    public array $periods;

    /** @var ServicePeriod[] Bearbeitungsfristen */
    public array $servicePeriods;

    /** @var Charge[] Gebühren */
    public array $charges;

    /** @var Document[] Dokumente */
    public array $documents;

    /** @var string[] */
    public array $synonyms;

    /** @var \DateTimeImmutable Letzte Aktualisierung des Objektes. */
    public \DateTimeImmutable $lastUpdated;

    /** @var NamedReference[] Gebietseinschränkungen der Leistung */
    public array $restrictedAreas;

    /** @var NamedReference[] Leistungen */
    public array $relatedPublicServiceTypes;

    public ?bool $writtenFormRequired;

    public ?Type $trustLevel;

    /** @var Type[] SDG-Informationsbereiche */
    public array $sdgInformationAreas;

    /** @var Type[] Leistungsadressaten */
    public array $receivers;

    /** @var bool Kennzeichen 'Einheitliche Stelle' */
    public bool $singlePointOfContact;

    /** @var NamedReference[] Weitere LeistungsObjekte mit Verrichtung die diesem LeistungsObjekt entsprechen. (Kann nur gesetzt sein, wenn Typ geleich 'LO')' */
    public array $furtherPstObjectsWithActivity;

    /** @var NamedReference[] Weitere LeistungsObjekte mit Verrichtung und Detail die diesem LeistungsObjekt entsprechen. (Kann nur gesetzt sein, wenn Typ gleich 'LO' oder 'LOV')' */
    public array $furtherPstObjectsWithActivityAndDetail;

    public ?NamedReference $department;

    public function __construct(\stdClass $object)
    {
        $this->id = $object->id;
        $this->type = $object->type;
        $this->leikaKeys = $object->leikaKeys;
        $this->name = $object->name;
        $this->teaser = $object->teaser ?? '';
        $this->textBlocks = array_map(fn (\stdClass $textBlock) => new TextBlock($textBlock), $object->textBlocks);
        $this->periods = array_map(fn (\stdClass $period) => new Period($period), $object->periods);
        $this->servicePeriods = array_map(fn (\stdClass $servicePeriod) => new ServicePeriod($servicePeriod), $object->servicePeriods);
        $this->charges = array_map(fn (\stdClass $charge) => new Charge($charge), $object->charges);
        $this->documents = array_map(fn (\stdClass $document) => new Document($document), $object->documents);
        $this->synonyms = $object->synonyms ?? [];
        $this->lastUpdated = new \DateTimeImmutable($object->lastUpdated);
        $this->restrictedAreas = array_map(fn (\stdClass $restrictedArea) => new NamedReference($restrictedArea), $object->restrictedAreas);
        $this->writtenFormRequired = $object->writtenFormRequired ?? null;
        $this->trustLevel = property_exists($object, 'trustLevel') ? new Type($object->trustLevel) : null;
        $this->singlePointOfContact = $object->singlePointOfContact;
        $this->relatedPublicServiceTypes = array_map(fn (\stdClass $relatedPublicServiceType) => new NamedReference($relatedPublicServiceType), $object->relatedPublicServiceTypes);
        $this->sdgInformationAreas = array_map(fn (\stdClass $sdgInformationArea) => new Type($sdgInformationArea), $object->sdgInformationAreas);
        $this->receivers = array_map(fn (\stdClass $receiver) => new Type($receiver), $object->receivers);
        $this->furtherPstObjectsWithActivity = array_map(fn (\stdClass $furtherPstObjectsWithActivity) => new NamedReference($furtherPstObjectsWithActivity), $object->furtherPstObjectsWithActivity);
        $this->furtherPstObjectsWithActivityAndDetail = array_map(fn (\stdClass $furtherPstObjectsWithActivityAndDetail) => new NamedReference($furtherPstObjectsWithActivityAndDetail), $object->furtherPstObjectsWithActivityAndDetail);
        $this->department = new NamedReference($object->department);
    }
}
