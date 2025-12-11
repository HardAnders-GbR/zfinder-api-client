<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Kommunikationskanal (z.B. E-Mail, Telefon, ...).
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#Communication
 */
readonly class Communication
{
    public Type $type;

    /** @var string Bezeichnung */
    public string $title;

    /** @var string Bemerkung */
    public string $note;

    /** @var string Wert */
    public string $value;

    public function __construct(\stdClass $data)
    {
        $this->type = new Type($data->type);
        $this->value = $data->value;
        $this->title = $data->title ?? '';
        $this->note = $data->note ?? '';
    }
}
