<?php

use App\Http\Controllers\AdminAuth\authController;
use App\Http\Controllers\Dashboard\dashboardController;
use App\Http\Controllers\Dashboard\ownerController;
use App\Http\Controllers\Dashboard\userController;
use App\Http\Controllers\resturant\restController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SectionsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::get('dashboard' , [dashboardController::class , 'index'])->name('dashboard');

Route::get('login-page' , [authController::class , 'login_page']);
Route::post('login' , [authController::class , 'login'])->name('adminLogin');

Route::get('rest-list' , [restController::class , 'index'])->name('restList');
Route::get('rest-create' , [restController::class , 'create'])->name('restCreate');
Route::post('rest-add' , [restController::class , 'store'])->name('restAdd');


Route::resource('owners', ownerController::class);
Route::controller(ownerController::class)->group(function(){
    Route::get('owner/edit/{id}','edit')->name('editOwner');
    Route::post('owner-add','store')->name('storeOwner');
    Route::post('owner-edit/{id}','update')->name('updateOwner');
    Route::post('owner-delete/{id}' , 'destroy')->name('deleteOwner');
});

Route::controller(restController::class)->group(function(){
    Route::get('resturants','index')->name('indexRest');
    Route::get('resturant/edit/{id}','edit')->name('editRest');
    Route::get('resturant/cteate','create')->name('createRest');
    Route::post('resturant-add','store')->name('storeRest');
    Route::post('resturant-update/{id}','update')->name('updateRest');
    // Route::post('owner-delete/{id}' , 'destroy')->name('deleteOwner');
});

Route::controller(userController::class)->group(function(){
    Route::get('users','index')->name('indexUser');
    Route::get('user/edit/{id}','edit')->name('editUser');
    Route::post('user-update/{id}','update')->name('updateUser');

});









// Route::get('owner/edit/{id}' , [ownerController::class , 'edit'])->name('editOwner');
// Route::post('owner-add' , [ownerController::class , 'store'])->name('storeOwner');
// Route::post('owner-edit/{id}' , [ownerController::class , 'update'])->name('updateOwner');
// Route::get('owner-delete/{id}' , [ownerController::class , 'destroy'])->name('deleteOwner');

// Route::get('/', function () {
    //     return view('welcome');
    // })->name('dd')->Middleware('auth:admin');
