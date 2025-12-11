<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Addition des Textblocks Rechtsgrundlagen, hier sind die Rechtsvorschriften zu finden.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#TextBlockAdditions
 */
readonly class TextBlockAdditions
{
    /** @var string Id der Vorschrift */
    public string $id;

    /** @var string Bezeichnung der Vorschrift */
    public string $name;

    public function __construct(\stdClass $object)
    {
        $this->id = $object->id;
        $this->name = $object->name;
    }
}
