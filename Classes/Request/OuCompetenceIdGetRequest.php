<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Request;

class OuCompetenceIdGetRequest
{
    /**
     * @param string             $id                     id der Organisationseinheit
     * @param array<string>      $subOrganisationalUnits Suche nicht nur für die angegebene OE, sondern auch in allen Unter-OEs
     * @param string|null        $pstId                  id der Leistung
     * @param string|null        $leikaKey               leikakey der zuverwendenden Leistungen
     * @param string|null        $areaId                 id des Gebietes
     * @param int|null           $offset                 Startindex für die Rückgabe der Ergebnisse. Wert muss > 0 sein.
     * @param int|null           $limit                  maximale Anzahl von Ergebnissen
     * @param array<string>|null $selectAttributes       Einschränkung der Attribute die in der Ergebnismenge zurückgegeben werden sollen. Attribute innerhalb einer Struktur können auch angegeben werden. Dabei muss der Name des Hauptattributes plus ein '.' und der Name des Attributes in der Struktur angegeben werden. Beispiel: [ 'position', 'lastname', 'addresses.city'] [String]
     */
    public function __construct(
        public string $id,
        public array $subOrganisationalUnits = [],
        public ?string $pstId = null,
        public ?string $leikaKey = null,
        public ?string $areaId = null,
        public ?int $offset = null,
        public ?int $limit = null,
        /**
         * @var string[]|null
         */
        public ?array $selectAttributes = null,
        public ?string $sortAttribute = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function getQueryParameters(): array
    {
        return array_filter([
            'subOrganisationalUnits' => $this->subOrganisationalUnits,
            'pstId' => $this->pstId,
            'leikaKey' => $this->leikaKey,
            'areaId' => $this->areaId,
            'offset' => $this->offset,
            'limit' => $this->limit,
            'selectAttributes' => $this->selectAttributes,
            'sortAttribute' => $this->sortAttribute,
        ]);
    }
}
