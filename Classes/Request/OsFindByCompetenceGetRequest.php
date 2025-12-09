<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Request;

readonly class OsFindByCompetenceGetRequest
{
    public function __construct(
        public string $pstId,
        public ?string $areaId,
    ) {
    }

    /**
     * @return array<string, string>
     */
    public function getQueryParameters(): array
    {
        return array_filter([
            'pstId' => $this->pstId,
            'areaId' => $this->areaId,
        ]);
    }
}
