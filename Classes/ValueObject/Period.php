<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class Period
{
    /** @var string Fristart (Zeitraum, variabler Zeitraum, fester Datumsbereich) */
    public string $type;

    /** @var string Gebiet */
    public string $restrictedArea;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string Bemerkung */
    public string $note;

    /** @var \DateTimeInterface|null gültig von */
    public ?\DateTimeInterface $validFrom;

    /** @var \DateTimeInterface|null gültig bis */
    public ?\DateTimeInterface $validTo;

    /** @var int|null Zeitraum, gefüllt wenn Typ SPAN, SPANINTERVAL */
    public ?int $timeSpan;

    /** @var int|null Zeitraum, gefüllt wenn Typ SPANINTERVAL */
    public ?int $timeSpanTo;

    /** @var string Zeitraumeinheit, gefüllt wenn Typ SPAN, SPANINTERVAL */
    public string $periodUnit;

    /** @var \DateTimeInterface|null Datum von, gefüllt wenn Typ DATEINTERVAL */
    public ?\DateTimeInterface $dateFrom;

    /** @var \DateTimeInterface|null Datum bis, gefüllt wenn Typ DATEINTERVAL */
    public ?\DateTimeInterface $dateTo;

    /** @var string Wiederholung des Datumsbereiches, gefüllt wenn Typ SPAN, SPANINTERVAL */
    public string $PeriodRepetition;

    public function __construct(\stdClass $object)
    {
        $this->type = $object->type;
        $this->restrictedArea = $object->restrictedArea ?? '';
        $this->name = $object->name;
        $this->note = $object->note ?? '';
        $this->validFrom = property_exists($object, 'validFrom') ? new \DateTime($object->validFrom) : null;
        $this->validTo = property_exists($object, 'validTo') ? new \DateTime($object->validTo) : null;
        $this->timeSpan = $object->timeSpan;
        $this->timeSpanTo = $object->timeSpanTo ?? null;
        $this->periodUnit = $object->periodUnit;
        $this->dateFrom = property_exists($object, 'dateFrom') ? new \DateTime($object->dateFrom) : null;
        $this->dateTo = property_exists($object, 'dateTo') ? new \DateTime($object->dateTo) : null;
        $this->PeriodRepetition = $object->PeriodRepetition ?? '';
    }
}
