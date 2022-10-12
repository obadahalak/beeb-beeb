<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    //// Register Section ////

    public function login_page()
    {
        return view('adminAuth.login');
    }

    public function login(Request $request)
    {
        $filed = $request->validate([

            'email' => 'required',
            'password' => 'required',
        ]);


        $admin = Admin::where('email' , $request->email)->first();

        if (! $admin || ! Hash::check($request->password, $admin->password)) {

            return redirect()->back()->with(['message' => 'Email or password is incorrect']);
        }
        else {

                return view('adminDashboard.index' , compact('admin'));
        }
    }

}
