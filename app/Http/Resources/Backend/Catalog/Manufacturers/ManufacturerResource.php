<?php

namespace App\Http\Resources\Backend\Catalog\Manufacturers;


use Illuminate\Http\Resources\Json\JsonResource;

class ManufacturerResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id'                => $this->resource->id,
            'manufacturerName'  => $this->resource->name,
            'image'             => $this->resource->image,
        ];
    }
}
