<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Hash;
use App\Models\RequestRegister;

class RequestRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = RequestRegister::get();
        return view('registration_req', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_reqister = new RequestRegister();
        $request_reqister->first_name = $request->first_name;
        $request_reqister->last_name = $request->last_name;
        $request_reqister->email = $request->email ? $request->email : null;
        $request_reqister->phone = $request->phone ? $request->phone : null;
        $request_reqister->password = Hash::make($request->password);
        $request_reqister->save();
        return redirect('/waiting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RequestRegister::destroy($id);
        return redirect('/users_requests');
    }

    public function api_store(Request $request)
    {
        $request_reqister = new RequestRegister();
        $request_reqister->first_name = $request->first_name;
        $request_reqister->last_name = $request->last_name;
        $request_reqister->email = $request->email ? $request->email : null;
        $request_reqister->phone = $request->phone ? $request->phone : null;
        $request_reqister->password = Hash::make($request->password);
        $request_reqister->save();
        return response()->json([
            'status' => 200,
            'message' => 'added to request_register'
        ]);
    }
}
