<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

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

    public function __construct(\stdClass $data)
    {
        $this->type = new Type($data->type);
        $this->text = $data->text ?? '';
        $this->externalLinks = array_map(fn (\stdClass $externalLink) => new TextBlockExternalLink($externalLink), $data->externalLinks ?? []);
        $this->specialisations = array_map(fn (\stdClass $specialisationText) => new SpecialisationText($specialisationText), $data->specialisations ?? []);
    }
}
