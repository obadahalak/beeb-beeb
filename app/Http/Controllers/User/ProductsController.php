<?php

namespace App\Http\Controllers\User;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\enum\nameSections;
use App\Http\Controllers\Controller;
use App\Http\Traits\rateCalculation;
use App\Http\Resources\ProductResource;

class ProductsController extends Controller
{
    use rateCalculation ;
    public function getProductsFromSection($sectionName){
        return ProductResource::collection(Products::where('section_id',$sectionName)->get());

    }

    public function testfunction(){
        
    }

}
