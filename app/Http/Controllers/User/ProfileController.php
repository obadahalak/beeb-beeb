<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\wishListService;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\wishListResource;
use App\Http\Resources\wishListBeebResource;

class ProfileController extends Controller
{
    use wishListService;
    public function addToWishList($model, $model_id)
    {

        return $this->WishListUser($model, $model_id);
    }
    public function getWishList()
    {

            $product = wishListResource::collection(auth('sanctum')->user()->wishList);
            $beebSection = wishListBeebResource::collection(auth('sanctum')->user()->wishListBeeb);
            return response()->json(['products' => $product, 'beebSection' => $beebSection]);

    }

    public function removeWithList()
    {
        //code.. dont code here ^_^
    }

    public function addToCart()
    {
        ///code...
    }

    public function removeCart()
    {
        ///code...
    }

    // public function

}
