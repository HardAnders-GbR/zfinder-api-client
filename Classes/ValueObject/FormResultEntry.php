<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class FormResultEntry
{
    public float $score;
    public Form $form;

    public function __construct(
        \stdClass $object,
    ) {
        $this->score = $object->score;
        $this->form = new Form($object->object);
    }
}
