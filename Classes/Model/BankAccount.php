<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Zahlungsdaten.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#BankAccount
 */
readonly class BankAccount
{
    /** @var string Empfänger */
    public string $payeeName;

    /** @var string Kreditinstitut */
    public string $bank;

    /** @var string IBAN */
    public string $IBAN;

    /** @var string BIC */
    public string $BIC;

    /** @var bool öffentlich sichtbar */
    public bool $publicVisible;

    /** @var NamedReference[] Einschränkung auf Leitungen */
    public array $publicServiceTypes;

    /** @var string Hinweise zur Verwendung */
    public string $notes;

    public function __construct(\stdClass $data)
    {
        $this->payeeName = $data->payeeName;
        $this->bank = $data->bank ?? '';
        $this->IBAN = $data->IBAN ?? '';
        $this->BIC = $data->BIC ?? '';
        $this->publicVisible = $data->publicVisible;
        $this->publicServiceTypes = array_map(fn (\stdClass $publicServiceType) => new NamedReference($publicServiceType), $data->publicServiceTypes);
        $this->notes = $data->notes ?? '';
    }
}
