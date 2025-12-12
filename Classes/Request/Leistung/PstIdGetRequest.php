<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Request\Leistung;

class PstIdGetRequest
{
    /**
     * @param string      $id               id der Leistung
     * @param string|null $areaId           id des Gebietes wofür die Leistung spezialisiert werden soll
     * @param string[]    $selectAttributes Einschränkung der Attribute die in der Ergebnismenge zurückgegeben werden sollen. Attribute innerhalb einer Struktur können auch angegeben werden. Dabei muss der Name des Hauptattributes plus ein '.' und der Name des Attributes in der Struktur angegeben werden. Beispiel: [ 'position', 'lastname', 'addresses.city'] [String]
     */
    public function __construct(
        public string $id,
        public ?string $areaId = null,
        public array $selectAttributes = [],
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
