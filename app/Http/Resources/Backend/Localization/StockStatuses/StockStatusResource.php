<?php

namespace App\Http\Resources\Backend\Localization\StockStatuses;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class StockStatusResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id'            => $this->resource->id,
            'statusName'          => $this->resource->name,
            'createdAt'     => Carbon::parse($this->resource->created_at)->format('d.m.Y'),
            'updatedAt'     => Carbon::parse($this->resource->updated_at)->format('d.m.Y'),
        ];
    }
}
