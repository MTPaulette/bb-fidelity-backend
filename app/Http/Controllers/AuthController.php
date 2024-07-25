<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    // }

    public function store(Request $request) {
        if(!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]), true)) {
            throw ValidationException::withMessages([
                'email' => 'Auth failed. Email not found or incorrect password'
            ]);
            return response([
                'message' => ['These credentials do not match our records.']
            ], 422);
        }
        $user = User::where('email', $request->email)->first();
        // $user = Auth::user();


        $user->tokens()->delete();
        if($user->role_id == 1) {
            $token = $user->createToken('my-app-token', ['admin'])->plainTextToken;
        } else {
            $token = $user->createToken('my-app-token', ['view-profile', 'view-historic'])->plainTextToken;
        }
        //$cookie = cookie('jwt', $token, 60*24); // expire in 1 day
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);//->withCookie($cookie);
    }

    public function destroy(Request $request) {

        // $userTokens = $request->user()->tokens;
        // foreach ($userTokens as $token) {
        //     $token->revoke;
        // }
        $request->user()->tokens()->delete();
        
        //return $request->cookie;
        return response([
            'message' => 'Logout user',
            'user' => $request->user()
        ], 201); //->withCookie($cookie);;
    }

    public function user(Request $request) {
        if(isset($request)) {

            return Auth::user();
        }
            return response(['message' => 'unauthorize'], 403);
    }
}
