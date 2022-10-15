<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserAuthRequest;
use Illuminate\Validation\ValidationException;

class AuthUserController extends Controller
{
    public function unAuthenticated(){
        return  response()->json(['message'=>'Unauthenticated'],422);
    }
    public function  auth(UserAuthRequest $request){

        if(Auth::attempt($request->validated())){

            return Auth::user()->createToken('token-name')->plainTextToken;
        }
         return $this->unAuthenticated();
    }

    public function userLocations(){
        
    }

}
