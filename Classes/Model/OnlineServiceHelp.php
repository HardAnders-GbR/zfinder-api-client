<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * OnlineService Hilfelink und Hilfetext.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineServiceHelp
 */
readonly class OnlineServiceHelp
{
    /** @var string Hilfelink des gesuchten Onlinedienstes */
    public string $link;

    /** @var string Hilfetext des gesuchten Onlinedienstes */
    public string $text;

    public function __construct(\stdClass $data)
    {
        $this->link = $data->link;
        $this->text = $data->text;
    }
}
