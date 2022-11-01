<?php

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\User\LikeController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\AuthUserController;
use App\Http\Controllers\User\ProductsController;
use App\Http\Controllers\User\SectionsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::controller(SectionsController::class)->group(function () {

    Route::get('/sections', 'getSections');

    Route::get('/category-FromSectinId/{id}', 'getCategoryFromSectionId');
    Route::get('/beebSection/{sectionid}', 'beebBeebSection');
    Route::get('/BeebHasOffer', 'getBeebBeebHasOffer');
    Route::get('/bannerImage', 'bannerImage');
    Route::post('/contactUs', 'contactUs');
});

Route::controller(ProductsController::class)->group(function () {
    Route::get('/ProductsFromBeebId/{id}', 'getProductsFromBeebSection');
    Route::get('/ProductsHasOfferFromBeebId/{id}', 'getProductsHasOfferFromBeebSection');
    Route::get('/NewsProductsFromBeebId/{id}', 'getNewsProductsFromBeebSection');
    Route::get('/Products-From-CategoryId/{id}', 'getProductsFromCategoryId');
    Route::get('/Product-FromId/{id}', 'getProductFromId');
});




////////////// Auth User ////////////////////

Route::controller(AuthUserController::class)->group(function () {

    Route::post('/auth-user', 'auth');
    Route::post('/createUserLocations', 'createLocations')->middleware('auth:sanctum');
});

Route::controller(ProfileController::class)->middleware('auth:sanctum')->group(function () {
    Route::post('/like', 'likeUser');
    Route::get('/getLikes', 'getLikes');
    Route::post('removeWithList', 'removeWithList');
    Route::post('/addToCart', 'addToCart');
    Route::get('/getCart', 'getCart');
    Route::put('/removeCart/{id}', 'removeCart');
    Route::put('/deleteCartUser', 'deleteCartUser');
    Route::post('/submitCart', 'submitCart');
});


Route::controller(SearchController::class)->group(function () {

    Route::get('/search-By-Distance', 'searchDistance')->middleware('auth:sanctum');
    Route::get('/product-search-price-And-rating','search');

});

