<?php

namespace App\Http\Controllers\User;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\BeebBeebSections;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\BeebBeebResource;
use App\Http\Resources\BeebCountResource;
use App\Http\Resources\filterProductResource;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function searchDistance(Request $request)
    {

        $beeb_section = BeebBeebSections::query();

        $userLocation = auth('sanctum')->user()->userlocation->user_location;

        if ($request->has('distance')) {

            $data = DB::table("beeb_beeb_sections")
                ->select(
                    "beeb_beeb_sections.id",
                    DB::raw("6371 * acos(cos(radians(" . $userLocation->lat . "))
                    * cos(radians(beeb_beeb_sections.lat))
            * cos(radians(beeb_beeb_sections.long) - radians(" . $userLocation->long . "))
            + sin(radians(" . $userLocation->lat . "))
            * sin(radians(beeb_beeb_sections.lat))) AS distance")
                )
                ->having('distance', '<', 6) //// distance km
                ->orderBy('distance')->pluck('id');
            return    BeebBeebResource::collection(BeebBeebSections::whereIn('id', $data)->get());


        } else if ($request->has('rating')) {

            $rating =  BeebBeebSections::withAvg(['reviews as rate' => function ($q) {
            }], 'rate')->whereHas('reviews',function ($q) {

            })->orderBy('rate','desc')->get();

            return BeebCountResource::collection($rating);
        }
    }

    public function search(Request $request)
    {

        $rating = request()->query('rating');
        $price = request()->query('price');

        $product = Products::query();

        $result = $product->when($request->price, function ($q) use ($price) {

            return $q->where('dicount_price', '>=', $price);
        })->when($rating, function ($q) use ($rating, $product) {

            return  $product->Avg($rating);
        })->get();

        return filterProductResource::collection($result);
    }
}
