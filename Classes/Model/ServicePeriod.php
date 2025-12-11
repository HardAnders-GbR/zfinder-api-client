<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

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
    }
}
