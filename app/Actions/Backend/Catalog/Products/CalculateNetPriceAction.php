<?php


namespace App\Actions\Backend\Catalog\Products;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Localization\TaxRateRepository;
use App\Http\Requests\Backend\Product\NetPriceRequest;
use App\Models\TaxRate;

class CalculateNetPriceAction extends Action
{

    private NetPriceRequest $request;
    private TaxRateRepository $repository;

    public function __construct(NetPriceRequest $request, TaxRateRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    protected function run(): float
    {
        $tax = $this->repository->getRate($this->request->tax_rate_id);

        if ($tax->type === TaxRate::FIXED_AMOUNT)
            return $this->request->gross_price - $tax->rate;

        if ($tax->type === TaxRate::PERCENTAGE)
            return $this->request->gross_price - ($this->request->gross_price * $tax->rate / 100);
    }
}
