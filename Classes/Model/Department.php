<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Ressort.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#Department
 */
readonly class Department
{
    public string $id;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string E-Mail-Empfänger des Ressort */
    public string $emailReceivers;

    public \DateTimeImmutable $lastUpdated;

    public function __construct(\stdClass $data)
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->emailReceivers = $data->email_receivers;
        $this->lastUpdated = new \DateTimeImmutable($data->last_updated);
    }
}
