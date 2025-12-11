<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Link zum Formular um diese heruntertzuladen/anzuzeigen.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#FormLink
 */
readonly class FormLink
{
    public Type $type;

    /** @var string Url */
    public string $url;

    /** @var int|null Die Dateigröße in Bytes */
    public ?int $size;

    /** @var string|null MIME-Type */
    public ?string $mimeType;

    public function __construct(\stdClass $data)
    {
        $this->type = new Type($data->type);
        $this->url = $data->url;
        $this->size = $data->size ?? null;
        $this->mimeType = $data->mimeType ?? null;
    }
}
