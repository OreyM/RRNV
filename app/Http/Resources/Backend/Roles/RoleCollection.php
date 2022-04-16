<?php

namespace App\Http\Resources\Backend\Roles;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleCollection extends ResourceCollection
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
