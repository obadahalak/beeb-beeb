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



    /**
     * @OA\Get(
     *      path="/ProductsFromBeebId/{id}",
     *      operationId="getProducts",
     *      tags={"Products"},
     *      summary="Get list of Products",
     *      description="Returns list of Products  , token is not required",
     * @OA\Parameter(
     *          name="id",
     *          description="beeb-section-id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",

     *       ),
     *
     *     )
     */

    public function getProductsFromBeebSection($sectionId)
    {

        return  Cache::remember('productSection_' . $sectionId, 60 * 60, function () use ($sectionId) {

            return ProductResource::collection(Products::where('beeb_beeb_sections_id', $sectionId)->get());
        });
    }



    /**
     * @OA\Get(
     *      path="/ProductsHasOfferFromBeebId/{id}",
     *      operationId="Get Products  Has Offer",
     *      tags={"Products"},
     *      summary="Get list of Products has offers",
     *      description="Returns list of Products  , token is not required",
     * @OA\Parameter(
     *          name="id",
     *          description="beeb-section-id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",

     *       ),
     *
     *     )
     */


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


    /**
     * @OA\Get(
     *      path="/NewsProductsFromBeebId/{id}",
     *      operationId="Get-news-Products",
     *      tags={"Products"},
     *      summary="Get list of news-Products ",
     *      description="Returns list of Products  , token is not required",
     * @OA\Parameter(
     *          name="id",
     *          description="beeb-section-id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",

     *       ),
     *
     *     )
     */


    public function getNewsProductsFromBeebSection($sectionId)
    {
        return   Cache::remember('productSection_' . $sectionId, 60 * 60, function () use ($sectionId) {

            return ProductResource::collection(Products::where('beeb_beeb_sections_id', $sectionId)->latest()->get());
        });
    }


    /**
     * @OA\Get(
     *      path="/Products-From-CategoryId/{id}",
     *      operationId="get-Products",
     *      tags={"Products"},
     *      summary="Get list of Products from Categoryid ",
     *      description="Returns list of Products  , token is not required",
     * @OA\Parameter(
     *          name="id",
     *          description="beeb-section-id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",

     *       ),
     *
     *     )
     */


    public function getProductsFromCategoryId($categoryId)
    {
        return   Cache::remember('productCategory_' . $categoryId, 60 * 60, function () use ($categoryId) {

            return ProductResource::collection(Products::where('category_products_id', $categoryId)->get());
        });
    }



    /**
     * @OA\Get(
     *
     *
     *      path="/Product-FromId/{id}",
     *      operationId="get-Product ",
     *      tags={"Products"},
     *      summary="Get  Product from id ",
     *      description="Returns  Product  , token is not required",
     *
     * @OA\Parameter(
     *          name="id",
     *          description="ProductId",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *  ),
     *
     *      ),
     *
     *
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",

     *       ),
     *  @OA\Response(
     *          response=404,
     *          description="Product Not Found",

     *       ),
     *
     *     )
     */

    public function getProductFromId($productId)
    {

        $product = Products::whereId($productId)->first();
        if (!$product) {
            return response()->json(['Message' => 'Product not found'], 404);
        }
        return new ProductResource($product);
    }
}
