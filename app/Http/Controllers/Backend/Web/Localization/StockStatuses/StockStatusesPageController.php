<?php

namespace App\Http\Controllers\Backend\Web\Localization\StockStatuses;


use App\Http\Controllers\BackendPageController;

class StockStatusesPageController extends BackendPageController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware(['permission:stock-status']);

        $this->title = 'Stock Statuses';
        $this->breadcrumb = 'stock-statuses-brcr';
    }

    public function __invoke()
    {
        return view('pages.stock-statuses', [
            'title'      => $this->title,
            'breadcrumb' => $this->breadcrumb,
        ]);
    }
}
