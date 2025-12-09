<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class SpecialisationText
{
    public string $restrictedArea;

    public string $text;

    /** @var TextBlockExternalLink[] */
    public array $externalLinks;

    /** @var TextBlockAdditions[] */
    public array $legalNorms;

    public function __construct(
        \stdClass $object,
    ) {
        $this->restrictedArea = $object->restrictedArea;
        $this->text = $object->text;
        $this->externalLinks = array_map(fn (\stdClass $externalLink) => new TextBlockExternalLink($externalLink), $object->externalLinks);
        $this->legalNorms = array_map(fn (\stdClass $legalNorm) => new TextBlockAdditions($legalNorm), $object->legalNorms);
    }
}
