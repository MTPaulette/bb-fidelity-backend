<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [
            'services' => Service::orderBy('name', 'asc')->get(),
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
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|unique:services',
            'price' => 'required',
            'point' => 'required',
            'validity' => 'required',
            'description' => 'required|string',
        ]);

        if($validator->fails()){
            return response([
                'errors' => $validator->errors(),
            ], 500);
        }

        $service = Service::where('email', $request->email)->first();
        $service->user_id = $request->user()->id;
        $service->save();

        $response = [
            'service' => $service,
            'message' => 'Service successfully created.'
        ];

        return response($response, 201);

        // $service = Service::create($validator->validated());
        // $service = new Service();
        // $service->name = $request->name;
        // $service->description = $request->description;
        // $service->price = $request->price;
        // $service->user_id = $request->user()->id;

        // $service->save();
        // return redirect()->route('service.index')->with('success', 'service successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $service = Service::find($id)->with('users')->get();
        $service = Service::find($id);
        $response = [
            'service' => $service,
        ];
        return response($response, 201);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        if($request->name) {
            $service->name = $request->name;
        }
        if($request->description) {
            $service->description = $request->description;
        }
        if($request->price) {
            $service->price = $request->price;
        }
        $service->update();
        return redirect()->back()->with('success', 'service updated!');
    }

    public function buy(Request $request, Service $service, User $user)
    {
        dd('nj');
        if($request->name) {
            $service->name = $request->name;
        }
        if($request->description) {
            $service->description = $request->description;
        }
        if($request->price) {
            $service->price = $request->price;
        }
        $service->update();
        return redirect()->back()->with('success', 'service updated!');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
