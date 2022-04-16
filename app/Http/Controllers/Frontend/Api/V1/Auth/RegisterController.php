<?php


namespace App\Http\Controllers\Frontend\Api\V1\Auth;


use App\Http\Controllers\FrontendApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends FrontendApiController
{

    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function __invoke(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'      => 'required|string',
            'email'     => 'required|string|unique:users',
            'password'  => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->toArray()
            ], 500);
        }

        $data = [
            "name"      => $request->name,
            "email"     => $request->email,
            "password"  => Hash::make($request->password)
        ];

        $this->user->create($data);

        $responseMessage = 'Registration Successful';

        return response()->json([
            'success' => true,
            'message' => $responseMessage
        ], 200);
    }
}
