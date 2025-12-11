<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Request\Allgemein;

class CommonOnlineApplicationLinkGetRequest
{
    public function __construct(
        public string $pstId,
        public string $areaId,
    ) {
    }

    /**
     * @return array<string, string>
     */
    public function getQueryParams(): array
    {
        return array_filter([
            'pstId' => $this->pstId,
            'areaId' => $this->areaId,
        ]);
    }
}
