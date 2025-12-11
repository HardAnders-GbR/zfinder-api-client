<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Onlinedienst.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OnlineService
 *
 * @todo add remaining properties
 */
readonly class OnlineService
{
    public string $id;
    public string $name;
    public string $description;
    public string $link;
    public string $linkTitle;
    public string $trustLevel;
    public string $gdprText;
    public string $onlinePaymentRequired;
    /** @var string[] */
    public array $supportedLanguages;

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->description = $data->description ?? '';
        $this->link = $data->link;
        $this->linkTitle = $data->linkTitle ?? '';
        $this->trustLevel = $data->trustLevel;
        $this->gdprText = $data->gdprText ?? '';
        $this->onlinePaymentRequired = $data->onlinePaymentRequired;
        $this->supportedLanguages = $data->supportedLanguages;
    }
}
