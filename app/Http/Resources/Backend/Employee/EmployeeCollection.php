<?php

namespace App\Http\Resources\Backend\Employee;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeeCollection extends ResourceCollection
{

    public function toArray($request)
    {
        $count = $this->collection->count();

        return [
            'count' => $count,
            'data'  => $this->collection
        ];
    }
}
