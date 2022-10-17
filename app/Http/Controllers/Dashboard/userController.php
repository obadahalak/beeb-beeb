<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.list'  , compact('users'));
    }


    public function show($id)
    {
        $user = User::where('id' , $id)->get();

        return '';

    }


    public function edit($id)
    {
        $user = User::where('id' , $id)->get();

        return view('users.edit' , compact('user'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
