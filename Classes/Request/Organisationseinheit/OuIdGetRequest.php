<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Request\Organisationseinheit;

class OuIdGetRequest
{
    /**
     * @param string   $id               id der Organisationseinheit
     * @param string[] $selectAttributes Einschränkung der Attribute die in der Ergebnismenge zurückgegeben werden sollen. Attribute innerhalb einer Struktur können auch angegeben werden. Dabei muss der Name des Hauptattributes plus ein '.' und der Name des Attributes in der Struktur angegeben werden. Beispiel: ['position', 'lastname', 'addresses.city']
     */
    public function __construct(
        public string $id,
        public array $selectAttributes = [],
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function getQueryParams(): array
    {
        return array_filter([
            'selectAttributes' => $this->selectAttributes,
        ]);
    }
}
