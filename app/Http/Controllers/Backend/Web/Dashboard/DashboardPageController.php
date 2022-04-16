<?php

namespace App\Http\Controllers\Backend\Web\Dashboard;


use App\Actions\Backend\Catalog\Products\GenerateProductAliasAction;
use App\Actions\Backend\Roles\GetSelectedPermissionsForRoleAction;
use App\Core\Abstracts\Action;
use App\Data\Repositories\Backend\Catalog\ManufacturerRepository;
use App\Data\Repositories\Backend\Catalog\ProductRepository;
use App\Data\Repositories\Backend\EmployeeRepository;
use App\Http\Controllers\BackendPageController;
use App\Http\Requests\Backend\Product\ProductAliasRequest;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardPageController extends BackendPageController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware(['permission:dashboard']);

        $this->title = 'Dashboard';
        $this->breadcrumb = 'dashboard-brcr';
    }

    public function __invoke()
    {

        \Action::call(GenerateProductAliasAction::class);

//        dd($prod->toArray());

//        $role = Role::where('name', 'admin')
//            ->with('permissions')
//            ->first()->permissions->map(function ($permission) {
//                return $permission->name;
//            })->toArray();
//
//        dd($role);


//        dump(\Auth::user()->roles);
//        dump(\Auth::user()->isAbleTo('remove-employee'));
//        dump(config('roles'));
//        dump(config('permissions'));
//        dump(Role::where('name', 'super_admin')->first());
//        dd(1);

//        return response()->json([
//            $repository->getAllEmployees()
//        ]);

//        DB::connection()->enableQueryLog();
//        DB::transaction(function() use ($repository){
//            $repository->getAllEmployees();
//        });
//        dd(DB::getQueryLog());

        return view('pages.dashboard', [
            'title'      => $this->title,
            'breadcrumb' => $this->breadcrumb,
        ]);
    }
}
