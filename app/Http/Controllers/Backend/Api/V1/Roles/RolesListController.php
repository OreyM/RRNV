<?php

namespace App\Http\Controllers\Backend\Api\V1\Roles;


use App\Actions\Backend\Roles\GetAllRolesAction;
use App\Actions\Backend\Roles\GetRolesForSelectionAction;
use App\Http\Controllers\BackendApiController;

class RolesListController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:view-roles', ['only' => ['all']]);
    }

    public function all()
    {
        try {
            $rolesCollection = \Action::call(GetAllRolesAction::class);

            return $this->respondWithSuccess([
                'roles' => $rolesCollection,
            ]);
        } catch (\Exception $e) {
            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }

    public function forSelection()
    {
        try {
            $rolesCollection = \Action::call(GetRolesForSelectionAction::class);

            return $this->respondWithSuccess([
                'roles' => $rolesCollection,
            ]);
        } catch (\Exception $e) {

            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }
}
