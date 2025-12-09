<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\ValueObject;

readonly class FormResult
{
    public int $count;

    public int $totalCount;

    /** @var FormResultEntry[] */
    public array $results;

    public function __construct(\stdClass $object)
    {
        $this->count = $object->count;
        $this->totalCount = $object->totalCount;
        $this->results = array_map(fn (\stdClass $result) => new FormResultEntry($result), $object->results);
    }

    /**
     * @return Form[]
     */
    public function getForms(): array
    {
        return array_map(fn (FormResultEntry $result) => $result->form, $this->results);
    }
}
