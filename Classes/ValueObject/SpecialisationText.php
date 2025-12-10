<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * Spezialisierung eines Textblockes einer Leistung.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#SpecialisationText
 */
readonly class SpecialisationText
{
    /** @var string Gebiet */
    public string $restrictedArea;

    /** @var string Spezialisierter Inhalt für den Textblock */
    public string $text;

    /** @var TextBlockExternalLink[] Externe Links die Informationen zu dem Text enthalten. */
    public array $externalLinks;

    /** @var TextBlockAdditions[] Rechtsvorschriften zu der Leistung. */
    public array $legalNorms;

    public function __construct(\stdClass $object)
    {
        $this->restrictedArea = $object->restrictedArea;
        $this->text = $object->text;
        $this->externalLinks = array_map(fn (\stdClass $externalLink) => new TextBlockExternalLink($externalLink), $object->externalLinks);
        $this->legalNorms = array_map(fn (\stdClass $legalNorm) => new TextBlockAdditions($legalNorm), $object->legalNorms);
    }
}
