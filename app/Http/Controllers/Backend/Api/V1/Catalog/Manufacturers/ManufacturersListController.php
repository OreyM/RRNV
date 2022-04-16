<?php

namespace App\Http\Controllers\Backend\Api\V1\Catalog\Manufacturers;


use App\Actions\Backend\Catalog\Manufacturers\GetAllManufacturersAction;
use App\Http\Controllers\BackendApiController;

class ManufacturersListController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:manufacturers');
    }

    public function all()
    {
        try {
            $manufacturersCollection = \Action::call(GetAllManufacturersAction::class);

            return $this->respondWithSuccess([
                'manufacturers' => $manufacturersCollection,
            ]);
        } catch (\Exception $e) {
            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }
}
