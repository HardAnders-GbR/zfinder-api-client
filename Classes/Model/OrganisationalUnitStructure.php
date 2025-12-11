<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Hierachie von Organisationseinheiten.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OrganisationalUnitStructure
 */
readonly class OrganisationalUnitStructure
{
    public string $id;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string Bezeichnung */
    public string $title;

    /** @var string Bezeichnung */
    public string $description;

    public OrganisationalUnitStructureNode $structure;

    public \DateTimeImmutable $lastUpdated;

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->title = $data->title;
        $this->description = $data->description ?? '';
        $this->structure = new OrganisationalUnitStructureNode($data->structure);
        $this->lastUpdated = new \DateTimeImmutable($data->lastUpdated);
    }
}
