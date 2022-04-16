<?php


namespace App\Http\Controllers\Backend\Api\V1\Catalog\Products;


use App\Actions\Backend\Catalog\Products\CalculateNetPriceAction;
use App\Actions\Backend\Catalog\Products\GenerateProductAliasAction;
use App\Core\Exceptions\FailedValidationExeption;
use App\Exceptions\ProductAliasExistsExeption;
use App\Http\Controllers\BackendApiController;
use App\Http\Requests\Backend\Product\ProductAliasRequest;

class ProductServicesController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:create-product');
        $this->middleware('permission:edit-product');
    }

    public function aliasGenerator(ProductAliasRequest $request)
    {
        try {
            $alias = \Action::call(GenerateProductAliasAction::class, [
                'request' => $request
            ]);

            return $this->respondWithSuccess([
                'alias' => $alias,
            ]);
        } catch (ProductAliasExistsExeption $e) {

            return $this->respondWithSuccess([
                'alias' => \Str::slug($request->alias),
                'isError' => true,
                'error' => $e->getMessage(),
            ]);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

    public function netPriceCalculation()
    {
        try {
            $netPrice = \Action::call(CalculateNetPriceAction::class);

            return $this->respondWithSuccess([
                'net_price' => $netPrice
            ]);

        } catch (FailedValidationExeption $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }
}
