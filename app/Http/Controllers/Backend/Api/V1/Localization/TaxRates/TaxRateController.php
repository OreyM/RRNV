<?php

namespace App\Http\Controllers\Backend\Api\V1\Localization\TaxRates;


use App\Core\Exceptions\FailedValidationExeption;
use App\Http\Controllers\BackendApiController;
use Cassandra\Exception\ExecutionException;

class TaxRateController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:tax-rates');
    }

    public function create()
    {
//        try {
//            \Action::call(CreateStockStatusAction::class);
//
//            return $this->respondOk('Stock Status has been created.');
//        } catch (FailedValidationExeption $e) {
//
//            return $this->respondError($e->getMessage(), $e);
//        } catch (\Exception $e) {
//
//            return $this->respondError(
//                'An error occurred while processing the request. Contact your administrator.',
//                $e
//            );
//        }
    }

    public function update()
    {
//        try {
//            \Action::call(UpdateStockStatusDataAction::class);
//
//            return $this->respondOk('Stock Status has been updated.');
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
    }

    public function delete()
    {
//        try {
//            \Action::call(DeleteStockStatusAction::class);
//
//            return $this->respondOk('Stock Status has been deleted.');
//        } catch (FailedValidationExeption $e) {
//
//            return $this->respondError($e->getMessage(), $e);
//        } catch (StockStatusHandlingException $e) {
//
//            return $this->respondError($e->getMessage(), $e);
//        } catch (\Exception $e) {
//
//            return $this->respondError(
//                'An error occurred while processing the request. Contact your administrator.',
//                $e
//            );
//        }
    }
}
