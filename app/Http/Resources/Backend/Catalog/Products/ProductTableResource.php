<?php

namespace App\Http\Resources\Backend\Catalog\Products;


use Illuminate\Http\Resources\Json\JsonResource;

class ProductTableResource extends JsonResource
{

    private string $defaultImg = 'storage/images/default/products/default-product-image-table.jpg';

    public function toArray($request): array
    {
        return [
            'id'            => $this->resource->id,
            'name'          => $this->resource->product_name,
            'alias'         => $this->resource->alias,
            'article'       => $this->resource->article,
            'quantity'      => $this->resource->quantity,
            'stock_status'   => $this->resource->stock_status,
            'image'         => $this->resource->image ?? asset($this->defaultImg),
            'price'         => $this->resource->price,
            'is_active'      => $this->resource->is_active,
        ];
    }
}
