<?php

namespace App\Http\Resources\Backend\Roles;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id'            => $this->resource->id,
            'alias'          => $this->resource->name,
            'displayName'   => $this->resource->display_name,
            'description'   => $this->resource->description,
            'createdAt'     => Carbon::parse($this->resource->created_at)->format('d.m.Y'),
            'updatedAt'     => Carbon::parse($this->resource->updated_at)->format('d.m.Y'),
        ];
    }
}
