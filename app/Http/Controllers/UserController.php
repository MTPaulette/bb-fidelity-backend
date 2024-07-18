<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [
            'users' => User::orderBy('name', 'asc')->get(),
            // 'users' => User::orderByDesc('created_at')->paginate(10),
        ];

        return response($response, 201);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $response = [
            'user' => $user,
        ];
        return response($response, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create(
            $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique',
            'password' => 'required|min:6',
        ]));
        return redirect()->route('dashboard')->with('success', 'user was successfully created!!!');
        // return redirect('/post)
    }

    
    public function update(Request $request)
    {
        //dd($request->malus);
        $user = User::find($request->id);
        if($request->balance) {
            if($request->malus) {
                if($user->balance == 0) {
                    $response = [
                        'errors' => "you can't remove balance to user with zero piont.",
                    ];
                    return response($response, 422);
                }
                if($user->balance < $request->malus) {
                    $user->balance = 0;
                }else {
                    $user->balance = $user->balance - $request->balance;
                }
            }else {
            $user->balance = $user->balance + $request->balance;
            }
        }
        $user->update();
        $response = [
            'user' => $user,
            'message' => "user's balance updated",
        ];

        return response($response, 201);
    }


}
