<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Request\Allgemein;

readonly class CommonOustructureIdGetRequest
{
    public function __construct(
        public string $id,
    ) {
    }
}
