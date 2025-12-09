<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class TextBlock
{
    public Type $type;

    public string $text;

    /** @var TextBlockExternalLink[] */
    public array $externalLinks;

    /** @var SpecialisationText[] */
    public array $specialisations;

    public function __construct(
        \stdClass $object,
    ) {
        $this->type = new Type($object->type);
        $this->text = $object->text ?? '';
        $this->externalLinks = array_map(fn (\stdClass $externalLink) => new TextBlockExternalLink($externalLink), $object->externalLinks);
        $this->specialisations = array_map(fn (\stdClass $specialisationText) => new SpecialisationText($specialisationText), $object->specialisations);
    }
}
