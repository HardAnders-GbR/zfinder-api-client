<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

/**
 * Textblock einer Leistung.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#TextBlock
 */
readonly class TextBlock
{
    public Type $type;

    /** @var string Inhalt des Textblockes */
    public string $text;

    /** @var TextBlockExternalLink[] Externe Links die Informationen zu dem Text enthalten. */
    public array $externalLinks;

    /** @var SpecialisationText[] Spezialisierungen des Textblockes */
    public array $specialisations;

    public function __construct(\stdClass $object)
    {
        $this->type = new Type($object->type);
        $this->text = $object->text ?? '';
        $this->externalLinks = array_map(fn (\stdClass $externalLink) => new TextBlockExternalLink($externalLink), $object->externalLinks);
        $this->specialisations = array_map(fn (\stdClass $specialisationText) => new SpecialisationText($specialisationText), $object->specialisations);
    }
}
