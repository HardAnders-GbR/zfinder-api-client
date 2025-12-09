<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class TextBlockExternalLink
{
    public string $url;
    public string $name;
    public string $note;

    public function __construct(
        \stdClass $object,
    ) {
        $this->url = $object->url;
        $this->name = $object->name;
        $this->note = $object->note ?? '';
    }
}
