<?php

declare(strict_types=1);

namespace Hardanders\ZfinderApiClient\Model;

/**
 * Gebühr.
 *
 * @doc https://restapi-v4-rp.infodienste.de/doc/index.html#Charge
 */
readonly class Charge
{
    /** @var string Gebührentyp */
    public string $type;

    /** @var string Gebiet */
    public string $restrictedArea;

    /** @var string Bezeichnung */
    public string $name;

    /** @var string Bemerkung */
    public string $note;

    /** @var bool|null Zahlung per Vorkasse möglich */
    public ?bool $prepayment;

    /** @var string Währung */
    public string $currency;

    /** @var string Kassenzeichen */
    public string $paymentNumber;

    /** @var string Url zur Gebührenbildung */
    public string $chargeSpecificationUrl;

    /** @var \DateTimeImmutable|null gültig von */
    public ?\DateTimeImmutable $validFrom;

    /** @var \DateTimeImmutable|null gültig bis */
    public ?\DateTimeImmutable $validTo;

    /** @var float|null Betrag, gefüllt wenn Typ FIX */
    public ?float $amount;

    /** @var float|null Obergrenze, gefüllt wenn Typ VARIABLE */
    public ?float $upperLimit;

    /** @var float|null Untergrenze, gefüllt wenn Typ VARIABLE */
    public ?float $lowerLimit;

    public function __construct(\stdClass $data)
    {
        $this->type = $data->type;
        $this->restrictedArea = $data->restrictedArea ?? '';
        $this->name = $data->name;
        $this->note = $data->note ?? '';
        $this->prepayment = $data->prepayment;
        $this->currency = $data->currency;
        $this->paymentNumber = $data->paymentNumber ?? '';
        $this->chargeSpecificationUrl = $data->chargeSpecificationUrl ?? '';
        $this->validFrom = property_exists($data, 'validFrom') ? new \DateTimeImmutable($data->validFrom) : null;
        $this->validTo = property_exists($data, 'validTo') ? new \DateTimeImmutable($data->validTo) : null;
        $this->amount = $data->amount ?? null;
        $this->upperLimit = $data->upperLimit ?? null;
        $this->lowerLimit = $data->lowerLimit ?? null;
    }
}
