<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SectionsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::controller(SectionsController::class)->group(function () {
    Route::get('/sections', 'getSections');
    Route::get('/category', 'getCategory');
    Route::get('/beebBeebSection','beebBeebSection');

});
