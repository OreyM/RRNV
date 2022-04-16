<?php

namespace App\Http\Resources\Backend\Roles;


use Illuminate\Http\Resources\Json\JsonResource;

class RoleForSelectionResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'value'  => $this->resource->name,
            'text'   => $this->resource->display_name,
        ];
    }
}
