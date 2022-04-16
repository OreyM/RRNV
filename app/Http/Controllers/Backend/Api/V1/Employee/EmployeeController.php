<?php

namespace App\Http\Controllers\Backend\Api\V1\Employee;


use App\Actions\Backend\Employee\ChangeEmployeeStatusAction;
use App\Actions\Backend\Employee\CreateEmployeeAction;
use App\Actions\Backend\Employee\DeleteEmployeeAction;
use App\Actions\Backend\Employee\UpdateEmployeeDataAction;
use App\Core\Exceptions\FailedValidationExeption;
use App\Exceptions\EmployeePermissionException;
use App\Http\Controllers\BackendApiController;

class EmployeeController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:create-employee', ['only' => ['create']]);
        $this->middleware('permission:edit-employee', ['only' => ['update', 'changeStatus']]);
        $this->middleware('permission:delete-employee', ['only' => ['delete']]);
    }

    public function create()
    {
        try {
            \Action::call(CreateEmployeeAction::class);

            return $this->respondOk('Employee has been created.');
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
            \Action::call(UpdateEmployeeDataAction::class);

            return $this->respondOk('Employee data has been updated.');
        } catch (FailedValidationExeption $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

    public function changeStatus()
    {
        try {
            $res = \Action::call(ChangeEmployeeStatusAction::class);

            return $this->respondOk('Employee status has been updated.');
        } catch (FailedValidationExeption $e) {

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
            \Action::call(DeleteEmployeeAction::class);

            return $this->respondOk('Employee has been deleted.');
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
