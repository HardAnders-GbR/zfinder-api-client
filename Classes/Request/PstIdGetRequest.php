<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Request;

class PstIdGetRequest
{
    /**
     * @param string[] $selectAttributes
     */
    public function __construct(
        public string $id,
        public ?string $areaId = null,
        public ?array $selectAttributes = null,
    ) {
    }

    /**
     * @return array<string, string|string[]>
     */
    public function getQueryParameters(): array
    {
        return array_filter([
            'areaId' => $this->areaId,
            'selectAttributes' => $this->selectAttributes,
        ]);
    }
}
