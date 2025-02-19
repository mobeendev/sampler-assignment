<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Validator;
use Response;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends BaseController {

    public function __construct() {
        $this->user = new User;
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|string|email|max:255|unique:users',
                    'name' => 'required',
                    'password' => 'required|min:8|strong_password',
                    'dob' => 'date_format:Y-m-d',
                    'address' => 'min:10|max:255'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Errors', $validator->messages());
        }
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        $user = User::first();
        $token = JWTAuth::fromUser($user);

//        return Response::json(compact('token'));
        return response()->json(['success' => true,
                    'message' => 'Registered successfully.',
                    'token' => $token]);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);

        if ($validator->fails()) {
            return $this->sendError('Validation Errors', $validator->messages());
        }

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        // all good so return the token
        return response()->json(['success' => true,
                    'message' => 'Logged in successfully.',
                    'token' => $token]);
    }

    public function me($value='')
    {
        # code...
    }

    public function user(Request $request) {

        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'token_blacklisted'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'token_expired'], 401);
        }
        return response([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function logout() {
        \Cookie::forget('token');
        auth()->logout();
        JWTAuth::invalidate(JWTAuth::parseToken());
        return response()->json(['message' => 'Successfully logged out']);
      
    }

}
