<?php

namespace App\Http\Resources\Backend\Localization\StockStatuses;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StockStatusCollection extends ResourceCollection
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
