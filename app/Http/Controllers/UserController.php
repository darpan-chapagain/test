<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->toArray();
        return array_reverse($jobs);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::all();

        $response = [
            'all users' => $user
        ];
        return response()->json($response);
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
        $user = User::find($id);
        $response = [
            'user' => $user
        ];
        return response()->json($response);

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
        $user = User::find($id)->update($request->all());
        $response = [
            'updated_user' => $user, 
            'message' => 'sucess',
        ];

        return response()->json($response);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $response = [
            'user' => 'user',
            'message' => 'sucess',
        ];

        return response()->json($response);
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        $status = $user->status;
        if($status == 1){
            $update = 2;
        }else{
            $update = 1;
        }
        $user->update([
            'status' => $update
        ]);
        $response = [
            'user' => $user,
            'status' => $user->status,
        ];
        return response()->json($response);
    }

    public function getActiveUser(){
        $user = User::where('status', '=', 1)->get();
        $response = [
            'active_user' => $user,
        ];
        return response()->json($response);
    }
}
