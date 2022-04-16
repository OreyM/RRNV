<?php

namespace App\Http\Resources\Backend\Catalog\Manufacturers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ManufacturerCollection extends ResourceCollection
{

    public function toArray($request): array
    {
        $count = $this->collection->count();

        return [
            'count' => $count,
            'data'  => $this->collection
        ];
    }
}
