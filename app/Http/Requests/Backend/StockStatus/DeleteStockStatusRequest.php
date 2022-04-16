<?php


namespace App\Http\Requests\Backend\StockStatus;


use App\Core\Abstracts\RequestJSON;

/**
 * Class DeleteStockStatusRequest
 * @package App\Http\Requests\Backend\StockStatus
 * @property int $id
 */
class DeleteStockStatusRequest extends RequestJSON
{

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:stock_statuses,id'],
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Selected stock status is not defined.',
        ];
    }
}
