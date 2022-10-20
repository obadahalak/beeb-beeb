<?php

namespace App\Http\Controllers\User;

use App\Models\Products;
use App\Http\enum\nameSections;
use App\Models\BeebBeebSections;
use App\Http\Controllers\Controller;
use App\Http\Traits\rateCalculation;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Cache;

class ProductsController extends Controller
{
    use rateCalculation;


    public function getProductsFromBeebSection($sectionId)
    {

        return  Cache::remember('productSection_' . $sectionId, 60 * 60, function () use ($sectionId) {

            return ProductResource::collection(Products::where('beeb_beeb_sections_id', $sectionId)->get());
        });


    }

    public function getProductsHasOfferFromBeebSection($beebSectionId)
    {
     return    Cache::remember('productSection_' . $beebSectionId, 60 * 60, function () use ($beebSectionId) {

            return ProductResource::collection(
                Products::where('beeb_beeb_sections_id', $beebSectionId)->whereHas('offer', function ($q) {
                    $q->where('status', true);
                })->get()
            );
        });
    }

    public function getNewsProductsFromBeebSection($sectionId)
    {
      return   Cache::remember('productSection_' . $sectionId, 60 * 60, function () use ($sectionId) {

            return ProductResource::collection(Products::where('beeb_beeb_sections_id', $sectionId)->latest()->get());
        });
    }

    public function getProductsFromCategoryId($categoryId)
    {
      return   Cache::remember('productCategory_' . $categoryId, 60 * 60, function () use ($categoryId) {

            return ProductResource::collection(Products::where('category_products_id', $categoryId)->get());
        });
    }

    public function getProductFromId($productId)
    {

        $product = Products::whereId($productId)->first();
        if (!$product) {
            return response()->json(['Message' => 'Product not fount'], 404);
        }
        return new ProductResource($product);
    }

    public function testfunction()
    {
    }
}
