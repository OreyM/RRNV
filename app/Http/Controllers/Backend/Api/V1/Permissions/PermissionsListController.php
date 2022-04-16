<?php

namespace App\Http\Controllers\Backend\Api\V1\Permissions;


use App\Actions\Backend\Roles\GetSelectedPermissionsForRoleAction;
use App\Core\Exceptions\FailedValidationExeption;
use App\Http\Controllers\BackendApiController;

class PermissionsListController extends BackendApiController
{

    public function forSelection()
    {
        try {
            $permissions = config('permissions');

            return $this->respondWithSuccess([
                'permissions' => $permissions,
            ]);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

    public function selected(string $roleAlias)
    {
        try {
            $permissions = \Action::call(GetSelectedPermissionsForRoleAction::class, [
                'roleAlias' => $roleAlias
            ]);

            return $this->respondWithSuccess([
                'permissions' => $permissions,
            ]);
        } catch (\Exception $e) {
            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }
}
