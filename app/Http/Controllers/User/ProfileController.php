<?php

namespace App\Http\Controllers\User;

use App\Models\like;
use App\Models\User;
use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Http\Requests\LikeRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Traits\wishListService;
use PhpParser\Node\Expr\Cast\Double;
use App\Http\Resources\CartsResource;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\ProductResource;
use App\Http\Resources\BeebBeebResource;
use App\Http\Resources\wishListResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\wishListBeebResource;

class ProfileController extends Controller
{
    use wishListService;



    /**
     * @OA\Post(
     * path="/like",
     * operationId="wishlist asd",
     * tags={"wishlist"},
     * summary="create like",
     * description="token is  required ",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *   required = true,
     *        description = "type values( product or  beebSection )",
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",

     *            @OA\Schema(
     *               type="object",
     *               required={"type","id" },

     *               @OA\Property(property="type", type="text" ,example="product" ),
     *               @OA\Property(property="id", type="integer", example="1"),
     *
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",

     *       ),
     *
     *     )
     */
    public function likeUser(LikeRequest $request)
    {
        auth('sanctum')->user()->like($request->likeable());
        return response()->json(['message' => ' like added successfully']);
    }

    /**
     * @OA\Get(
     *      path="/getLikes",
     *      operationId="wishlist",
     *      tags={"wishlist"},
     *      summary="Get list of wishlist ",
     *      description="Returns list of wishlist",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",

     *       ),
     *
     *     )
     */

    public function getLikes()
    {
        return  Cache::remember('likesUser_' . auth('sanctum')->user()->id, 60 * 60, function () {

            $product = ProductResource::collection(auth('sanctum')->user()->likeProducts);

            $beebSection = BeebBeebResource::collection(auth('sanctum')->user()->likebeebSection);

            return response()->json(['products' => $product, 'beebSection' => $beebSection]);
        });
    }

    public function removeWithList(LikeRequest $request)
    {
        if (auth('sanctum')->user()->unlilike($request->likeable())) {

            return response()->json(['message' => 'deleted successfully']);
        }
    }

    public function addToCart(CartRequest $request)
    {

        auth('sanctum')->user()->carts()->create($request->validated());

        return response()->json(['message' => 'Cart added successfully']);
    }

    public function getCart()
    {

        $sumTotal = auth('sanctum')->user()->carts->sum('ammount_after_offer');
        $userCart = CartsResource::collection(auth('sanctum')->user()->carts);
        return response()->json(['cart' => $userCart, 'total' => $sumTotal]);
    }

    public function removeCart($cart)
    {
        $cartUser = auth('sanctum')->user()->carts->find($cart);

        if ($cartUser) {
            if (
                auth('sanctum')->user()->carts->find($cart)->cart_user_id
                == auth('sanctum')->id()
            ) {
                Carts::find($cart)->delete();
                return response()->json(['message' => 'Deleted successful'], 200);
            }
        } else {
            return response()->json(['message' => 'cart Not Found'], 404);
        }
    }

    public function deleteCartUser()
    {

        if (auth('sanctum')->user()->carts->count() > 0) {
            auth('sanctum')->user()->carts()->delete();
            return response()->json(['message' => 'Deleted successful'], 200);
        } else {
            return response()->json(['message' => 'User Cart is Empty'], 400);
        }
    }


    public function submitCart()
    {
        // auth('sanctum')->user()->carts()->update([
        //     'in_cart'=>true,
        // ]);

    }

    public function order(Request $request)
    {
        // $products=[
        //     'products_id'=>11,
        //     'quantity'=>2,
        //     'addons'=>
        // ];
    }
}
