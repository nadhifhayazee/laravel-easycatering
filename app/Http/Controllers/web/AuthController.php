<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Validator;


class AuthController extends Controller
{
    
    //create user

    public function signup(Request $request){
        $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|string|email|unique:users',
            'password'  => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'message' => 'User berhasil dibuat!'
        ], 201);

    }

    //login and create token
    public function login(Request $request){
        $request->validate([
            'email'         => 'required|string|email',
            'password'      => 'required|string',
            'remember_me'   => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Tidak Terauntentikasi!'
            ], 401);

        $user = $request->user();
        //$user = Auth::user();    
        $tokenResult = $user->createToken('Personal Access Token');
        $token =  $tokenResult->token;

        if($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return response()->json([
            'access_token'  => $tokenResult->accessToken,
            'token_type'    => 'Bearer',
            'expires_at'    => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    //logout user (Revoke token)
    public function logout(Request $request){
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Logout berhasil!'
        ]);
    }

    //Get the authenticated User

    public function user(Request $request){
        return response()->json($request->user());
    }
}
