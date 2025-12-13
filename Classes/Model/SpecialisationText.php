<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

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

    public function __construct(\stdClass $data)
    {
        $this->restrictedArea = $data->restrictedArea ?? '';
        $this->text = $data->text ?? '';
        $this->externalLinks = array_map(fn (\stdClass $externalLink) => new TextBlockExternalLink($externalLink), $data->externalLinks ?? []);
        $this->legalNorms = array_map(fn (\stdClass $legalNorm) => new TextBlockAdditions($legalNorm), $data->legalNorms);
    }
}
