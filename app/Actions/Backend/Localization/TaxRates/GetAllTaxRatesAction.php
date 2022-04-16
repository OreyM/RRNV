<?php

namespace App\Actions\Backend\Localization\TaxRates;


use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Localization\TaxRateRepository;
use App\Http\Resources\Backend\Localization\TaxRates\TaxRateSelectCollection;

class GetAllTaxRatesAction extends Action
{

    private TaxRateRepository $repository;

    public function __construct(TaxRateRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function run(): TaxRateSelectCollection
    {
        return $this->repository->getTaxRatesForSelectTag();
    }
}
