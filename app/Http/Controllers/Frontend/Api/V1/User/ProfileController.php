<?php

namespace App\Http\Controllers\Frontend\Api\V1\User;


use App\Http\Controllers\FrontendApiController;
use Illuminate\Support\Facades\Auth;

class ProfileController extends FrontendApiController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke()
    {
        $responseMessage = 'user profile';

        $data = Auth::guard('api')->user();

        return response()->json([
            'success'   => true,
            'message'   => $responseMessage,
            'data'      => $data
        ], 200);
    }
}
