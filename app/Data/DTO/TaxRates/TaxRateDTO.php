<?php

namespace App\Data\DTO\TaxRates;

use Spatie\DataTransferObject\DataTransferObject;

class TaxRateDTO extends DataTransferObject
{
    public float $rate;
    public string $type;
}
