<?php

namespace App\Http\Controllers\Backend\Api\V1\Catalog\Manufacturers;


use App\Actions\Backend\Catalog\Manufacturers\CreateManufacturerAction;
use App\Actions\Backend\Catalog\Manufacturers\DeleteManufacturerAction;
use App\Actions\Backend\Catalog\Manufacturers\UpdateManufacturerDataAction;
use App\Core\Exceptions\FailedValidationExeption;
use App\Exceptions\ManufacturerHandlingException;
use App\Http\Controllers\BackendApiController;
use Cassandra\Exception\ExecutionException;

class ManufacturerController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:manufacturers');
    }

    public function create()
    {
        try {
            \Action::call(CreateManufacturerAction::class);

            return $this->respondOk('Manufacturer has been created.');
        } catch (FailedValidationExeption $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

    public function update()
    {
        try {
            \Action::call(UpdateManufacturerDataAction::class);

            return $this->respondOk('Manufacturer has been updated.');
        } catch (FailedValidationExeption $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (ExecutionException $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

    public function delete()
    {
        try {
            \Action::call(DeleteManufacturerAction::class);

            return $this->respondOk('Manufacturer has been deleted.');
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
}
