<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Request\Organisationseinheit;

class OuFindGetRequest
{
    /**
     * @param string[] $selectAttributes
     */
    public function __construct(
        public ?string $searchWord = null,
        public ?string $searchFullText = null,
        public bool $searchFuzzy = false,
        public ?string $parentId = null,
        public ?string $ouCatId = null,
        public ?string $participantId = null,
        public ?string $offset = null,
        public ?string $limit = null,
        public array $selectAttributes = [],
        public ?string $sortAttribute = null,
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
            'parentId' => $this->parentId,
            'ouCatId' => $this->ouCatId,
            'participantId' => $this->participantId,
            'offset' => $this->offset,
            'limit' => $this->limit,
            'selectAttributes' => $this->selectAttributes,
            'sortAttribute' => $this->sortAttribute,
        ]);
    }
}
