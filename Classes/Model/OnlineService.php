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

    public function __construct(\stdClass $object)
    {
        $this->id = $object->id;
        $this->name = $object->name;
        $this->description = $object->description ?? '';
        $this->link = $object->link;
        $this->linkTitle = $object->linkTitle ?? '';
        $this->trustLevel = $object->trustLevel;
        $this->gdprText = $object->gdprText ?? '';
        $this->onlinePaymentRequired = $object->onlinePaymentRequired;
        $this->supportedLanguages = $object->supportedLanguages;
    }
}
