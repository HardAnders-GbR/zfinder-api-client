<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Efa-Link zur jeweiligen Adresse.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#EfaLink
 */
readonly class EfaLink
{
    public string $link;

    public function __construct(\stdClass $data)
    {
        $this->link = $data->link;
    }
}
