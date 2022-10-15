<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserAuthRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthUserController extends Controller
{
    public function unAuthenticated()
    {
        return  response()->json(['message' => 'Unauthenticated'], 422);
    }
    public function  auth(UserAuthRequest $request)
    {

        if (Auth::attempt($request->validated())) {

            return Auth::user()->createToken('token-name')->plainTextToken;
        }
        return $this->unAuthenticated();
    }

    public function createLocations(Request $request)
    {
        $rules = [
            'data' => 'array',
            'data.*.location' => 'required',
            'data.*.lat' => 'required',
            'data.*.long' => 'required',

        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return $validate->errors()->all();
        } else {
            return auth('sanctum')->user()->locations()->createMany($request->data);
        }
    }
}
