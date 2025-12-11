<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#FormResultEntry
 */
readonly class FormResultEntry
{
    /** @var float Wertigkeit des Suchtreffers */
    public float $score;

    public Form $form;

    public function __construct(\stdClass $object)
    {
        $this->score = $object->score;
        $this->form = new Form($object->object);
    }
}
