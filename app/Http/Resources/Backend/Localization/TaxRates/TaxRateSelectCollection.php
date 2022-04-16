<?php

namespace App\Http\Resources\Backend\Localization\TaxRates;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TaxRateSelectCollection extends ResourceCollection
{

    public function toArray($request): array
    {
        return [
            'data'  => $this->collection
        ];
    }
}
