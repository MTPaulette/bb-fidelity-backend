<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response([
                'errors' => $validator->errors(),
            ], 500);
        }

        $user = User::create($validator->validated());

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // dd($request->user());

        //$user = Auth::user();

        
        $user = User::find($request->id);
        
        if($request->has('name') && isset($request->name)) {
            $user->name = $request->name;
        }

        if($request->has('email') && isset($request->email)) {
            $user->email = $request->email;
        }

        $user->update();

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'message' => 'profile updated. You will see all modifications at the next authentification',
        ];

        return response($response, 201);
    }
    
}
