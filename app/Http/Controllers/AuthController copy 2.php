<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function store(Request $request) {
        //dd($request);
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
        // $user = User::where('email', $request->email)->first();
        $user = Auth::user();

        $token = $user->createToken('my-app-token')->plainTextToken;

        //cookie
        $cookie = cookie('jwt', $token, 60*24); // expire in 1 day
        // return $cookie;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201)->withCookie($cookie);
    }

    public function destroy(Request $request) {

        // $userTokens = $request->user()->tokens;
        // foreach ($userTokens as $token) {
        //     $token->revoke;
        // }
        $cookie = Cookie::forget('jwt');
        //return $cookie;
        return response([
            'message' => 'Logout user',
            'cookie' => $cookie,
            // 'user' => $request->user()
        ], 201);
    }

    public function user(Request $request) {
        return 'ici';
        //return Auth::user();
    }
}
