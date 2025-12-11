<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#DepartmentResultEntry
 */
readonly class DepartmentResultEntry
{
    /** @var float Wertigkeit des Suchtreffers */
    public float $score;

    public Department $department;

    public function __construct(\stdClass $data)
    {
        $this->score = $data->score;
        $this->department = new Department($data->department);
    }
}
