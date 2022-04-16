<?php

namespace App\Http\Resources\Backend\Employee;


use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id'            => $this->resource->id,
            'employee'      => $this->resource->employee_name ?? $this->resource->name,
            'email'         => $this->resource->email,
            'isActive'      => $this->resource->is_active,
            'role'          => $this->resource->role_alias,
            'displayRole'   => $this->resource->role_display_name,
            'createdAt'     => Carbon::parse($this->resource->created_at)->format('d.m.Y'),
            'updatedAt'     => Carbon::parse($this->resource->updated_at)->format('d.m.Y'),
        ];
    }
}
