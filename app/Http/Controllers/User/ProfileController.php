<?php

namespace App\Http\Controllers\User;

use App\Models\like;
use App\Models\User;
use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Http\Requests\LikeRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\wishListService;
use PhpParser\Node\Expr\Cast\Double;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\ProductResource;
use App\Http\Resources\BeebBeebResource;
use App\Http\Resources\wishListResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\wishListBeebResource;

class ProfileController extends Controller
{
    use wishListService;

    ///Refactor
    public function likeUser(LikeRequest $request)
    {
        auth('sanctum')->user()->like($request->likeable());
        return response()->json(['message' =>' like added successfully']);
    }

    ///refactoor to likes
    public function getLikes()
    {
       return  Cache::remember('likesUser_'.auth('sanctum')->user()->id, 60 * 60, function (){

            $product = ProductResource::collection(auth('sanctum')->user()->likeProducts);

            $beebSection = BeebBeebResource::collection(auth('sanctum')->user()->likebeebSection);

            return response()->json(['products' => $product, 'beebSection' => $beebSection]);
        });
    }

    public function removeWithList()
    {
    }

    public function addToCart(CartRequest $request)
    {


        auth('sanctum')->user()->carts()->create($request->validated());
        return response()->json(['message' => 'Cart added successfully']);

        // return $request->all();
        //    return  auth('sanctum')->user()->carts;
        //     $priceBeforOffer=Products::find($request->products_id)->price;
        //     $totalBeforOffer=$request->quantity * $priceBeforOffer;
        //    $offerProduct=Products::whereId($request->products_id)->with('offer:products_id,discount')->first()->offer->discount;

        //    $afterOffer=$priceBeforOffer * $offerProduct / 100;
        //     return $afterOffer;

    }

    public function removeCart($cart)
    {
        $cartUser = auth('sanctum')->user()->carts->find($cart);
        if ($cartUser) {
            if (
                auth('sanctum')->user()->carts->find($cart)->user_id
                == auth('sanctum')->id()
            ) {
                Carts::find($cart)->delete();
            }
            return response()->json(['message' => 'Deleted successful'], 200);
        } else {
            return response()->json(['message' => 'cart Not Found'], 404);
        }
    }

    public function deleteCartUser()
    {

        if (auth('sanctum')->user()->carts->count()>0) {
            auth('sanctum')->user()->carts()->delete();
            return response()->json(['message' => 'Deleted successful'], 200);
        }else{
            return response()->json(['message' => 'User Cart is Empty'], 400);

        }
    }


    public function submitCart(){
        // auth('sanctum')->user()->carts()->update([
        //     'in_cart'=>true,
        // ]);

    }

    public function order(Request $request){
        // $products=[
        //     'products_id'=>11,
        //     'quantity'=>2,
        //     'addons'=>
        // ];
    }


}
