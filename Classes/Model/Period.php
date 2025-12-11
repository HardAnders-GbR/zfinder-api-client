<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Frist.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#Period
 */
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

    /** @var \DateTimeImmutable|null gültig von */
    public ?\DateTimeImmutable $validFrom;

    /** @var \DateTimeImmutable|null gültig bis */
    public ?\DateTimeImmutable $validTo;

    /** @var int|null Zeitraum, gefüllt wenn Typ SPAN, SPANINTERVAL */
    public ?int $timeSpan;

    /** @var int|null Zeitraum, gefüllt wenn Typ SPANINTERVAL */
    public ?int $timeSpanTo;

    /** @var string Zeitraumeinheit, gefüllt wenn Typ SPAN, SPANINTERVAL */
    public string $periodUnit;

    /** @var \DateTimeImmutable|null Datum von, gefüllt wenn Typ DATEINTERVAL */
    public ?\DateTimeImmutable $dateFrom;

    /** @var \DateTimeImmutable|null Datum bis, gefüllt wenn Typ DATEINTERVAL */
    public ?\DateTimeImmutable $dateTo;

    /** @var string Wiederholung des Datumsbereiches, gefüllt wenn Typ SPAN, SPANINTERVAL */
    public string $PeriodRepetition;

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
        $this->dateFrom = property_exists($object, 'dateFrom') ? new \DateTimeImmutable($object->dateFrom) : null;
        $this->dateTo = property_exists($object, 'dateTo') ? new \DateTimeImmutable($object->dateTo) : null;
        $this->PeriodRepetition = $object->PeriodRepetition ?? '';
    }
}
