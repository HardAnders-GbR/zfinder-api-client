<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * OrganisationalUnitStructureNode.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#OrganisationalUnitStructureNode
 */
readonly class OrganisationalUnitStructureNode
{
    public string $id;

    /** @var string Bezeichnung */
    public string $name;

    public ?NamedReference $organisationalUnit;

    /** @var string Beschreibung des Hierachrieknotens */
    public string $description;

    /** @var OrganisationalUnitStructureNode[] Untergordnete Knoten einer Hierachie von Organisationseinheiten */
    public array $children;

    public \DateTimeImmutable $lastUpdated;

    public function __construct(\stdClass $object)
    {
        $this->id = $object->id;
        $this->name = $object->name ?? '';
        $this->organisationalUnit = property_exists($object, 'organisationalUnit') ? new NamedReference($object->organisationalUnit) : null;
        $this->description = $object->description ?? '';
        $this->children = array_map(fn (\stdClass $child) => new OrganisationalUnitStructureNode($child), $object->children);
        $this->lastUpdated = new \DateTimeImmutable($object->lastUpdated);
    }
}
