<?php


namespace App\Http\Controllers\Frontend\Api\V1\Auth;


use App\Http\Controllers\FrontendApiController;
use Illuminate\Support\Facades\Auth;

class LogoutController extends FrontendApiController
{

    public function __invoke()
    {
        $user = Auth::guard('api')->user()->token();

        $user->revoke();

        $responseMessage = 'successfully logged out';

        return response()->json([
            'success' => true,
            'message' => $responseMessage
        ], 200);
    }
}
