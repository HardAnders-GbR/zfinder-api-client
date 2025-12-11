<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Bild.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#Image
 */
readonly class Image
{
    /** @var string Bildtyp */
    public string $mimeType;

    /** @var string Originaldateiname */
    public string $originalFileName;

    /** @var string Größe */
    public string $fileSize;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string Beschreibung */
    public string $description;

    /** @var string Quellenkennzeichnung */
    public string $source;

    /** @var string Downloadurl */
    public string $url;

    /** @var int Höhe des Bilds */
    public int $height;

    /** @var int Breite des Bilds */
    public int $width;

    public function __construct(\stdClass $data)
    {
        $this->mimeType = $data->mimeType;
        $this->originalFileName = $data->originalFileName;
        $this->fileSize = $data->fileSize;
        $this->name = $data->name;
        $this->description = $data->description ?? '';
        $this->source = $data->source ?? '';
        $this->url = $data->url;
        $this->height = $data->height;
        $this->width = $data->width;
    }
}
