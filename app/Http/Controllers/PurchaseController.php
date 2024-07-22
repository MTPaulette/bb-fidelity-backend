<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $purchases = Purchase::orderBy('name', 'asc')->with('services')->with('users')->get();
        // $purchases = Purchase::orderByDesc('created_at')->with('services')->with('users')->get();
        $purchases = Service::orderByDesc('created_at')->get();
        $response = [
            'purchases' => $purchases
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
        $service = Service::find($request->service_id);
        $user = User::find($request->user_id);
        $admin_id = $request->admin_id;
        $by_cash = $request->by_cash;

        $new_balance = 0;

        try {
            if($by_cash) {
                $new_balance = $user->balance + $service->point;
                $user->services()->attach($service, [
                    'by_cash' => true, 
                    'bonus_point' => $service->point, 
                    'user_balance' => $new_balance, 
                    'admin_id' => $admin_id
                ]);
            } else {
                $new_balance = $user->balance - $service->price;

                // check if user cant pay service with his balance
                if($new_balance < 0) {
                    return response([
                        'message' => 'Your balance is insuffisant.',
                    ], 422);
                } else {
                    $user->services()->attach($service, [
                        'by_cash' => false, 
                        'bonus_point' => 0, 
                        'user_balance' => $new_balance, 
                        'admin_id' => $admin_id
                    ]);
                }
            }

            
            // $purchases = $user->services()->orderBy('id', 'desc')->first();
            // $purchases->pivot->admin_id = $admin_id;
            // $purchases->pivot->save();

            // $purchases = $user->services()->orderBy('created_at', 'desc')->get();
            // return $purchases;

            $user->balance = $new_balance;
            $user->update();

            $response = [
                'message' => 'Purchase successfully saved.'
            ];

            return response($response, 201);

        } catch (\Throwable $th) {
            return $th;
        }

        // foreach($request->weights as $weight) {}


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = User::find($request->user_id);
        $purchase = $user->services()->having('pivot_id', $id)->first();

        $response = [
            'purchase' => $purchase,
        ];
        return response($response, 201);
    }

    // get all purchases of user defined by his id
    public function allPurchasesOfUser($user_id)
    {
        $user = User::find($user_id);
        $purchases = $user->services()->orderBy('id', 'desc')->first();
        //return $purchases->pivot->admin_id;

        $purchases->pivot->admin_id = 3;
        $purchases->pivot->save();

        // $purchases = $user->services()->orderBy('created_at', 'asc')->first();
        return $purchases;


        try {
            $user = User::find($user_id);
            $purchases = $user->services()->orderBy('created_at', 'desc')->get();
            // $purchases = $user->services()->orderByPivot('created_at', 'desc')->get();

            if( count($purchases) ) {
                $response = [
                    'purchases' => $purchases,
                ];
                return response($response, 201);
            } else {
                return response([
                    'errors' => 'This user has not yet made a purchase of services.',
                ], 422);
            }

        } catch(Throwable $th) {
            return $th;
        }
    }

    // get all purchases of user defined by his id
    public function allUsersOfService($service_id)
    {
        try {
            $service = Service::find($service_id);
            $users = $service->users()->orderBy('created_at', 'desc')->get();
            // $users = $service->users()->orderByPivot('created_at', 'desc')->get();

            if( count($users) ) {
                $response = [
                    'users' => $users,
                ];
                return response($response, 201);
            } else {
                return response([
                    'errors' => 'This service has not been purchased by any user.',
                ], 422);
            }

        } catch(Throwable $th) {
            return $th;
        }
    }
}
