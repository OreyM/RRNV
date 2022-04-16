<?php

namespace App\Http\Controllers\Backend\Api\V1\Catalog\Products;


use App\Actions\Backend\Catalog\Products\GetAllProductsAction;
use App\Actions\Backend\Catalog\Products\GetFiteredProductAction;
use App\Actions\Backend\Catalog\Products\GetSortedProductsAction;
use App\Http\Controllers\BackendApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsListController extends BackendApiController
//class ProductsListController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:view-products');
    }

    public function all()
    {
        try {
            return \Action::call(GetAllProductsAction::class);
        } catch (\Exception $e) {
            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

    public function filtered()
    {
        try {
            return \Action::call(GetFiteredProductAction::class);
        } catch (\Exception $e) {
            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

    public function sorted()
    {
        try {
            return \Action::call(GetSortedProductsAction::class);
        } catch (\Exception $e) {
            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }
}
