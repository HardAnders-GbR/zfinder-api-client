<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class TextBlockAdditions
{
    public string $id;

    public string $name;

    public function __construct(
        \stdClass $object,
    ) {
        $this->id = $object->id;
        $this->name = $object->name;
    }
}
