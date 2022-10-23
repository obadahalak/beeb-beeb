<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Section;
use App\Models\BannerImages;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\BeebBeebSections;
use App\Models\CategoryProducts;
use Illuminate\Support\Facades\App;
use App\Http\Actions\SectionsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\contactusRequest;
use App\Http\Resources\SectionResource;
use App\Http\Resources\BeebBeebResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\BannerImageResource;
use App\Models\ContactUs;

class SectionsController extends Controller
{



    /**
     * @OA\Get(
     *      path="/sections",
     *      operationId="getSections",
     *      tags={" Main sections"},
     *      summary="Get list of sections",
     *      description="Returns list of sections",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",

     *       ),
     *
     *     )
     */

    public function getSections(){
        return  SectionResource::collection(Section::get());
    }

    /**
     * @OA\Get(
     *      path="/category-FromSectinId/{id}",
     *      operationId="get Category",
     *      tags={"Category"},
     *      summary="Get list of Category ",
     *      description="Returns list of Category",
     *  @OA\Parameter(
     *          name="id",
     *          description="Section-id",
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
    public function getCategoryFromSectionId($id){
        return  CategoryResource::collection(CategoryProducts::where('section_id',$id)->get());
    }

     /**
     * @OA\Get(
     *      path="/beebSection/{sectionid}",
     *      operationId="get Beeb beeb section from main-section-id",
     *      tags={"beeb-beeb-Section"},
     *      summary="Get list of beebSection ",
     *      description="beeb-beeb-section : Is it a store, mall, or restaurant",
     *  @OA\Parameter(
     *          name="sectionid",
     *          description="Section-id",
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
    public function beebBeebSection($id){
       return  BeebBeebResource::collection(BeebBeebSections::where('section_id',$id)->get());
    }


     /**
     * @OA\Get(
     *      path="/BeebHasOffer",
     *      operationId="get Beeb beeb section Has offer ",
     *      tags={"beeb-beeb-Section"},
     *      summary="Get list of beebSection ",
     *      description="beeb-beeb-section : Is it a store, mall, or restaurant   ",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",

     *       ),
     *
     *     )
     */
    public function getBeebBeebHasOffer(){
        return  BeebBeebResource::collection(BeebBeebSections::where('offer->status',true)->get());
    }


     /**
     * @OA\Get(
     *      path="/bannerImage",
     *      operationId="get banner-Image ",
     *      tags={"bannerImage"},
     *      summary="Get list of bannerImage ",
     *      description=" ",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",

     *       ),
     *
     *     )
     */
    public function bannerImage(){
      return   BannerImageResource::collection(BannerImages::latest()->get());
    }


      /**
        * @OA\Post(
        * path="/contactUs",
        * operationId="send Message to support",
        * tags={"contactUs"},
        * summary="contact-us",
        * description="token is not required ",
        *     @OA\RequestBody(
        *         @OA\JsonContent(),
        *         @OA\MediaType(
        *            mediaType="multipart/form-data",

        *            @OA\Schema(
        *               type="object",
        *               required={"name","phone", "message" },
        *               @OA\Property(property="name", type="text"),
        *               @OA\Property(property="phone", type="text"),
        *               @OA\Property(property="message", type="password"),
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
    public function contactUs(contactusRequest $request){
        ContactUs::create($request->validated());
        return response()->json(['message'=>'send message successfully'],201);
    }

}
