<?php

namespace App\Http\Resources\Backend\Catalog\Products;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductTableCollection extends ResourceCollection
{

    public function toArray($request): array
    {
        return [
            'data'  => $this->collection,
        ];
    }
}
