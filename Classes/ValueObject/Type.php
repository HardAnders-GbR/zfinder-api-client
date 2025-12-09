<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class Type
{
    public string $id;
    public string $name;
    public string $description;
    public string $key;
    public ?bool $notPublic;

    public function __construct(
        \stdClass $object,
    ) {
        $this->id = $object->id;
        $this->name = $object->name;
        $this->description = $object->description ?? '';
        $this->key = $object->key;
        $this->notPublic = $object->notPublic ?? null;
    }
}
