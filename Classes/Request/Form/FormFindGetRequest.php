<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Request\Form;

class FormFindGetRequest
{
    public function __construct(
        public ?string $searchWord = null,
        public ?string $searchFullText = null,
        public bool $searchFuzzy = false,
        public ?string $pstId = null,
        public ?string $ouId = null,
        /**
         * @var mixed[]|null
         */
        public ?array $subOrganisationalUnits = null,
        public bool $includeLocalForms = false,
        public ?string $participantId = null,
        public ?int $offset = null,
        public ?int $limit = null,
        /**
         * @var string[]|null
         */
        public ?array $selectAttributes = null,
        public ?string $sortAttribute = null,
        public ?string $pstGroupId = null,
        public ?string $areaId = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function getQueryParameters(): array
    {
        return array_filter([
            'searchWord' => $this->searchWord,
            'searchFullText' => $this->searchFullText,
            'searchFuzzy' => $this->searchFuzzy,
            'pstId' => $this->pstId,
            'ouId' => $this->ouId,
            'subOrganisationalUnits' => $this->subOrganisationalUnits,
            'includeLocalForms' => $this->includeLocalForms,
            'participantId' => $this->participantId,
            'offset' => $this->offset,
            'limit' => $this->limit,
            'selectAttributes' => $this->selectAttributes,
            'sortAttribute' => $this->sortAttribute,
            'pstGroupId' => $this->pstGroupId,
            'areaId' => $this->areaId,
        ]);
    }
}
