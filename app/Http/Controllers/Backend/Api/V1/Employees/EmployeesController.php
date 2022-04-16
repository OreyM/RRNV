<?php


namespace App\Http\Controllers\Backend\Api\V1\Employees;


use App\Actions\Backend\Employees\GetAllEmployeesAction;
use App\Core\Responses\ResponseJSON;
use App\Http\Controllers\BackendApiController;
use App\Http\Responses\Backend\Empoyee\EmployeesSuccessResponse;
use Illuminate\Http\JsonResponse;

class EmployeesController extends BackendApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('permission:view-employees', ['only' => ['all']]);
    }

    public function all(): JsonResponse
    {
        try {
            $employeesCollection = \Action::call(GetAllEmployeesAction::class);

            return $this->respondWithSuccess([
                'employees' => $employeesCollection,
            ]);
        } catch (\Exception $e) {
            return $this->respondError(
                'An error occurred while processing the request. Contact your administrator.',
                $e
            );
        }
    }
}
