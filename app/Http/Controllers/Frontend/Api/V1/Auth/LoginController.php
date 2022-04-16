<?php

namespace App\Http\Controllers\Frontend\Api\V1\Auth;

use App\Http\Controllers\FrontendApiController;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends FrontendApiController
{
    public function __invoke(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'email'     => 'required|string',
            'password'  => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->toArray()
            ], 500);
        }

        $credentials = $request->only(['email', 'password']);

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            if (! \Auth::guard('api_session')->attempt($credentials)) {

                $responseMessage = 'Invalid username or password';

                return response()->json([
                    'success'   => false,
                    'message'   => $responseMessage,
                    'error'     => $responseMessage
                ], 422);
            }

            $accessToken = \Auth::guard('api_session')->user()->createToken('authToken')->accessToken;

            $responseMessage = 'Login Successful';

            return $this->respondWithToken($accessToken, $responseMessage, auth()->user());
        } else {
            $responseMessage = 'Sorry, this user does not exist';

            return response()->json([
                'success'   => false,
                'message'   => $responseMessage,
                'error'     => $responseMessage
            ], 422);
        }
    }
}
