<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Validator;

class AuthAdminController extends Controller
{

  /**
     * Create a new AuthAdminController instance.
     *
     * @return void
     */
    public function __constructAdmin() {
        $this->middleware('auth:api', ['except' => ['Adminlogin', 'Adminregister']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function Adminlogin(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);

    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function Adminregister(Request $Adminrequest) {
        $validator = Validator::make($Adminrequest->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $admin = Admin::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($Adminrequest->password)]

                ));

        return response()->json([
            'message' => 'User successfully registered',
            'admin' => $admin
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *nouveau commentaires
     * @return \Illuminate\Http\JsonResponse
     */
    public function Adminlogout() {
        auth()->Adminlogout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function Adminrefresh() {
        return $this->createNewToken(auth()->Adminrefresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function AdminProfile() {
        return response()->json(auth()->admin());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($Admintoken){
        return response()->json([
            'access_token' => $Admintoken,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'admin' => auth()->admin()
        ]);
    }

}
