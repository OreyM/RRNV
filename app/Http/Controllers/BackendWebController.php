<?php

namespace App\Http\Controllers;

use App\Services\Backend\PageConfigService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class BackendWebController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
