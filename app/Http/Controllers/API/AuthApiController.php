<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use http\Env\Response;
use Illuminate\Http\Request;
use phpseclib3\Crypt\Hash;

class AuthApiController extends Controller
{
    public function register(Request $request){
        $user = User::create()([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),]);
        return response()->json([
            'success' =>true,
            'token' => $user->createToken($user->email)->accessToken
        ]);
    }
    public function login(Request $request){
        $credentials =$request->only('email','password');
        $user = User::where('email', $credentials['email'])->first();
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Invalid email'
            ], 401);
        }
        if(Auth::attempt($credentials)){
            return response()->json([
                'success' => false,
                'token' => $user->createToken($user->email)->accessToken
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid email or password'
        ], 401);
    }
}
