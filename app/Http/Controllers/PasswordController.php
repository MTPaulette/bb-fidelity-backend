<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $user = User::find($request->id);
        $request->validate([
            'current_password' => ['required','string','min:6'],
            'password' => ['required', 'string', 'min:6']
        ]);
        
        $currentPasswordHash= Hash::check($request->current_password, $user->password);
        if($currentPasswordHash){

            $user->password = $request->password;
            $user->update();

            $response = [
                'message' => "Password Updated Successfully"
            ];
            return response($response, 201);

        }else{
            $response = [
                'errors' => 'Current Password does not match with Old Password',
            ];
            return response($response, 500);
        }
    }


    public function update1(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::find($request->id);
        $user->update([
            'password' => $validated['password'],
        ]);
        
        $response = [
            'message' => "password updated",
        ];

        return response($response, 201);

        // return redirect('/dashboard')->with('success', 'password was successfully modified!!!');
    }
}
