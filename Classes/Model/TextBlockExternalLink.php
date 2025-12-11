<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Externer Link für Textblockergänzung.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#TextBlockExternalLink
 */
readonly class TextBlockExternalLink
{
    /** @var string Url */
    public string $url;

    /** @var string Bezeichnung des Links */
    public string $name;

    /** @var string Bemerkung des Links */
    public string $note;

    public function __construct(\stdClass $object)
    {
        $this->url = $object->url;
        $this->name = $object->name;
        $this->note = $object->note ?? '';
    }
}
