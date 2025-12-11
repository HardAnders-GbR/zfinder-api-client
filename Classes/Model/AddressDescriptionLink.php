<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Adresse.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#AddressDescriptionLink
 */
readonly class AddressDescriptionLink
{
    /** @var string Link zur Anfahrtsbeschreibung */
    public string $link;

    /** @var string Titel für Link zur Anfahrtsbeschreibung */
    public string $linkTitle;

    public function __construct(\stdClass $data)
    {
        $this->link = $data->link;
        $this->linkTitle = $data->linkTitle;
    }
}
