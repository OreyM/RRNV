<?php

namespace App\Http\Requests\Backend\StockStatus;


use App\Core\Abstracts\RequestJSON;

/**
 * Class UpdateStockStatusRequest
 * @package App\Http\Requests\Backend\StockStatus
 * @property int $id
 * @property string $name
 */
class UpdateStockStatusRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'id'    => ['required', 'integer', 'exists:stock_statuses,id'],
            'name'  => ['required', 'string', 'max:256', 'unique:stock_statuses,name'],
        ];
    }

    public function messages()
    {
        return [
            'id.exists'   => 'Selected stock status is not defined.',
            'name.unique' => 'Name for the stock status is already in use.',
        ];
    }
}
