<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * Bearbeitungsdauer.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#ServicePeriod
 */
readonly class ServicePeriod
{
    /** @var string Fristart (Zeitraum, variabler Zeitraum, fester Datumsbereich) */
    public string $type;

    /** @var string Gebiet */
    public string $restrictedArea;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string Bemerkung */
    public string $note;

    /** @var \DateTimeImmutable|null gültig von */
    public ?\DateTimeImmutable $validFrom;

    /** @var \DateTimeImmutable|null gültig bis */
    public ?\DateTimeImmutable $validTo;

    /** @var int|null Zeitraum */
    public ?int $timeSpan;

    /** @var int|null Zeitraum bis, gefüllt wenn Typ SPANINTERVAL */
    public ?int $timeSpanTo;

    /** @var string Zeitraumeiheit */
    public string $periodUnit;

    public function __construct(\stdClass $object)
    {
        $this->type = $object->type;
        $this->restrictedArea = $object->restrictedArea ?? '';
        $this->name = $object->name;
        $this->note = $object->note ?? '';
        $this->validFrom = property_exists($object, 'validFrom') ? new \DateTimeImmutable($object->validFrom) : null;
        $this->validTo = property_exists($object, 'validTo') ? new \DateTimeImmutable($object->validTo) : null;
        $this->timeSpan = $object->timeSpan;
        $this->timeSpanTo = $object->timeSpanTo ?? null;
        $this->periodUnit = $object->periodUnit;
    }
}
