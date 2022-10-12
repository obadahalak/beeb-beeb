<?php

use App\Http\Controllers\AdminAuth\authController;
use App\Http\Controllers\Dashboard\dashboardController;
use App\Http\Controllers\Dashboard\ownerController;
use App\Http\Controllers\resturant\restController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;



Route::get('dashboard' , [dashboardController::class , 'index'])->name('dashboard');

Route::get('login-page' , [authController::class , 'login_page']);
Route::post('login' , [authController::class , 'login'])->name('adminLogin');

Route::get('rest-list' , [restController::class , 'index'])->name('restList');
Route::get('rest-create' , [restController::class , 'create'])->name('restCreate');
Route::post('rest-add' , [restController::class , 'store'])->name('restAdd');

Route::resource('owners', ownerController::class);
Route::get('owner/edit/{id}' , [ownerController::class , 'edit'])->name('editOwner');
Route::post('owner-add' , [ownerController::class , 'store'])->name('storeOwner');
Route::post('owner-edit/{id}' , [ownerController::class , 'update'])->name('updateOwner');
Route::get('owner-delete/{id}' , [ownerController::class , 'destroy'])->name('deleteOwner');








// Route::get('/', function () {
//     return view('welcome');
// })->name('dd')->Middleware('auth:admin');
