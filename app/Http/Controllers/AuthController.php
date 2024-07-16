<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                'email' => 'Auth failed'
            ]);
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function destroy(Request $request) {

        // $userTokens = $request->user()->tokens();
        // foreach ($userTokens as $token) {
        //     $token->revoke();
        // }

        $request->user()->token->revoke();
        return response([
            'message' => ['logout user'],
            'user' => $request->user()
        ], 201);
    }
}
