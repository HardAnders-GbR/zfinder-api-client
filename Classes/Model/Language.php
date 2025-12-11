<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Sprache.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#Language
 */
readonly class Language
{
    public string $code;
    public string $name;
    public string $nativeName;
    public string $shortName;
    public bool $defaultLanguage;

    public function __construct(\stdClass $data)
    {
        $this->code = $data->code;
        $this->name = $data->name;
        $this->nativeName = $data->nativeName;
        $this->shortName = $data->shortName;
        $this->defaultLanguage = $data->defaultLanguage;
    }
}
