<?php


namespace App\Http\Controllers\Backend\Api\V1\Roles;


use App\Actions\Backend\Roles\CreateRoleAction;
use App\Actions\Backend\Roles\DeleteRoleAction;
use App\Actions\Backend\Roles\UpdateRoleDataAction;
use App\Core\Exceptions\FailedValidationExeption;
use App\Exceptions\RoleHandlingException;
use App\Http\Controllers\BackendApiController;

class RoleController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:create-role', ['only' => ['create']]);
        $this->middleware('permission:edit-role', ['only' => ['update']]);
        $this->middleware('permission:delete-role', ['only' => ['delete']]);
    }

    public function create()
    {
        try {
            \Action::call(CreateRoleAction::class);

            return $this->respondOk('Role has been created.');
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
            \Action::call(UpdateRoleDataAction::class);

            return $this->respondOk('Role has been updated.');
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
            \Action::call(DeleteRoleAction::class);

            return $this->respondOk('Role has been deleted.');
        } catch (FailedValidationExeption $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (RoleHandlingException $e) {

            return $this->respondError($e->getMessage(), $e);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }
}
