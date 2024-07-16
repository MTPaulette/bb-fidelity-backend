<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class PasswordController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed'],
        ]);

        if($validator->fails()){
            return response([
                'errors' => $validator->errors(),
            ], 403);
        }

        $user = User::find($request->id);
        $user->update([
            'password' => $validator['password'],
        ]);
        
        $response = [
            'message' => "password updated",
        ];

        return response($response, 201);

        // return redirect('/dashboard')->with('success', 'password was successfully modified!!!');
    }
}
