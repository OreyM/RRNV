<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelpers;
use App\Services\Backend\PageConfigService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class BackendApiController extends BaseController
{
    use ApiResponseHelpers, AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }
}
