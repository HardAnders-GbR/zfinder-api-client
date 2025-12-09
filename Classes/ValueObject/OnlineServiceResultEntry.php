<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class OnlineServiceResultEntry
{
    public float $score;

    public OnlineService $object;

    public function __construct(
        \stdClass $object,
    ) {
        $this->score = $object->score;
        $this->object = new OnlineService($object->object);
    }
}
