<?php

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\User\AuthUserController;
use App\Http\Controllers\User\ProductsController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SectionsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::controller(SectionsController::class)->group(function () {
    Route::get('/sections', 'getSections');
    Route::get('/category-FromSectinId/{id}', 'getCategoryFromSectionId');
    Route::get('/beebSection/{id}', 'beebBeebSection');
    Route::get('/BeebHasOffer', 'getBeebBeebHasOffer');
});

Route::controller(ProductsController::class)->group(function () {
    Route::get('/ProductsFromBeebId/{id}', 'getProductsFromBeebSection');
    Route::get('/ProductsHasOfferFromBeebId/{beebSectionId}', 'getProductsHasOfferFromBeebSection');
    Route::get('/NewsProductsFromBeebId/{beebSectionId}', 'getNewsProductsFromBeebSection');
    Route::get('/Products-From-CategoryId/{id}', 'getProductsFromCategoryId');
    Route::get('/Product-FromId/{id}', 'getProductFromId');
});


Route::controller(ProductsController::class)->group(function () {
    Route::get('/test', 'testfunction');
});

////////////// Auth User ////////////////////

Route::controller(AuthUserController::class)->group(function () {

    Route::post('/auth-user','auth');
    Route::post('/createLocations','createLocations')->middleware('auth:sanctum');

});

Route::controller(ProfileController::class)->group(function(){
    Route::post('/add-wishlist/{model}/{model_id}','addToWishList');
    Route::get('getWishList','getWishList');
});

// Route::get('/test',function(Request $request){
//     return $request->model::getclass();


// });
