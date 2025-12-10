<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * Typ.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#Type
 */
readonly class Type
{
    /** @var string Id des Objektes */
    public string $id;

    /** @var string Type (z.b. PostAdress, Telefon, Stadt, etc. */
    public string $name;

    /** @var string Beschreibung */
    public string $description;

    /** @var string Schlüssel */
    public string $key;

    /** @var bool|null öffentlich nicht sichtbarer Typ */
    public ?bool $notPublic;

    public function __construct(\stdClass $object)
    {
        $this->id = $object->id;
        $this->name = $object->name;
        $this->description = $object->description ?? '';
        $this->key = $object->key;
        $this->notPublic = $object->notPublic ?? null;
    }
}
