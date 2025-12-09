<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class FormLink
{
    public Type $type;

    public string $url;

    public int $size;

    public string $mimeType;

    public function __construct(\stdClass $object)
    {
        $this->type = new Type($object->type);
        $this->url = $object->url;
        $this->size = $object->size;
        $this->mimeType = $object->mimeType;
    }
}
