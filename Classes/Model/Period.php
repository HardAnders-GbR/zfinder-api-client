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

    public function __construct(\stdClass $data)
    {
        $this->type = $data->type;
        $this->restrictedArea = $data->restrictedArea ?? '';
        $this->name = $data->name;
        $this->note = $data->note ?? '';
        $this->validFrom = property_exists($data, 'validFrom') ? new \DateTimeImmutable($data->validFrom) : null;
        $this->validTo = property_exists($data, 'validTo') ? new \DateTimeImmutable($data->validTo) : null;
        $this->timeSpan = $data->timeSpan;
        $this->timeSpanTo = $data->timeSpanTo ?? null;
        $this->periodUnit = $data->periodUnit;
        $this->dateFrom = property_exists($data, 'dateFrom') ? new \DateTimeImmutable($data->dateFrom) : null;
        $this->dateTo = property_exists($data, 'dateTo') ? new \DateTimeImmutable($data->dateTo) : null;
        $this->PeriodRepetition = $data->PeriodRepetition ?? '';
    }
}
