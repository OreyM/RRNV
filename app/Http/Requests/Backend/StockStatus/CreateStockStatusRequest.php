<?php

namespace App\Http\Requests\Backend\StockStatus;


use App\Core\Abstracts\RequestJSON;

/**
 * Class UpdateStockStatusRequest
 * @package App\Http\Requests\Backend\StockStatus
 * @property string $name
 */
class CreateStockStatusRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'name'  => ['required', 'string', 'max:256', 'unique:stock_statuses,name'],
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Name for the stock status is already in use.',
        ];
    }
}
