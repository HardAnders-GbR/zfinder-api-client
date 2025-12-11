<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Ein- / Ausgangsdokumente zu Leistungen.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#Document
 */
readonly class Document
{
    /** @var string Gebiet */
    public string $restrictedArea;

    /** @var string Dokumentenart (Eingangsdokument, Ausgangsdokument) */
    public string $direction;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string Bemerkung */
    public string $note;

    /** @var \DateTimeImmutable|null gültig von */
    public ?\DateTimeImmutable $validFrom;

    /** @var \DateTimeImmutable|null gültig bis */
    public ?\DateTimeImmutable $validTo;

    public function __construct(\stdClass $data)
    {
        $this->restrictedArea = $data->restrictedArea ?? '';
        $this->direction = $data->direction;
        $this->name = $data->name;
        $this->note = $data->note ?? '';
        $this->validFrom = property_exists($data, 'validFrom') ? new \DateTimeImmutable($data->validFrom) : null;
        $this->validTo = property_exists($data, 'validTo') ? new \DateTimeImmutable($data->validTo) : null;
    }
}
