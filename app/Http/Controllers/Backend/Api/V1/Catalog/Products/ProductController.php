<?php

namespace App\Http\Controllers\Backend\Api\V1\Catalog\Products;


use App\Actions\Backend\Catalog\Products\ChangeProductStatusAction;
use App\Actions\Backend\Catalog\Products\RemoveProductAction;
use App\Actions\Backend\Catalog\Products\StoreNewProductAction;
use App\Core\Exceptions\FailedValidationExeption;
use App\Http\Controllers\BackendApiController;
use Cassandra\Exception\ExecutionException;
use Illuminate\Http\Request;

class ProductController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:create-product', ['only' => ['store']]);
        $this->middleware('permission:edit-product', ['only' => ['update', 'changeStatus']]);
        $this->middleware('permission:remove-product', ['only' => ['remove']]);
        $this->middleware('permission:delete-product', ['only' => ['delete']]);
    }

    public function store(Request $request)
    {
        try {
            $res = \Action::call(StoreNewProductAction::class);

            return $this->respondWithSuccess($res);
//            return $this->respondOk('Manufacturer has been created.');
        } catch (FailedValidationExeption $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

//    public function update()
//    {
//        try {
//            \Action::call(UpdateManufacturerDataAction::class);
//
//            return $this->respondOk('Manufacturer has been updated.');
//        } catch (FailedValidationExeption $e) {
//
//            return $this->respondError($e->getMessage(), $e);
//        } catch (ExecutionException $e) {
//
//            return $this->respondError($e->getMessage(), $e);
//        } catch (\Exception $e) {
//
//            return $this->respondError(
//                'An error occurred while processing the request. Contact your administrator.',
//                $e
//            );
//        }
//    }

    public function changeStatus()
    {
        try {
            $res = \Action::call(ChangeProductStatusAction::class);

            return $this->respondOk('Product status has been updated.');
        } catch (FailedValidationExeption $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

    public function remove()
    {
        try {
            \Action::call(RemoveProductAction::class);

            return $this->respondOk('Product has been deleted.');
        } catch (FailedValidationExeption $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (ManufacturerHandlingException $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

//    public function delete()
//    {
//        try {
//            \Action::call(DeleteManufacturerAction::class);
//
//            return $this->respondOk('Manufacturer has been deleted.');
//        } catch (FailedValidationExeption $e) {
//
//            return $this->respondError($e->getMessage(), $e);
//        } catch (ManufacturerHandlingException $e) {
//
//            return $this->respondError($e->getMessage(), $e);
//        } catch (\Exception $e) {
//
//            return $this->respondError(
//                'An error occurred while processing the request. Contact your administrator.',
//                $e
//            );
//        }
//    }
}
