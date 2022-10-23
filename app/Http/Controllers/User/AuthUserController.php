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

    /**
     * @OA\Post(
     * path="/createUserLocations",
     * operationId="Select user Locations",
     * tags={"userLocations"},
     * summary="Locations",
     * description="token is required ",
     *     @OA\RequestBody(
             required = true,
     *        description = "",
     *@OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                property="data",
     *                type="array",
     *                @OA\Items(
     *                      @OA\Property(
     *                         property="location",
     *                         type="string",
     *                         example=" user location"
     *                      ),
     *                      @OA\Property(
     *                         property="lat",
     *                         type="double",
     *                         example="36.2840492"
     *                      ),
     *                      @OA\Property(
     *                         property="long",
     *                         type="double",
     *                         example="33.5180273"
     *                      ),
     *                          *                ),
     *
     *

     *             ),
     *        ),
     *     ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",

     *       ),
     *
     *     )
     */
    public function createLocations(Request $request)
    {
        $rules = [
            'data' => 'array',
            'data.*.location' => 'required',
            'data.*.lat' => 'required',
            'data.*.long' => 'required',

        ];
        // return $request->all();
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return $validate->errors()->all();
        } else {
            return auth('sanctum')->user()->locations()->createMany($request->data);
        }
    }
}
