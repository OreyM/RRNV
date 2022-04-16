<?php

namespace App\Http\Resources\Backend\Localization\TaxRates;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TaxRateSelectResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id'   => $this->resource->id,
            'name' => $this->resource->name,
        ];
    }
}
