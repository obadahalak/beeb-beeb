<?php

namespace App\Http\Controllers\User;

use App\Models\like;
use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\wishListService;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\ProductResource;
use App\Http\Resources\BeebBeebResource;
use App\Http\Resources\wishListResource;
use App\Http\Resources\wishListBeebResource;

class ProfileController extends Controller
{
    use wishListService;

    ///Refactor
    public function likeUser(LikeRequest $request)
    {


        
      return  auth('sanctum')->user()->like($request->likeable());
    }

    ///refactoor to likes 
    public function getLikes()
    {

        $product = ProductResource::collection(auth('sanctum')->user()->likeProducts);

        $beebSection = BeebBeebResource::collection(auth('sanctum')->user()->likebeebSection);

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
